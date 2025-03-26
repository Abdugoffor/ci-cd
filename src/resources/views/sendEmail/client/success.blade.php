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
                            <img src="{{ $message->embed('frontend/assets/header_banner/chess_logo.svg') }}" alt="FIDE Logo" width="51" height="50"
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
                                            style="width: 87px; height: 87px; padding: 10px;" /></span>
                                </li>
                                <li
                                    style="
                      list-style: decimal;
                      color: #000;
                      font-size: 18px;
                      font-weight: 600;
                      line-height: 160%; /* 28.8px */
                      letter-spacing: -0.18px;
                      margin-top: 48px;
                    ">
                                    Перейти по следующей ссылке:
                                    <a style="
                        color: #0088a9;
                        text-decoration: underline;
                        font-size: 16px;
                        font-weight: 500;
                        line-height: 160%; /* 25.6px */
                        letter-spacing: -0.16px;
                        margin-left: 14px;
                        display: inline-flex;
                        align-items: center;
                        gap: 8px;
                      "
                                        href="https://example.com/badge">Ссылка для получения бейджа
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31"
                                            viewBox="0 0 31 31" fill="none">
                                            <path
                                                d="M7.63059 27.4428H23.3814C26.093 27.4428 27.4425 26.0935 27.4425 23.4208V7.57916C27.4425 4.90646 26.093 3.55713 23.3814 3.55713H7.63059C4.93193 3.55713 3.55664 4.89345 3.55664 7.57916V23.4208C3.55664 26.1065 4.93193 27.4428 7.63059 27.4428ZM7.66951 25.354C6.3721 25.354 5.64554 24.6664 5.64554 23.317V7.68295C5.64554 6.33362 6.3721 5.64598 7.66951 5.64598H23.3425C24.627 5.64598 25.3535 6.33362 25.3535 7.68295V23.317C25.3535 24.6664 24.627 25.354 23.3425 25.354H7.66951ZM19.5799 18.6982C20.1508 18.6982 20.54 18.27 20.54 17.6602V11.5493C20.54 10.7709 20.1119 10.4725 19.4502 10.4725H13.3004C12.6906 10.4725 12.3014 10.8487 12.3014 11.4196C12.3014 11.9905 12.7036 12.3797 13.3263 12.3797H15.6877L17.6078 12.1721L15.5839 14.0533L10.7964 18.8279C10.6147 19.0095 10.4849 19.269 10.4849 19.5286C10.4849 20.1123 10.8741 20.4887 11.445 20.4887C11.7564 20.4887 12.0029 20.3719 12.1846 20.1902L16.9591 15.4157L18.8275 13.4176L18.6328 15.4416V17.6862C18.6328 18.3089 19.0091 18.6982 19.5799 18.6982Z"
                                                fill="#0088A9" />
                                        </svg></a>
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
                                С уважением,
                            </p>
                            <p style="color: #0d2022; font-size: 18px; font-weight: bold">
                                {{ $data['auth'] }}
                            </p>
                            <p style="color: #1f3a3e; font-size: 18px; font-weight: 500">
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
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
