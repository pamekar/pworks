<x-guest-layout>
    <x-slot name="title">User Card - {{$user->name}}</x-slot>
    <section id="main">
        <header>
            <span class="avatar"><img src="{{asset("images/users/".mt_rand(1,2).".jpg")}}" alt=""/></span>
            <h1>{{$user->name}}</h1>
            @foreach($user->comments as $comment)
                <p>{{"{$comment->created_at->format('j F, Y')}: {$comment->value}"}}</p>
            @endforeach
        </header>

        <div>
            <form action="{{route('comments.store')}}" method="post">
                @csrf
                <div>
                    <label for="comment">Comment</label>
                    <textarea id="comment" name="comment" placeholder="Enter comment here" required></textarea>
                </div>
                <div>
                    <label for="id">User Id</label>
                    <input id="id" type="number" name="id" placeholder="Enter User ID here" value="{{$user->id}}"
                           min="1"
                           required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Enter Password here" required>
                </div>
                <div>
                    <input type="submit" value="Submit"/>
                </div>
            </form>
        </div>
    </section>
</x-guest-layout>
