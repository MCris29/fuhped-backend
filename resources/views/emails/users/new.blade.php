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
        }
    </style>
</head>

<body style="margin:0;padding:0;">
    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;border:none;">
        <tr>
            <td align="center" style="padding:0;">
                <table role="presentation" style="width:602px;border-collapse:collapse;border:none;border-spacing:0;text-align:left;">
                    <tr>
                        <td align="center" style="padding:10px 0 10px 0;background:#855E96;">
                            <h1 style="color: #ffffff;font-family:Raleway, sans-serif;">Fuhped</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:36px 30px 42px 30px;">
                            <table role="presentation" style="width:100%;border-collapse:collapse;border-spacing:0;">
                                <tr>
                                    <td style="padding:0 0 36px 0;color:#000;">
                                        <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Arial,sans-serif;color:#000;">Hola <?php echo $user->name ?>!</h1>
                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;color:#000;">
                                            Tu cuenta Fuhped esta configurada y lista para usarse,
                                            puedes acceder presionando el siguiente botón e ingresando tus credenciales.
                                        </p>
                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><strong>Correo: </strong><?php echo $user->email ?></p>
                                        <p style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Arial,sans-serif;"><strong>Contraseña: </strong><?php echo $password ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <a href="https://fuhped.vercel.app/iniciar-sesion">
                                            <button style="background:#855E96;padding:0 30px;border:none;margin:0 0 40px 0">
                                                <h3 style="color:#ffffff;">Acceder</h3>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left">
                                        <p style="margin:0 0 12px 0;font-size:14px;line-height:24px;font-family:Arial,sans-serif;">Te recomendamos que mantengas esta información confidencial.</p>
                                        <p style="margin:0 0 12px 0;font-size:14px;line-height:24px;font-family:Arial,sans-serif;">Atentamente, Fuhped</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>