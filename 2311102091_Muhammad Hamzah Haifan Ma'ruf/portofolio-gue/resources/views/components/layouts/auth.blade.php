<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Login' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        html,body{
            width:100%;
            min-height:100%;
        }

        body{
            font-family:'Poppins',sans-serif;
            background:
                radial-gradient(circle at 15% 20%, rgba(255,255,255,.08), transparent 20%),
                radial-gradient(circle at 85% 75%, rgba(255,255,255,.05), transparent 22%),
                linear-gradient(135deg,#020202 0%,#080808 35%,#111111 70%,#030303 100%);
            color:#fff;
            min-height:100vh;
            overflow:hidden;
            position:relative;
        }

        body::before{
            content:"";
            position:fixed;
            inset:0;
            background-image:
                linear-gradient(rgba(255,255,255,.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.02) 1px, transparent 1px);
            background-size:34px 34px;
            opacity:.35;
            pointer-events:none;
        }

        body::after{
            content:"";
            position:fixed;
            inset:0;
            background:
                radial-gradient(circle at 20% 15%, rgba(255,255,255,.05), transparent 18%),
                radial-gradient(circle at 80% 80%, rgba(255,255,255,.04), transparent 24%);
            filter:blur(60px);
            pointer-events:none;
        }

        .auth-wrapper{
            position:relative;
            z-index:2;
            min-height:100vh;
            display:grid;
            grid-template-columns:1.1fr .9fr;
            gap:32px;
            padding:32px;
        }

        .left-side{
            display:flex;
            flex-direction:column;
            justify-content:space-between;
            padding:18px 10px;
        }

        .brand{
            display:flex;
            align-items:center;
            gap:12px;
            font-size:14px;
            color:rgba(255,255,255,.8);
            letter-spacing:.04em;
        }

        .brand-box{
            width:12px;
            height:12px;
            border:1px solid rgba(255,255,255,.7);
            transform:rotate(45deg);
        }

        .hero{
            max-width:700px;
        }

        .hero-mini{
            font-size:11px;
            text-transform:uppercase;
            letter-spacing:.34em;
            color:#777;
            margin-bottom:22px;
        }

        .hero-title{
            font-size:clamp(3rem,7vw,6.5rem);
            line-height:.88;
            font-weight:900;
            letter-spacing:-.07em;
            background:linear-gradient(
                90deg,
                #ffffff 0%,
                #d4d4d8 18%,
                #ffffff 42%,
                #a1a1aa 72%,
                #ffffff 100%
            );
            -webkit-background-clip:text;
            background-clip:text;
            color:transparent;
        }

        .hero-desc{
            margin-top:26px;
            max-width:520px;
            font-size:15px;
            line-height:2;
            color:#9ca3af;
        }

        .hero-footer{
            font-size:12px;
            text-transform:uppercase;
            letter-spacing:.18em;
            color:#6b7280;
        }

        .right-side{
            display:flex;
            align-items:center;
            justify-content:center;
        }

        @media(max-width:980px){
            .auth-wrapper{
                grid-template-columns:1fr;
                padding:22px;
                gap:22px;
            }

            .left-side{
                gap:40px;
            }

            .hero-footer{
                display:none;
            }
        }

        @media(max-width:640px){
            .auth-wrapper{
                padding:14px;
            }

            .hero-title{
                font-size:3rem;
            }

            .hero-desc{
                font-size:14px;
                line-height:1.8;
            }
        }
    </style>
</head>
<body>

<div class="auth-wrapper">

    <div class="left-side">

        <div class="brand">
            <div class=""></div>
        </div>

        <div class="hero">
            <div class="hero-mini">Secure Access</div>

            <div class="hero-title">
                ADMIN<br>LOGIN
            </div>
        </div>

        <div class="hero-footer">
        </div>

    </div>

    <div class="right-side">
        {{ $slot }}
    </div>

</div>

@livewireScripts
</body>
</html>