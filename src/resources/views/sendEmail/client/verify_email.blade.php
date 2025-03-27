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
                            <img src="{{ $message->embed(public_path('frontend/assets/1.png')) }}" alt="FIDE Logo" width="51" height="50"
                                style="display: block" />
                            <div style="font-size: 9.5px; color: #00363f">
                                46th FIDE CHESS OLYMPIAD
                            </div>
                            <div style="font-size: 14px; font-weight: bold; color: #00363f">
                                SAMARKAND 2025
                            </div>
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
                                Подтверждение Email и Статус Заявки
                            </h1>
                            <p style="color: #546668; font-size: 18px">
                                Уважаемый пользователь,
                            </p>
                            <br />
                            <p style="color: #546668; font-size: 18px">
                                Ваш код подтверждения email:
                                <strong style="color: #1f3a3e">{{ $data['verification_code'] }}</strong>
                            </p>
                            <p style="color: #546668; font-size: 18px">
                                Пожалуйста, введите этот код в системе для завершения процесса подтверждения.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 42px 0">
                            <h1
                                style="
                    color: #081a1e;
                    font-size: 22px;
                    font-weight: bold;
                    margin-bottom: 20px;
                  ">
                                Проверка Статуса Заявки
                            </h1>
                            <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 15px;">
                                <h2 style="color: #121d1f; font-size: 18px; font-weight: 600">
                                    ID Заявки: {{ $data['participant_id'] }}
                                </h2>
                            </div>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <h2 style="color: #121d1f; font-size: 18px; font-weight: 600">
                                    Ключ: {{ $data['key'] }}
                                </h2>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="color: #546668; font-size: 18px; margin-top: 12px">
                                Уважаемый пользователь,
                                Мы рады сообщить вам, что вы можете проверить статус вашего заявления по ссылке ниже:
                            </p>
                            <a href="{{ $data['link'] }}" target="_blank"
                                style="
                      color: #27393c;
                      font-size: 18px;
                      font-weight: 500;
                      line-height: 167%;
                      letter-spacing: -0.18px;
                      text-decoration: none;
                    ">{{ $data['link'] }}</a>.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>

</html>
