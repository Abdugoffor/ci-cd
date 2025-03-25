@extends('layouts.client')
@section('banner')
@endsection
@section('content')
    <main class="container">
        <section class="register-personal">
            <div class="inner-img-content">
                <style>

                    h2 {
                        color: #0073e6;
                        border-left: 5px solid #0073e6;
                        padding-left: 10px;
                        font-size: 22px;
                        margin-top: 20px;
                    }

                    ul {
                        list-style: none;
                        padding: 0;
                    }

                    ul li {
                        background: #e9f5ff;
                        margin: 5px 0;
                        padding: 10px;
                        border-radius: 5px;
                        font-size: 16px;
                        line-height: 1.5;
                    }

                    ul li span {
                        font-weight: bold;
                        color: #004a99;
                    }

                    .example {
                        background: #fffae5;
                        padding: 10px;
                        border-left: 5px solid #ffcc00;
                        margin-top: 10px;
                        border-radius: 5px;
                    }

                    .xulosa {
                        background: #d4edda;
                        padding: 15px;
                        border-radius: 5px;
                        font-weight: bold;
                        color: #155724;
                        margin-top: 20px;
                        border-left: 5px solid #28a745;
                    }
                </style>

                📖 Виды оферты
                <ul>
                    <li> <span>Публичная оферта</span> – предложение, действующее для всех. Например, «Пользовательское
                        соглашение» или «Публичная оферта» в интернет-магазинах – это именно такой тип предложения. Если
                        клиент пользуется сайтом или сервисом, он автоматически соглашается с данной офертой. </li>
                    <li> <span>Индивидуальная оферта</span> – предложение, адресованное конкретному лицу или компании.
                        Например, если одна компания отправляет другой компании предложение о поставке товаров, это будет
                        индивидуальная оферта. </li>
                </ul>
                📖 Разница между офертой и договором
                <ul>
                    <li><span>Оферта</span> – это предложение, которое можно принять или отклонить.</li>
                    <li><span>Договор</span> – это соглашение, когда стороны принимают оферту и достигают взаимных
                        договорённостей.</li>
                </ul>
                📖 Юридическая сила оферты
                <ul>
                    <li>Если человек или компания принимает оферту (акцептирует её), она становится официальным договором и
                        приобретает юридическую силу.</li>
                    <li> <span>Пример:</span>
                        <div class="example"> 🔹 Когда вы оформляете заказ в интернет-магазине, вы автоматически соглашаетесь
                            с офертой магазина.<br> 🔹 Поэтому выполнение условий заказа становится обязательным. </div>
                    </li>
                </ul>
                <div class="xulosa"> 📌 <span>Оферта</span> – это официальное предложение, которое после принятия становится
                    юридически обязывающим договором. 
                </div>
            </div>
        </section>
    </main>
@endsection
