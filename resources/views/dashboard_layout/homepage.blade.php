@extends('dashboard_layout.layout')
@section('title', 'Homepage')
@section('content')

    {{-- Welcome banner --}}
    <div style="background:linear-gradient(110deg,#6d35d8,#3b5be0); color:#fff; padding:44px 40px; border-radius:16px;
                margin-bottom:20px; display:flex; justify-content:space-between; align-items:center; overflow:hidden;">
        <div>
            <h1 style="color:#fff; font-size:38px; margin-bottom:10px;">Welcome back, {{ Auth::user()->name }}!</h1>
            <p style="color:#e0e7ff; font-size:18px;">Stay focused, keep learning, and achieve your goals.</p>
        </div>
        <i class="fa-solid fa-laptop-code" style="font-size:110px; color:rgba(255,255,255,.25);"></i>
    </div>

    {{-- Mission & Vision --}}
    <div class="grid2">
        <div class="card" style="display:flex; gap:20px; align-items:flex-start; padding:26px;">
            <div style="min-width:76px; height:76px; border-radius:50%; background:#efe9ff; display:flex; align-items:center; justify-content:center;">
                <i class="fa-solid fa-bullseye" style="font-size:34px; color:#5b3fd6;"></i>
            </div>
            <div>
                <h3 style="font-size:22px;">Mission</h3>
                <p style="font-size:16px;">University of Eastern Pangasinan is dedicated to producing highly competent and morally responsible UEPians through innovation, industry-focused education, sustainable research, and values-based curriculum. We commit to shaping ethical trailblazers bringing our principle-centered culture defining our values of Maka-Diyos, Marunong and Malinis.</p>
            </div>
        </div>
        <div class="card" style="display:flex; gap:20px; align-items:flex-start; padding:26px;">
            <div style="min-width:76px; height:76px; border-radius:50%; background:#e6efff; display:flex; align-items:center; justify-content:center;">
                <i class="fa-solid fa-eye" style="font-size:34px; color:#2f4fd0;"></i>
            </div>
            <div>
                <h3 style="font-size:22px;">Vision</h3>
                <p style="font-size:16px;">A leading local university known to develop excellent and virtuous professionals who are catalysts of progress for both the local and global communities.</p>
            </div>
        </div>
    </div>

    {{-- Academic overview --}}
    <h2 style="color:var(--navy); font-size:22px; margin:8px 0 14px;">Your Student Overview</h2>

    @php
        $stats = [
            ['Courses Enrolled',     '5',    'Active this semester', 'fa-book-open',       'linear-gradient(135deg,#8b5cf6,#6d3fd8)'],
            ['Calendar',             '9',    'OCTOBER',             'fa-clipboard-list',  'linear-gradient(135deg,#4f8df0,#2f5fd8)'],
            ['online classes',           '6',  '',           'fa-calendar-check',  'linear-gradient(135deg,#8b5cf6,#6d3fd8)'],
            
        ];
    @endphp

    <div class="grid4">
        @foreach ($stats as $s)
            <div class="card" style="margin-bottom:0; padding:18px;">
                <div style="display:flex; gap:14px; align-items:center;">
                    <div style="min-width:62px; height:62px; border-radius:14px; background:{{ $s[4] }}; color:#fff;
                                display:flex; align-items:center; justify-content:center; font-size:26px;">
                        <i class="fa-solid {{ $s[3] }}"></i>
                    </div>
                    <div>
                        <div style="font-size:13px; font-weight:600; color:var(--navy);">{{ $s[0] }}</div>
                        <div style="font-size:32px; font-weight:800; color:var(--navy); line-height:1.1;">{{ $s[1] }}</div>
                    </div>
                </div>
                <div style="margin-top:8px; font-size:13px; color:#5b6285; text-align:center;">{{ $s[2] }}</div>
            </div>
        @endforeach
    </div>
@endsection