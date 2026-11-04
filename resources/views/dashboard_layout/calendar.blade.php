@extends('dashboard_layout.layout')
@section('title', 'Calendar')
@section('content')
    @php
        $schedule = [
            'Monday' => [
                ['8:00 AM - 10:00 AM',  'UED101', 'ANNEXD-RM5'],
                ['12:00 NN - 2:00 PM',  'CC106',  'DIGITEL-IT RM 2'],
            ],
            'Tuesday' => [
                ['8:00 AM - 10:00 AM',  'IT ELEC2', 'Online'],
                ['10:00 AM - 1:00 PM',  'IT ELEC2', 'Online'],
                ['2:00 PM - 5:00 PM',   'NET102',   'Online'],
            ],
            'Wednesday' => [
                ['7:00 AM - 10:00 AM',  'CC106',    'CHS LAB 2'],
                ['10:30 AM - 12:00 NN', 'GE ELEC4', 'ANNEXD-RM6'],
                ['3:00 PM - 6:00 PM',   'SIA101',   'Online'],
            ],
            'Thursday' => [
                ['7:00 AM - 9:00 AM',   'PF102',  'DIGITEL-IT RM3'],
                ['2:00 PM - 5:00 PM',   'UED101', 'Online'],
            ],
            'Friday' => [
                ['7:00 AM - 10:00 AM',  'PF102',    'Online'],
                ['10:30 AM - 12:00 NN', 'GE ELEC4', 'Online'],
                ['1:00 PM - 3:00 PM',   'NET102',   'Online'],
                ['3:00 PM - 5:00 PM',   'SIA101',   'Online'],
            ],
        ];
        $today = now()->format('l');
    @endphp

    <h1>Class Calendar</h1>
    <p class="lead">First Semester - BSIT-3M &nbsp;|&nbsp; Today is <strong>{{ $today }}</strong></p>

    <div class="card" style="padding:0; overflow-x:auto;">
        <table>
            <thead>
                <tr><th>Day</th><th>Time</th><th>Subject</th><th>Room</th></tr>
            </thead>
            <tbody>
                @foreach ($schedule as $day => $classes)
                    @foreach ($classes as $i => $c)
                        <tr style="{{ $day === $today ? 'background:#f3edff;' : '' }}">
                            @if ($i === 0)
                                <td rowspan="{{ count($classes) }}"
                                    style="font-weight:700; letter-spacing:1px; text-transform:uppercase; border-right:1px solid var(--border);">
                                    {{ $day }}
                                    @if ($day === $today)
                                        <br><span style="font-size:11px; color:#7c3aed;">&#9679; Today</span>
                                    @endif
                                </td>
                            @endif
                            <td>{{ $c[0] }}</td>
                            <td><strong>{{ $c[1] }}</strong></td>
                            <td>
                                @if ($c[2] === 'Online')
                                    <span style="background:#dcfce7; color:#166534; padding:3px 10px; border-radius:20px; font-size:12px; font-weight:600;">Online</span>
                                @else
                                    {{ $c[2] }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
@endsection