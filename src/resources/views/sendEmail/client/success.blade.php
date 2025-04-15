<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Success</title>
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
                            <div style="font-size: 9.5px; color: #00363f">
                                {{ $data['name'] }}
                            </div>
                            <div style="font-size: 14px; font-weight: bold; color: #00363f">
                                {{ $data['title'] }}
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
                                Статус вашей заявки <br />на участие в мероприятии
                            </h1>
                            <p style="color: #546668; font-size: 18px">
                                Уважаемый
                                <strong style="color: #1f3a3e">{{ $data['participant']->first_name }}</strong>,
                            </p>
                            <br />
                            <p style="color: #546668; font-size: 18px">
                                Рады сообщить, что ваша заявка на участие в нашем мероприятии
                                успешно
                                <span
                                    style="
                      color: #0d9459;
                      font-size: 18px;
                      font-style: normal;
                      font-weight: 600;
                      line-height: 101%;
                      letter-spacing: -0.18px;
                    ">одобрена</span>!
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 47px 0">
                            <div
                                style="
                    color: #546668;
                    font-size: 18px;
                    font-weight: 500;
                    line-height: 160%; /* 28.8px */
                    letter-spacing: -0.18px;
                  ">
                                Для получения вашего бейджа вы можете:
                            </div>
                            <ul>
                                <li
                                    style="
                      list-style: decimal;
                      color: #000;
                      font-size: 18px;
                      font-weight: 600;
                      line-height: 160%; /* 28.8px */
                      letter-spacing: -0.18px;
                    ">
                                    Для получения вашего бейджа вы можете:
                                    <span
                                        style="border-radius: 13px;
                        border: 1px solid rgba(167, 195, 216, 0.8);
                        background: #f2f6f9;
                        width: 111px;
                        height: 109px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        padding: 10px 12px;
                        margin-top: 16px;">
                                        <img src="{{ $message->embed($data['fullFilePath']) }}" alt="qr"
                                            style="width: 87px; height: 87px; padding: 10px;" />
                                    </span>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div
                                style="
                    border-radius: 16px;
                    border: 2px solid rgba(86, 190, 216, 0);
                    background: rgba(223, 243, 248, 0.7);
                    padding: 14px 9px 14px 23px;
                    align-items: center;
                    gap: 10px;
                    align-self: stretch;
                    color: #416266;
                    font-size: 18px;
                    font-style: normal;
                    font-weight: 400;
                    line-height: 140%; /* 25.2px */
                    letter-spacing: -0.18px;
                    margin-bottom: 34px;
                  ">
                                Пожалуйста,
                                <span
                                    style="
                      color: #213739;
                      font-size: 18px;
                      font-weight: 500;
                      line-height: 140%;
                      text-decoration-line: underline;
                    ">сохраните
                                    ваш бейдж и предъявите его при входе на
                                    мероприятие.</span>
                                Если у Вас нет возможности распечатать бейдж сохраните это
                                письмо с
                                <span style="font-weight: 500">QR-кодом и предъявите при входе.</span>
                            </div>
                        </td>
                    </tr>
                    <tr style="margin: 34px 0;">
                        <td>
                            Если у вас возникнут дополнительные вопросы, свяжитесь с нами по
                            электронной почте
                            <a href="mailto:support@fide.com"
                                style="
                    color: #0b515a;
                    font-size: 18px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: 160%;
                    letter-spacing: -0.18px;
                  ">support@fide.com</a>
                            или
                            <a href="tel:+998947654321"
                                style="
                    color: #0b515a;
                    font-size: 18px;
                    font-style: normal;
                    font-weight: 600;
                    line-height: 160%;
                    letter-spacing: -0.18px;
                  ">+998
                                94 765 43 21</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px">
                            <p
                                style="
                    color: #546668;
                    font-size: 18px;
                    font-weight: 500;
                    margin-bottom: 40px;
                  ">
                                С уважением: {{ $data['auth'] }}
                            </p>
                            {{-- <p style="color: #1f3a3e; font-size: 18px; font-weight: 500">
                                FIDE Uzbekistan Representative
                            </p>
                            <p style="color: #447177; font-size: 18px">
                                <a href="mailto:dilshod.a@fide.com"
                                    style="
                      color: #27393c;
                      font-size: 18px;
                      font-weight: 500;
                      line-height: 167%;
                      letter-spacing: -0.18px;
                      text-decoration: none;
                    ">dilshod.a@fide.com</a>
                            </p> --}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
