<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/ShiftPOST" method="POST">
        <input type="text" name="src">
        <button type="submit">Зашифровать</button>
    </form>

    <form action="/DecodePOST" method="POST">
        <input type="text" name="src">
        <button type="submit">Расшифровать</button>
    </form>
</body>
</html>