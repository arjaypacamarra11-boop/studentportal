<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verify Email | student portal</title>
    <style>
        * { box-sizing:border-box; }
        body { margin:0; min-height:100vh; display:grid; place-items:center; padding:24px; font-family:'Segoe UI', Arial, sans-serif; background:#f6f7fb; color:#1b1b3a; }
        .box { width:100%; max-width:480px; background:#fff; padding:36px; border-radius:20px; box-shadow:0 12px 40px rgba(40,30,120,.12); }
        h1 { margin:0 0 12px; color:#0f0f3d; }
        p { line-height:1.6; color:#555; }
        .status { background:#dcfce7; color:#166534; padding:12px 14px; border-radius:8px; margin:16px 0; }
        .error { background:#fee2e2; color:#b91c1c; padding:12px 14px; border-radius:8px; margin:16px 0; }
        button { width:100%; padding:14px; border:0; border-radius:10px; color:#fff; font-size:16px; font-weight:600; cursor:pointer; background:linear-gradient(90deg,#9333ea,#4338ca); }
        form { margin-top:24px; }
        .logout { margin-top:12px; background:#fff; color:#4338ca; border:1px solid #d9dce6; }
    </style>
</head>
<body>
<main class="box">
    <h1>Verify your email</h1>
    <p>Your account is ready. You can use the student portal now and verify your email later.</p>

    @if (session('status'))
        <div class="status">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    @if (! Auth::user()->hasVerifiedEmail())
        @if (config('mail.default') === 'log')
            <div class="error">Email delivery isn’t configured, so a verification link can’t be sent yet. You can continue now and verify later.</div>
        @else
            <p>To verify now, send a link to <strong>{{ Auth::user()->email }}</strong> and open it from your inbox.</p>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit">Send verification email</button>
            </form>
        @endif
    @else
        <div class="status">Your email is verified.</div>
    @endif

    <a class="continue" href="{{ route('homepage') }}">Continue to the student portal</a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout">Sign out</button>
    </form>
</main>
</body>
</html>
