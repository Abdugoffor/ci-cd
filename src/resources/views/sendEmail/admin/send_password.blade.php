<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Подтверждение Email</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f4f4f4">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#f4f4f4">
        <tr>
            <td align="center">
                <table role="presentation" width="722" cellspacing="0" cellpadding="0" border="0"
                    bgcolor="#ffffff"
                    style="
              max-width: 722px;
              width: 100%;
              padding: 53px;
              font-family: Arial, sans-serif;
            ">
                    <tr>
                        <td style="text-align: left; padding-bottom: 52px">
                            <img src="{{ $message->embed(public_path('frontend/assets/1.png')) }}" alt="FIDE Logo"
                                width="51" height="50" style="display: block" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h1
                                style="
                    color: #081a1e;
                    font-size: 22px;
                    font-weight: bold;
                    text-transform: uppercase;
                    margin-bottom: 30px;
                  ">
                                Уважаемый пользователь
                            </h1>
                            <br />
                            <p style="color: #546668; font-size: 18px">
                                Ваш пароль для входа в систему:
                                <strong style="color: #1f3a3e">{{ $code }}</strong>
                            </p>
                            <p style="color: #546668; font-size: 18px">
                                Пожалуйста, используйте этот пароль для входа в систему.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
