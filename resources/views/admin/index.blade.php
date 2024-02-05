<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель администратора</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <x-header></x-header>
    <div class="container">
        <a class="btn btn-primary mt-3" href="/createPage">Создать видеоролик</a>
        <h2>Мои видеоролики</h2>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Превью</th>
                <th scope="col">Название</th>
                <th scope="col">Описание</th>
                <th scope="col">Лайки</th>
                <th scope="col">Дизлайки</th>
                <th scope="col">Категория</th>
                <th scope="col">Ограничение</th>
                <th scope="col">Дата загрузки</th>
                <th scope="col">Выбор ограничения</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                <tr>
                    <td><a href="/video/{{$item->id}}"><img class="img-prof" src="/storage/cover/{{$item->cover}}" alt="{{$item->cover}}"></a></td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td></td>
                    <td></td>
                    <td>{{$item->category_vid->title_category}}</td>
                    <td>{{$item->limit_vid->title_limit}}</td>
                    <td>{{$item->created_at}}</td>
                    <form action="/limit" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <td><select class="form-select" name="limit" required>
                        @foreach ($limits as $limit)
                            <option value="{{$limit->id}}">{{$limit->title_limit}}</option>
                        @endforeach
                    </select></td>
                    <td><button type="submit" class="btn btn-primary">Изменить</button></td>
                    </form>
                </tr>
                @empty
                    <td>У вас пока нет видеороликов</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                @endforelse
            </tbody>
        </table>
        {{ $data->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</body>
</html>
