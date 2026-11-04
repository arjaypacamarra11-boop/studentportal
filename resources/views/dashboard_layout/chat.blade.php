@extends('dashboard_layout.layout')
@section('title', 'Chat')
@section('content')
    <h1>Chat</h1>

    <div class="card" style="margin-top:14px;">
        <h3>Student Communication</h3>
        <p style="margin-bottom:14px;">Send a message to your classmates.</p>

        <div id="chatbox" style="height:340px; overflow-y:auto; background:#f1f5fb; border:1px solid var(--border); border-radius:6px; padding:14px; margin-bottom:16px;">
            @forelse ($messages as $m)
                <div style="display:flex; justify-content:space-between; gap:10px; margin-bottom:12px; padding:10px 12px; background:#fff; border:1px solid var(--border); border-radius:6px;">
                    <div>
                        <strong style="color:var(--navy);">{{ $m->user->name }}</strong>
                        <small style="color:#6b7280;">{{ $m->created_at->diffForHumans() }}</small><br>
                        <span style="font-size:14px;">{{ $m->body }}</span>
                    </div>

                    @if ($m->user_id === Auth::id())
                        <form method="POST" action="{{ route('chat.destroy', $m) }}"
                              onsubmit="return confirm('Delete this message?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-red" style="padding:5px 10px;"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    @endif
                </div>
            @empty
                <div style="text-align:center; padding:60px 0;">
                    <i class="fa-regular fa-comment" style="font-size:46px; color:#1e56b8;"></i>
                    <p style="margin-top:12px; font-weight:700; color:var(--navy);">No conversations yet.</p>
                    <p>Your messages will appear here.</p>
                </div>
            @endforelse
        </div>

        <form method="POST" action="{{ route('chat.store') }}" style="display:flex; gap:10px;">
            @csrf
            <input type="text" name="body" placeholder="Type a message..." maxlength="500" required autofocus
                   style="flex:1; padding:11px; border:1px solid #d1d5db; border-radius:5px;">
            <button type="submit" class="btn">Send</button>
        </form>
        @error('body') <p style="color:#b91c1c; margin-top:8px;">{{ $message }}</p> @enderror
    </div>

    <script>
        const box = document.getElementById('chatbox');
        box.scrollTop = box.scrollHeight;
    </script>
@endsection