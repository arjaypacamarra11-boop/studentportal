<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Account | student portal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * { box-sizing:border-box; }
        body { margin:0; min-height:100vh; display:flex; font-family:'Segoe UI', Arial, sans-serif; background:#f6f7fb; color:#1b1b3a; }
        .left { flex:1; position:relative; overflow:hidden; color:#fff; display:flex; flex-direction:column; align-items:center; justify-content:center; text-align:center; padding:40px; background:linear-gradient(160deg,#1a1463 0%,#2a1a8a 55%,#6b2fc9 100%); border-radius:0 0 90px 0; }
        .left .deco { position:absolute; color:rgba(255,255,255,.18); }
        .cap { font-size:110px; color:#fff; filter:drop-shadow(0 8px 18px rgba(167,139,250,.6)); }
        .logo-text { font-size:clamp(34px, 4vw, 62px); font-weight:800; margin:10px 0 6px; letter-spacing:-1px; }
        .logo-text span { color:#a78bfa; }
        .left p { margin:0; color:#c7d2fe; }
        .right { flex:1; display:flex; justify-content:center; align-items:center; padding:30px; }
        .box { width:100%; max-width:440px; background:#fff; padding:36px; border-radius:20px; box-shadow:0 12px 40px rgba(40,30,120,.12); }
        .box h1 { margin:0 0 6px; font-size:36px; color:#0f0f3d; }
        .sub { margin:0 0 24px; color:#555; }
        .input { position:relative; margin-bottom:16px; }
        .input > i { position:absolute; left:16px; top:50%; transform:translateY(-50%); color:#444; }
        .input input { width:100%; padding:16px 16px 16px 46px; border:1px solid #d9dce6; border-radius:10px; font-size:15px; }
        .input input:focus { outline:2px solid #8b5cf6; border-color:transparent; }
        .btn { width:100%; padding:16px; border:0; border-radius:10px; color:#fff; font-size:18px; font-weight:600; cursor:pointer; background:linear-gradient(90deg,#9333ea,#4338ca); }
        .error { background:#fee2e2; color:#b91c1c; padding:10px 14px; border-radius:8px; font-size:14px; margin-bottom:14px; }
        .login { margin:22px 0 0; text-align:center; color:#555; }
        .login a { color:#7c3aed; text-decoration:none; }
        @media (max-width:850px) { .left { display:none; } body { background:linear-gradient(160deg,#1a1463,#6b2fc9); } }
    </style>
</head>
<body>
<div class="left">
    <i class="fa-solid fa-graduation-cap cap"></i>
    <div class="logo-text">Join <span>STUDENT PORTAL</span></div>
    <p>Create an account to access your student dashboard</p>
</div>
<div class="right">
    <div class="box">
        <h1>Create Account</h1>
        <p class="sub">Enter your details to get started</p>

        @if ($errors->any())
            <div class="error">
                <ul style="margin:0; padding-left:20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.submit') }}">
            @csrf
            <div class="input">
                <i class="fa-regular fa-user"></i>
                <input type="text" name="name" placeholder="Full name" value="{{ old('name') }}" maxlength="255" autocomplete="name" required autofocus>
            </div>
            <div class="input">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" name="email" placeholder="Email address" value="{{ old('email') }}" maxlength="255" autocomplete="email" required>
            </div>
            <div class="input">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" placeholder="Password (at least 8 characters)" minlength="8" autocomplete="new-password" required>
            </div>
            <div class="input">
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password_confirmation" placeholder="Confirm password" minlength="8" autocomplete="new-password" required>
            </div>
            <button type="submit" class="btn">Create Account</button>
        </form>

        <p class="login">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
    </div>
</div>
</body>
</html>
