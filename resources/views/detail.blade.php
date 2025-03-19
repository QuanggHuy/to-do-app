<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$task->title}}</title>
</head>
<body>
    <h1>{{$task->title}}</h1>
    <p>{{$task->description}}</p>
    <p>{{$task->long_description}}</p>
    <p>{{$task->completed?'Đã hoàn thành':'Chưa hoàn thành'}}</p>
    <a href="/">Quay lại</a>
</body>
</html>