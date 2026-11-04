@extends('dashboard_layout.layout')
@section('title', 'Online Classes')
@section('content')
    @php
        $subjects = [
    ['SIA101',    'System Integration and Architecture'],
    ['NET102',    'Networking 2'],
    ['IT ELEC2',  'IT Elective 2'],
    ['UED101',    'UED101 (Online sessions on Thursday)'],
    ['PF102',     'PF102 (Online sessions on Friday)'],
    ['GE ELEC4',  'GE Elective 4 (Online sessions on Friday)'],
    ];
    @endphp

    <h1>Online Classrooms</h1>
    <p class="lead">Select a subject to view its sample virtual classroom.</p>

    <div class="grid3">
        @foreach ($subjects as $s)
            <div class="card" style="margin-bottom:0;">
                <div style="display:flex; gap:10px; align-items:flex-start; margin-bottom:12px;">
                    <i class="fa-solid fa-graduation-cap" style="color:#1e56b8; font-size:22px;"></i>
                    <div>
                        <h3 style="margin:0; font-size:14px;">{{ $s[0] }}</h3>
                        <p style="font-size:11px;">{{ $s[1] }}</p>
                    </div>
                </div>
                <button class="btn btn-block" onclick="alert('Placeholder: the {{ $s[0] }} classroom will open here.')">Open Classroom</button>
                <div style="margin-top:8px; text-align:center; background:#f1f5fb; border:1px solid var(--border); border-radius:4px; padding:5px; font-size:11px; color:#475569;">
                    Sample Classroom
                </div>
            </div>
        @endforeach
    </div>
@endsection