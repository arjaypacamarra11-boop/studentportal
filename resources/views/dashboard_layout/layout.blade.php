<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | STUDENT PORTAL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root { --navy:#14125e; --blue:#5b3fd6; --purple:#7c3aed; --bg:#eceffa; --border:#e2e6f3; --text:#1f2347; }
        * { box-sizing:border-box; }
        body { margin:0; font-family:'Segoe UI', Arial, sans-serif; background:var(--bg); color:var(--text); }

        /* SIDEBAR */
        .sidebar { position:fixed; top:0; left:0; width:250px; height:100%; color:#fff; display:flex; flex-direction:column;
                   background:linear-gradient(180deg,#1b1a6e,#14125e); padding:20px 12px; }
        .brand { display:flex; align-items:center; gap:12px; padding:4px 8px 28px; }
        .brand .circle { width:52px; height:52px; border-radius:50%; background:#5b4bdb; display:flex;
                         align-items:center; justify-content:center; font-size:22px; }
        .brand b { font-size:22px; display:block; }
        .brand small { color:#c7d2fe; font-size:13px; }
        .menu a { display:flex; align-items:center; gap:16px; padding:15px 18px; margin-bottom:8px; color:#fff;
                  text-decoration:none; font-size:16px; border-radius:12px; }
        .menu a i { width:22px; text-align:center; font-size:18px; }
        .menu a:hover { background:rgba(255,255,255,.1); }
        .menu a.active { background:#3f3aa8; font-weight:600; }
        .logout-link { margin-top:auto; }

        /* MAIN */
        .main { margin-left:250px; padding:26px 28px; }
        h1 { margin:0 0 4px; color:var(--navy); font-size:26px; }
        .lead { margin:0 0 18px; color:#5b6285; font-size:14px; }

        .card { background:#fff; padding:22px; border-radius:16px; margin-bottom:18px; box-shadow:0 2px 10px rgba(30,30,100,.06); }
        .card h3 { margin:0 0 8px; color:var(--navy); font-size:17px; }
        .card p { margin:0; color:#555b7e; font-size:14px; line-height:1.6; }
        .grid2 { display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:18px; }
        .grid3 { display:grid; grid-template-columns:repeat(auto-fit, minmax(230px, 1fr)); gap:18px; }
        .grid4 { display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:16px; }

        .btn { display:inline-flex; align-items:center; justify-content:center; gap:8px; padding:10px 18px; border-radius:8px;
               font-size:14px; font-weight:600; text-decoration:none; cursor:pointer; border:1px solid transparent;
               color:#fff; background:linear-gradient(90deg,#7c3aed,#4f46e5); }
        .btn-outline { background:#fff; color:var(--purple); border-color:var(--purple); }
        .btn-red { background:#ef4444; }
        .btn-block { width:100%; }
        .alert { padding:12px 16px; border-radius:10px; margin-bottom:18px; background:#dcfce7; color:#166534; font-size:14px; }

        table { width:100%; border-collapse:collapse; background:#fff; }
        th, td { padding:14px; text-align:left; font-size:14px; border-bottom:1px solid var(--border); }
        th { background:#efeafd; color:var(--navy); }

        @media (max-width:800px) {
            .sidebar { position:static; width:100%; height:auto; }
            .menu { display:flex; flex-wrap:wrap; gap:6px; }
            .menu a { margin:0; padding:10px 14px; }
            .logout-link { margin-top:10px; }
            .main { margin-left:0; padding:16px; }
        }
    </style>
</head>
<body>
<aside class="sidebar">
    <div class="brand">
        <div class="circle"><i class="fa-solid fa-graduation-cap"></i></div>
        <div><b></b><b>Student Portal</b></div>
    </div>

    <nav class="menu">
        <a href="{{ route('homepage') }}"       class="{{ request()->routeIs('homepage') ? 'active' : '' }}"><i class="fa-solid fa-house"></i> Homepage</a>
        <a href="{{ route('chat') }}"           class="{{ request()->routeIs('chat') ? 'active' : '' }}"><i class="fa-solid fa-comment"></i> Chat</a>
        <a href="{{ route('calendar') }}"       class="{{ request()->routeIs('calendar') ? 'active' : '' }}"><i class="fa-solid fa-calendar-days"></i> Calendar</a>
        <a href="{{ route('online_classes') }}" class="{{ request()->routeIs('online_classes') ? 'active' : '' }}"><i class="fa-solid fa-desktop"></i> Online Classes</a>
    </nav>

    <nav class="menu logout-link">
        <a href="{{ route('logout.page') }}" class="{{ request()->routeIs('logout.page') ? 'active' : '' }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </nav>
</aside>

<main class="main">
    @if (session('status')) <div class="alert">{{ session('status') }}</div> @endif
    @yield('content')
</main>
</body>
</html>