<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Portfolio | Nia Admin</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- COPY STYLE DARI PROFILE (biar konsisten) -->
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f8f9fa;
        }

        .layout { display: flex; }

        .sidebar {
            width: 260px;
            background: white;
            height: 100vh;
            padding: 30px 20px;
            border-right: 1px solid #eee;
            position: fixed;
        }

        .main {
            margin-left: 260px;
            padding: 40px;
            width: 100%;
        }

        .menu a {
            display: block;
            padding: 12px;
            border-radius: 10px;
            color: #636e72;
            text-decoration: none;
            margin-bottom: 6px;
        }

        .menu a.active {
            background: #e78aa9;
            color: white;
        }

        .content-card {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 12px rgba(231,138,169,0.1);
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            border: 1px solid #f1d6de;
            margin-bottom: 12px;
        }

        button {
            background: linear-gradient(135deg,#e78aa9,#d16d8d);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 999px;
            cursor: pointer;
        }

        img {
            width: 100%;
            border-radius: 12px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
<div class="layout">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h3 style="color:#d16d8d;">Nia Admin</h3>

        <div class="menu">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.profile') }}">Profile</a>
            <a href="{{ route('admin.portfolio') }}" class="active">Portfolio</a>
        </div>
    </div>

    <!-- MAIN -->
    <div class="main">

        <h2 style="color:#d16d8d;">Kelola Portfolio</h2>

        <!-- FORM -->
        <div class="content-card">
            <h3>Tambah Project</h3>

            <form id="formPortfolio">
                @csrf

                <input type="text" name="title" placeholder="Judul Project" required>
                <textarea name="description" placeholder="Deskripsi" required></textarea>
                <input type="file" name="image" required>
                <input type="text" name="link" placeholder="Link (optional)">

                <button type="submit">Simpan</button>
            </form>

            <p id="notifPortfolio"></p>
        </div>

        <!-- LIST -->
        <div class="content-card" style="margin-top:20px;">
            <h3>List Project</h3>

            @foreach($projects as $p)
                <div style="margin-bottom:20px;">
                    <strong>{{ $p->title }}</strong>
                    <p>{{ $p->description }}</p>

                    @if($p->image)
                        <img src="{{ asset('storage/'.$p->image) }}">
                    @endif
                </div>
            @endforeach

        </div>

    </div>
</div>

<script>
document.getElementById('formPortfolio').addEventListener('submit', async function(e){
    e.preventDefault();

    let formData = new FormData(this);
    let notif = document.getElementById('notifPortfolio');

    notif.innerText = "Uploading...";

    try {
        let res = await fetch("{{ route('admin.portfolio.store') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Accept": "application/json"
            },
            body: formData
        });

        let data = await res.json();

        if (!res.ok) throw data;

        notif.innerText = data.message;

        location.reload();

    } catch(err){
        notif.innerText = err.message || "Error!";
        console.error(err);
    }
});
</script>

</body>
</html>