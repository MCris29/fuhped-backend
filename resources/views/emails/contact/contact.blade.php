<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <style>
        table,
        td,
        div,
        h1,
        p {
            font-family: Arial, sans-serif;
            color: #000;
        }
    </style>
</head>

<body>
    <div>
        <p><strong>Nombre: </strong><?php echo $info['name'] ?></p>
        <p><strong>Email: </strong><?php echo $info['email'] ?></p>
        <p><strong>Comentario: </strong><?php echo $info['comment'] ?></p>
    </div>
</body>