<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
        @foreach ($posts as $key => $post)
            <a href="posts/{{ $post->id }}">
                <li>{{ $post->title }}</li>
            </a>

            <section>{{ $post->body }}</section>
        @endforeach
</body>
</html>