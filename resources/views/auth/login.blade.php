<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign In | student portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * { box-sizing:border-box; }
        body { margin:0; min-height:100vh; display:flex; font-family:'Segoe UI', Arial, sans-serif; background:#f6f7fb; color:#1b1b3a; }

        /* LEFT PANEL */
        .left { flex:1; position:relative; overflow:hidden; color:#fff; display:flex; flex-direction:column;
                align-items:center; justify-content:center; text-align:center; padding:40px;
                background:linear-gradient(160deg,#1a1463 0%,#2a1a8a 55%,#6b2fc9 100%);
                border-radius:0 0 90px 0; }
        .left .deco { position:absolute; color:rgba(255,255,255,.18); }
        .cap { font-size:110px; color:#fff; filter:drop-shadow(0 8px 18px rgba(167,139,250,.6)); }
        .logo-text { font-size:62px; font-weight:800; margin:10px 0 6px; letter-spacing:-1px; }
        .logo-text span { color:#a78bfa; }
        .tag { display:flex; align-items:center; gap:14px; letter-spacing:5px; font-size:14px; color:#c4b5fd; margin-bottom:46px; }
        .tag::before, .tag::after { content:""; width:50px; height:2px; background:#6d5bd0; }
        .left h2 { margin:0 0 8px; font-size:26px; }
        .left p { margin:0; color:#c7d2fe; }
        .dots { position:absolute; bottom:40px; display:flex; gap:14px; }
        .dots i { width:13px; height:13px; border-radius:50%; background:rgba(255,255,255,.3); display:block; }
        .dots i:first-child { background:#fff; }

        /* RIGHT PANEL */
        .right { flex:1; display:flex; justify-content:center; align-items:center; padding:30px; }
        .box { width:100%; max-width:440px; background:#fff; padding:36px; border-radius:20px;
               box-shadow:0 12px 40px rgba(40,30,120,.12); }
        .box h1 { margin:0 0 6px; font-size:36px; color:#0f0f3d; }
        .sub { margin:0 0 24px; color:#555; }
        .input { position:relative; margin-bottom:16px; }
        .input > i.icon { position:absolute; left:16px; top:50%; transform:translateY(-50%); color:#444; }
        .input input { width:100%; padding:16px 44px 16px 46px; border:1px solid #d9dce6; border-radius:10px; font-size:15px; }
        .input input:focus { outline:2px solid #8b5cf6; border-color:transparent; }
        .input .eye { position:absolute; right:16px; top:50%; transform:translateY(-50%); cursor:pointer; color:#444; }
        .row { display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; font-size:15px; }
        .row label { display:flex; align-items:center; gap:10px; cursor:pointer; }
        .row input[type=checkbox] { width:20px; height:20px; accent-color:#7c3aed; }
        .row a, .admin a { color:#7c3aed; text-decoration:none; }
        .btn-signin { width:100%; padding:16px; border:0; border-radius:10px; color:#fff; font-size:18px; font-weight:600;
                      cursor:pointer; background:linear-gradient(90deg,#9333ea,#4338ca); display:flex;
                      justify-content:center; align-items:center; gap:10px; }
        .btn-signin:hover { opacity:.92; }
        .or { display:flex; align-items:center; gap:14px; color:#555; margin:22px 0; }
        .or::before, .or::after { content:""; flex:1; height:1px; background:#d9dce6; }
        .admin { border:1px solid #d9dce6; border-radius:10px; padding:16px; display:flex; align-items:center; gap:12px; font-size:15px; }
        .admin i { font-size:26px; color:#333; }
        .error   { background:#fee2e2; color:#b91c1c; padding:10px 14px; border-radius:8px; font-size:14px; margin-bottom:14px; }
        .success { background:#dcfce7; color:#166534; padding:10px 14px; border-radius:8px; font-size:14px; margin-bottom:14px; }

        @media (max-width:850px) { .left { display:none; } body { background:linear-gradient(160deg,#1a1463,#6b2fc9); } }
    </style>
</head>
<body>

<div class="left">
    <i class="fa-regular fa-book-open deco" style="top:50px; left:50px; font-size:56px;"></i>
    <i class="fa-regular fa-lightbulb deco" style="top:200px; left:40px; font-size:40px;"></i>
    <i class="fa-solid fa-globe deco" style="bottom:130px; left:30px; font-size:56px;"></i>
    <i class="fa-solid fa-chart-simple deco" style="bottom:70px; left:60px; font-size:48px;"></i>
    <i class="fa-solid fa-graduation-cap deco" style="bottom:90px; right:60px; font-size:46px;"></i>

    <i class="fa-solid fa-graduation-cap cap"></i>
    <div class="logo-text">Welcome <span> STUDENT PORTAL</span></div>
    <p>Sign in to access your student dashboard</p>

    <div class="dots"><i></i><i></i><i></i><i></i></div>
</div>

<div class="right">
    <div class="box">
        <h1>Sign In</h1>
        <p class="sub">Enter your credentials to continue</p>

        @if (session('status')) <div class="success">{{ session('status') }}</div> @endif
        @error('email') <div class="error">{{ $message }}</div> @enderror

        <form method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div class="input">
                <i class="fa-regular fa-envelope icon"></i>
                <input type="email" name="email" placeholder="Email address" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="input">
                <i class="fa-solid fa-lock icon"></i>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <i class="fa-regular fa-eye eye" id="eye"></i>
            </div>

            <div class="row">
                <label><input type="checkbox" name="remember" checked> Remember me</label>
                <a href="#">Forgot password?</a>
            </div>

            <button type="submit" class="btn-signin"><i class="fa-solid fa-user"></i> Sign In</button>
        </form>

        <div class="or">or</div>

        <div class="admin">
            <i class="fa-solid fa-shield-halved"></i>
            <span>New to student portal? <a href="{{ route('register') }}">Create an account</a></span>
        </div>
    </div>
</div>

<script>
    document.getElementById('eye').addEventListener('click', function () {
        const p = document.getElementById('password');
        p.type = p.type === 'password' ? 'text' : 'password';
        this.classList.toggle('fa-eye-slash');
        this.classList.toggle('fa-eye');
    });
</script>
</body>
</html>