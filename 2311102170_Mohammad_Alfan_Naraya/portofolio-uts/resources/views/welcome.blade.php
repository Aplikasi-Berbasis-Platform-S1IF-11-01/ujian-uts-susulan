<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | Mohammad Alfan Naraya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap');
        
        body { font-family: 'Plus Jakarta Sans', sans-serif; scroll-behavior: smooth; }
        
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .hero-gradient {
            background: radial-gradient(circle at top right, #3b82f6, #1e3a8a);
        }

        .bg-mesh {
            background-color: #ffffff;
            background-image: radial-gradient(at 0% 0%, rgba(59, 130, 246, 0.1) 0, transparent 50%), 
                              radial-gradient(at 50% 0%, rgba(30, 58, 138, 0.05) 0, transparent 50%);
        }

        .skill-progress { transition: width 1.5s cubic-bezier(0.17, 0.67, 0.83, 0.67); }
    </style>
</head>
<body class="bg-mesh text-gray-900">

    <nav class="fixed w-full z-[100] transition-all duration-300 py-4 px-6" id="mainNav">
        <div class="max-w-7xl mx-auto flex justify-between items-center glass rounded-2xl px-6 py-3 shadow-sm">
            <span class="text-2xl font-extrabold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">Alfan.</span>
            <div class="hidden md:flex gap-8 items-center font-semibold text-gray-600">
                <a href="#" class="hover:text-blue-600 transition">Home</a>
                <a href="#about" class="hover:text-blue-600 transition">Tentang</a>
                <a href="#skills" class="hover:text-blue-600 transition">Keahlian</a>
                <a href="#projects" class="hover:text-blue-600 transition">Project</a>
                <a href="/login" class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-200 transition">Admin</a>
            </div>
        </div>
    </nav>

    <section class="min-h-screen flex flex-col items-center justify-center px-6 pt-20 overflow-hidden hero-gradient text-white">
        <div class="absolute inset-0 opacity-20" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
        
        <div class="relative z-10 text-center" data-aos="fade-up">
            <div class="mb-8 relative inline-block">
                <div class="w-44 h-44 rounded-3xl rotate-6 border-4 border-white/20 absolute inset-0"></div>
                <div class="w-44 h-44 rounded-3xl overflow-hidden shadow-2xl relative z-10 bg-white/10 backdrop-blur-md">
                    <img id="display-foto" src="" class="w-full h-full object-cover hidden">
                    <div id="foto-placeholder" class="w-full h-full flex items-center justify-center text-5xl opacity-50">
                        <i class="fas fa-user-astronaut"></i>
                    </div>
                </div>
            </div>
            
            <h1 class="text-5xl md:text-7xl font-extrabold mb-4 tracking-tighter" id="display-nama">Memuat...</h1>
            <p class="text-xl md:text-2xl font-medium text-blue-100 mb-10 max-w-2xl mx-auto" id="display-title">Sedang sinkronisasi data...</p>
            
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#projects" class="bg-white text-blue-700 px-10 py-4 rounded-2xl font-bold hover:shadow-2xl hover:-translate-y-1 transition transform flex items-center gap-2">
                    <i class="fas fa-rocket"></i> Lihat Karya
                </a>
                <a href="#contact" class="bg-white/10 backdrop-blur-md border border-white/30 text-white px-10 py-4 rounded-2xl font-bold hover:bg-white/20 transition flex items-center gap-2">
                    <i class="fas fa-paper-plane"></i> Hubungi Saya
                </a>
            </div>
        </div>
    </section>

    <section id="about" class="py-32 px-6 max-w-6xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="text-blue-600 font-bold tracking-widest uppercase text-sm mb-4 block">Siapa Saya?</span>
                <h2 class="text-4xl font-extrabold mb-8 text-gray-900 leading-tight">Membangun Solusi Digital Dengan Kode.</h2>
                <p id="display-about" class="text-lg text-gray-600 leading-relaxed mb-8">Menunggu data deskripsi...</p>
                <div class="grid grid-cols-2 gap-6 border-t pt-8">
                    <div>
                        <p class="text-sm text-gray-400 uppercase font-bold mb-1">NIM</p>
                        <p class="font-bold text-gray-800" id="display-nim">-</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-400 uppercase font-bold mb-1">Prodi</p>
                        <p class="font-bold text-gray-800" id="display-prodi">-</p>
                    </div>
                </div>
            </div>
            <div class="glass p-10 rounded-[2.5rem] shadow-xl relative" data-aos="zoom-in">
                <div class="absolute -top-6 -right-6 w-20 h-20 bg-blue-600 rounded-full flex items-center justify-center text-white text-2xl shadow-lg">
                    <i class="fas fa-quote-right"></i>
                </div>
                <p id="display-short-bio" class="text-xl italic text-blue-900 leading-relaxed">"Sedang memuat bio singkat..."</p>
            </div>
        </div>
    </section>

    <section id="skills" class="py-32 bg-gray-950 text-white overflow-hidden relative">
        <div class="max-w-6xl mx-auto px-6 relative z-10">
            <div class="text-center mb-20" data-aos="fade-up">
                <h2 class="text-4xl font-extrabold mb-4">Tech Stack</h2>
                <div class="w-20 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
            </div>
            <div id="skills-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                </div>
        </div>
    </section>

    <section id="projects" class="py-32">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-end mb-20" data-aos="fade-up">
                <div>
                    <h2 class="text-4xl font-extrabold mb-4">Project Pilihan</h2>
                    <p class="text-gray-500">Kumpulan karya terbaik yang pernah saya buat.</p>
                </div>
                <div class="hidden md:block h-px flex-1 mx-10 bg-gray-200"></div>
            </div>
            <div id="projects-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                </div>
        </div>
    </section>

    <footer id="contact" class="pt-32 pb-16 bg-white border-t border-gray-100 text-center">
        <div class="max-w-4xl mx-auto px-6" data-aos="fade-up">
            <h2 class="text-4xl font-extrabold mb-6">Ayo Berkolaborasi!</h2>
            <p class="text-gray-500 mb-12 text-lg">Tertarik untuk bekerja sama atau sekadar ingin bertanya? Klik ikon di bawah ini.</p>
            
            <div class="flex justify-center gap-6 mb-20">
                <a id="link-email" href="#" class="w-16 h-16 rounded-2xl glass flex items-center justify-center text-2xl text-blue-600 hover:bg-blue-600 hover:text-white transition shadow-sm"><i class="fas fa-envelope"></i></a>
                <a id="link-instagram" href="#" target="_blank" class="w-16 h-16 rounded-2xl glass flex items-center justify-center text-2xl text-pink-600 hover:bg-pink-600 hover:text-white transition shadow-sm"><i class="fab fa-instagram"></i></a>
                <a id="link-github" href="#" target="_blank" class="w-16 h-16 rounded-2xl glass flex items-center justify-center text-2xl text-gray-900 hover:bg-gray-900 hover:text-white transition shadow-sm"><i class="fab fa-github"></i></a>
            </div>
            
            <p class="text-sm text-gray-400 font-medium tracking-widest uppercase">&copy; 2026 Mohammad Alfan Naraya | Informatics Student</p>
        </div>
    </footer>

    <script>
        $(document).ready(function() {
            // Initialize Animation
            AOS.init({ duration: 1000, once: true });

            $.get('/api/data-portfolio', function(res) {
                const p = res.profile;
                
                if (p) {
                    $('#display-nama').text(p.nama_lengkap);
                    $('#display-title').text(p.title);
                    $('#display-about').text(p.about_me);
                    $('#display-short-bio').text('"' + p.short_bio + '"');
                    $('#display-prodi').text(p.program_studi);
                    $('#display-nim').text(p.nim);
                    
                    if (p.foto) {
                        $('#display-foto').attr('src', '/storage/' + p.foto).removeClass('hidden');
                        $('#foto-placeholder').addClass('hidden');
                    }
                    
                    $('#link-email').attr('href', 'mailto:' + p.email);
                    $('#link-instagram').attr('href', p.instagram);
                    $('#link-github').attr('href', p.github);
                }

                // Skills with progress animation
                let sHtml = '';
                res.skills.forEach(s => {
                    sHtml += `
                        <div class="bg-white/5 border border-white/10 p-8 rounded-[2rem] hover:bg-white/10 transition group" data-aos="zoom-in">
                            <div class="flex justify-between items-center mb-6">
                                <div class="w-12 h-12 bg-blue-600/20 rounded-xl flex items-center justify-center text-blue-400 group-hover:bg-blue-600 group-hover:text-white transition">
                                    <i class="fas fa-code"></i>
                                </div>
                                <span class="text-blue-400 font-bold text-xl">${s.persentase}%</span>
                            </div>
                            <h3 class="font-bold text-lg mb-4 tracking-wide">${s.nama_skill}</h3>
                            <div class="w-full bg-white/10 h-2 rounded-full overflow-hidden">
                                <div class="bg-blue-600 h-full skill-progress rounded-full" style="width: ${s.persentase}%"></div>
                            </div>
                        </div>`;
                });
                $('#skills-container').html(sHtml);

                // Projects with hover effect
                let pjHtml = '';
                res.projects.forEach(pj => {
                    pjHtml += `
                        <div class="group relative bg-white rounded-[2.5rem] shadow-xl shadow-gray-200/50 overflow-hidden border border-gray-100" data-aos="fade-up">
                            <div class="h-64 overflow-hidden relative">
                                <img src="/storage/${pj.gambar_project}" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-8">
                                    <a href="${pj.link_project}" target="_blank" class="text-white font-bold flex items-center gap-2">
                                        View Project <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="p-8 text-left">
                                <h3 class="font-extrabold text-2xl mb-4 text-gray-900">${pj.judul_project}</h3>
                                <p class="text-gray-500 leading-relaxed">${pj.deskripsi_project}</p>
                            </div>
                        </div>`;
                });
                $('#projects-container').html(pjHtml);
            });
        });

        // Navbar Scroll Effect
        window.onscroll = function() {
            var nav = document.getElementById('mainNav');
            if (window.pageYOffset > 50) {
                nav.classList.add('py-2');
            } else {
                nav.classList.remove('py-2');
            }
        };
    </script>
</body>
</html>