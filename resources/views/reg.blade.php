<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <x-header></x-header>
    <div class="container">
        <h2>Регистрация</h2>
        <form method="POST" action="">
            <div class="mb-3">
              <label for="InputName" class="form-label">Никнейм</label>
              <input type="text" class="form-control" id="InputName" name="name">
            </div>
            <div class="mb-3">
                <label for="InputEmail" class="form-label">Почта</label>
                <input type="email" class="form-control" id="InputEmail" name="email">
            </div>
            <div class="mb-3">
              <label for="InputPassword" class="form-label">Пароль</label>
              <input type="password" class="form-control" id="InputPassword" name="password">
            </div>
            <div class="mb-3">
                <label for="ConfirmPassword" class="form-label">Повтор пароля</label>
                <input type="password" class="form-control" id="ConfirmPassword" name="conf_password">
            </div>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>
    </div>
</body>
</html>