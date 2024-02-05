<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$video->title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <x-header></x-header>
    <div class="container">
        <video width="100%" class="mt-3" controls src="/storage/video/{{$video->file_name}}"></video>
        <h2>{{$video->title}}</h2>
        <p>{{$video->description}}</p>
        @auth
        <div class="mb-2">
            <a href="/like/{{$video->id}}" class="btn btn-primary">Лайк</a>
            <span id="likes">{{$likes}}</span>
        </div>
        <div class="mb-2">
            <a href="/dislike/{{$video->id}}" class="btn btn-primary">Дизлайк</a>
            <span id="dislikes">{{$dislikes}}</span>
        </div>
        @endauth
        <p>{{$video->created_at}}</p>
        <h2>Комментарии:</h2>
        @auth
        <form method="POST" action="/comment_create">
            @csrf
            <input type="hidden" name="id" value="{{$video->id}}">
            <input type="text" class="form-control" placeholder="Оставьте свой комментарий" name="text" required>
            <button type="submit" class="btn btn-primary mt-2 mb-3">Добавить</button>
        </form>
        @endauth
        @forelse ($comment as $comments)
            <div class="comment">
                <h5>{{$comments->user_com->name}}</h5>
                <p>{{$comments->text}}</p>
                <p>{{$comments->created_at}}</p>
            </div>
        @empty
            <h5>Нет комментариев</h5>
        @endforelse
        {{ $comment->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</body>
</html>
