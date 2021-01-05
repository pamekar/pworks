<!DOCTYPE HTML>
<html>
<head>
    <title>User Card - {{$user->name}}</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"/>
    <noscript>
        <link rel="stylesheet" href="{{asset('assets/css/noscript.css')}}"/>
    </noscript>
</head>
<body class="is-preload">
<div id="wrapper">
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
                    <label for="comment"></label>
                    <textarea id="comment" name="comment" required></textarea>
                </div>
                <div>
                    <label for="id"></label>
                    <input id="id" type="number" name="id" required>
                </div>
                <div>
                    <label for="password"></label>
                    <input id="password" type="password" name="password" required>
                </div>
                <div>
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </section>
    <footer id="footer">
        <ul class="copyright">
            <li>&copy; Pictureworks</li>
        </ul>
    </footer>

</div>
<script>
    if ('addEventListener' in window) {
        window.addEventListener('load', function () {
            document.body.className = document.body.className.replace(/\bis-preload\b/, '');
        });
        document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
    }
</script>
</body>
</html>
