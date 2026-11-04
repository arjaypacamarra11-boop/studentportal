@extends('dashboard_layout.layout')
@section('title', 'Logout')
@section('content')
    <div style="display:flex; justify-content:center; padding-top:30px;">
        <div class="card" style="width:100%; max-width:430px; text-align:center; padding:34px;">
            <i class="fa-solid fa-right-from-bracket" style="font-size:44px; color:#1e56b8;"></i>
            <h1 style="margin-top:10px;">Log Out?</h1>
            <p style="margin-bottom:22px;">Are you sure you want to end your current session?</p>

            <form method="POST" action="{{ route('logout') }}" style="margin-bottom:10px;">
                @csrf
                <button type="submit" class="btn btn-red btn-block">Yes, Log Out</button>
            </form>
            <a href="{{ route('homepage') }}" class="btn btn-outline btn-block" style="color:#1f2937; border-color:#cbd5e1;">Cancel and Return</a>
        </div>
    </div>
@endsection