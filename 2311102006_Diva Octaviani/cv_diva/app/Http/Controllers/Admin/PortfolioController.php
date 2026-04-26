<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PortfolioController extends Controller
{
    public function index()
    {
        return view('admin.portofolio.index', ['items' => Portfolio::orderBy('sort_order')->get()]);
    }

    public function create()
    {
        return view('admin.portofolio.form', ['item' => new Portfolio()]);
    }

    public function store(Request $r)
    {
        Portfolio::create($this->validateData($r));
        return redirect()->route('admin.portfolio.index')->with('success', 'Ditambahkan!');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portofolio.form', ['item' => $portfolio]);
    }

    public function update(Request $r, Portfolio $portfolio)
    {
        $portfolio->update($this->validateData($r));
        return redirect()->route('admin.portfolio.index')->with('success', 'Diupdate!');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return back()->with('success', 'Dihapus!');
    }

    public function syncGithub()
    {
        $username = 'divaocta';
        $response = Http::withHeaders([
            'Accept' => 'application/vnd.github.v3+json',
            'User-Agent' => 'CV-Diva-App',
        ])->get("https://api.github.com/users/{$username}/repos", [
            'per_page' => 100,
            'sort' => 'updated',
        ]);

        if ($response->failed()) {
            return back()->with('error', 'Gagal mengambil data dari GitHub!');
        }

        $repos = $response->json();
        $count = 0;

        foreach ($repos as $repo) {
            // Skip fork
            if ($repo['fork']) continue;

            // Coba berbagai kemungkinan path & branch
            $imageUrl = null;
            $branches = ['main', 'master'];
            $previewPaths = [
                'Images/preview.png',
                'Images/preview.jpg',
                'image/preview.png',
                'image/preview.jpg',
                'images/preview.png',
                'images/preview.jpg',
                'preview.png',
                'preview.jpg',
            ];

            foreach ($branches as $branch) {
                foreach ($previewPaths as $path) {
                    $rawUrl = "https://raw.githubusercontent.com/{$repo['full_name']}/{$branch}/{$path}";
                    $check = Http::withHeaders(['User-Agent' => 'CV-Diva-App'])->head($rawUrl);
                    if ($check->successful()) {
                        $imageUrl = $rawUrl; // simpan URL langsung, tidak perlu download
                        break 2; // keluar dari kedua loop
                    }
                }
            }

            $exists = Portfolio::where('github_repo', $repo['full_name'])->first();

            if (!$exists) {
                Portfolio::create([
                    'title'          => $repo['name'],
                    'description'    => $repo['description'] ?? '',
                    'link'           => $repo['html_url'],
                    'tech_stack'     => $repo['language'] ?? '',
                    'github_repo'    => $repo['full_name'],
                    'is_github_sync' => true,
                    'sort_order'     => 0,
                    'image_url'      => $imageUrl,
                ]);
                $count++;
            } else {
                // Update image_url setiap sync supaya selalu fresh
                $exists->update(['image_url' => $imageUrl]);
            }
        }

        return back()->with('success', "{$count} repo baru disinkronkan!");
    }

    private function validateData(Request $r)
    {
        $data = $r->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'link'        => 'nullable|url|max:255',
            'tech_stack'  => 'nullable|string|max:255',
            'photo'       => 'nullable|image|max:2048',
            'sort_order'  => 'nullable|integer',
        ]);
        if ($r->hasFile('photo')) {
            $data['image_url'] = $r->file('photo')->store('portfolio', 'public');
            unset($data['photo']);
        }
        return $data;
    }
}