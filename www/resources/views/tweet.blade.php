<!DOCTYPE html>
<html>
<head>
    <title>Tweets</title>
</head>
<body>
    <p>{{ $tweet->text }} - <i>{{ $tweet->author }}</i></p>
    <p>{{ $tweet->created_at }}</p>
</body>
</html>