<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Загрузить видеоролик</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <x-header></x-header>
    <div class="container">
        <a class="btn btn-primary mt-3" href="/profile">Назад</a>
        <h2>Загрузить видеоролик</h2>
        <form action="/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="InputTitle" class="form-label">Название</label>
              <input type="text" class="form-control" id="InputTitle" name="title">
            </div>
            <div class="mb-3">
              <label for="InputDescription" class="form-label">Описание</label>
              <input type="text" class="form-control" id="InputDescription" name="description">
            </div>
            <div class="mb-3">
                <label for="InputFile" class="form-label">Файл</label>
                <input type="file" class="form-control" id="InputFile" name="file">
            </div>
            <div class="mb-3">
                <label for="InputCover" class="form-label">Превью</label>
                <input type="file" class="form-control" id="InputCover" name="cover">
            </div>
            <div class="mb-3">
                <label for="InputCategory" class="form-label">Категория</label>
                <select id="InputCategory" class="form-select" name="category">
                    <option selected>Выберите категорию</option>
                    @foreach ($data as $cat)
                        <option value="{{$cat->id}}">{{$cat->title_category}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
</body>
</html>