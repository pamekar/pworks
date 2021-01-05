<x-guest-layout>
    <x-slot name="title">User Card</x-slot>
    <section id="main">
        <div>
            <form action="{{route('comments.store')}}" method="post">
                @csrf
                <div>
                    <label for="comment">Comment</label>
                    <textarea id="comment" name="comment" placeholder="Enter comment here" required></textarea>
                </div>
                <div>
                    <label for="id">User Id</label>
                    <input id="id" type="number" name="id" placeholder="Enter User ID here" min="1" required>
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
