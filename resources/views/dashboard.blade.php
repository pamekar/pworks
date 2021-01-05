<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
            @foreach(auth()->user()->comments as $comment)
                <p>{{$comment}}</p>
            @endforeach

            <div>
                <form action="{{route('comments.store')}}" method="post">
                    @csrf
                    <div>
                        <label for="comment">Comment</label>
                        <textarea id="comment" name="comment" placeholder="Enter comment here" required></textarea>
                    </div>
                    <div>
                        <label for="id">User Id</label>
                        <input id="id" type="number" name="id" placeholder="Enter User ID here" required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input id="password" type="password" name="password" placeholder="Enter Password here" required>
                    </div>
                    <div>
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
