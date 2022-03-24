<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>New messagge got from Contact form!</h1>

    <ul>
        <li>Contact Name: {{ $newContactInfo->contact_name }}</li>
        <li>Email: {{ $newContactInfo->email }}</li>
        <li>Content: {{ $newContactInfo->content }}</li>
    </ul>
    {{-- @dump($newContactInfo) --}}
</body>
</html>