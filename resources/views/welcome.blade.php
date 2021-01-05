<x-guest-layout>
    <x-slot name="title">Users List</x-slot>
    <section id="main" style="width:auto">

        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth

            </div>
        @endif

        <div>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><a href="{{route('comments.show',['comment'=>$user->id])}}">View Comments
                                ({{$user->comments->count()}})</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </section>
</x-guest-layout>
