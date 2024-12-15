<div class="container" style="margin-top: 80px">
    @error('email')
    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>
    @enderror
    @error('password')
    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>
    @enderror
    @error('error')
    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>
    @enderror
    @error('success')
    <div class="alert alert-success" role="alert">
        {{$message}}
    </div>
    @enderror
</div>
{{--
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>60941</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
</head>
<body>
<h2 style="color: red">{{$message}}</h2>
<a href="{{url('players')}}">Назад</a>
</body>
</html>
--}}
