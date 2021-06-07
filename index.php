<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rose_de_parfume</title>
    <link rel="stylesheet" href="/script/OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/script/OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="/style/timer.css">
    <script src="https://use.fontawesome.com/1d2ba5463a.js"></script>
    <!-- Facebook Pixel Code -->
    <script>
        ! function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '504239644174476');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=504239644174476&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
</head>

<body>
    <span class="modal-add" data-mod="cart">товар добавлен в корзину</span>
    <span class="modal-add" data-mod="order">спасибо за заказ! в ближайшее время мы с вами свяжемся</span>
    <span class="modal-add" data-mod="message">спасибо за сообщение! в ближайшее время мы с вами свяжемся</span>
    <span class="modal-add help" data-mod="question">нужна помощь?</span>
    <audio id="notifypop">
        <source src="message_sound.mp3" type="audio/mpeg">
    </audio>
    <div class="cart" data-widget="cart">
        <span class="cart-count">0</span>
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
    </div>
    <div class="cart chat" data-widget="chat">
        <i class="fa fa-commenting-o" aria-hidden="true"></i>
    </div>
    <div class="chat-form shadow">
        <form class="contacts-form">
            <input type="tel" placeholder="Ваш номер телефона" name="number">
            <input type="text" placeholder="Введите ваше имя" name="name">
            <textarea name="message" placeholder="Введите текст сообщения" style="width: 36%"></textarea>
            <a class="main-info-button color" data-button="message">отправить</a>
        </form>
        <p class="form-attention">Нажимая на кнопку, вы даете согласие на обработку персональных данных</p>
    </div>
    <header>
        <div class="logo-block">
            <div class="socials">
                <a href="https://www.instagram.com/rose_de_parfume/" target="_blank" class="socials-icon">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="https://wa.me/79996736893" target="_blank" class="socials-icon">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                </a>
            </div>
            <div class="logo">
                <div class="logo-img">
                    <img src="/img/logo.png" alt="logo">
                </div>
                <div class="logo-text">rose_de_parfume</div>
            </div>
            <a href="tel:+79996736893" class="phone">
                <div class="phone-container adapt">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span class="phone-number">+7(999)673-68-93</span>
                </div>
            </a>
        </div>
        <?php include 'nav.php'; ?>
        <div class="main-info">
            <div class="main-info-text shadow" style="width: 53%; height: 100%">
                <h1 class="text-header">распив элитной селективной парфюмерии</h1>
                <ul class="main-info-items">
                    <li class="item-text item-adapt">ассортимент более 40 ароматов</li>
                    <li class="item-text item-adapt">только оригинальная продукция</li>
                    <li class="item-text item-adapt">подарок в каждом заказе</li>
                </ul>
                <a href="#catalog" class="main-info-button mib">перейти в каталог</a>
            </div>
            <div class="main-info-img">
                <img src="/img/rose-header.png" alt="">
            </div>
        </div>
    </header>
    <main>
        <section class="about" id="about">
            <div class="item-text-header">ЭЛИТНЫЙ СЕЛЕКТИВНЫЙ ПАРФЮМ ТЕПЕРЬ ДОСТУПЕН!</div>
            <div class="about-item">
                <div class="item-image shadow">
                    <img src="/img/about1.png" alt="">
                </div>
                <div class="item-text big" style="color: black;">
                    Все привыкли думать, что эксклюзивная нишевая парфюмерия слишком дорогая. И предпочитают ее заменить
                    ароматами, модными благодаря сильному ажиотажу из-за рекламы.

                    Почему это не так?
                    <a href="#catalog" class="main-info-button button-black">перейти в каталог</a>
                </div>
            </div>
            <div class="item-text-header" style="padding-top: 24px; padding-bottom: 12px;">Аромат селективного парфюма
                стойкий и насыщенный</div>
            <div class="about-item">
                <div class="item-image shadow">
                    <img src="/img/about2.png" alt="">
                </div>
                <div class="item-text" style="color: black;">5-10мл полностью заменяют 50мл люксового парфюма.
                    Вы можете пробовать сразу несколько ароматов, стоимость за 5 мл от 506р. привлекательна и
                    доступна каждому.

                    В @rose_de_parfume до конца месяца вы можете приобрести парфюм со скидкой 5% на первый заказ, и
                    попробовать сами.
                    А так же к абсолютно любому заказу вы получите подарок.
                    <a href="#catalog" class="main-info-button button-black">перейти в каталог</a>
                </div>
            </div>
        </section>
        <section class="why non-visible" id="why">
            <div class="section-header why-header">почему выбирают нас?</div>
            <div class="why-body">
                <div class="why-body-item">
                    <div class="item-icon">
                        <img src="/img/icons/icon_shield.png" alt="">
                    </div>
                    <div class="item-header">Только оригинальный парфюм</div>
                </div>
                <div class="why-body-item non-visible">
                    <div class="item-icon">
                        <img src="/img/icons/icon_bottle.png" alt="">
                    </div>
                    <div class="item-header">Более 40 ароматов в наличии</div>
                </div>
                <div class="why-body-item">
                    <div class="item-icon">
                        <img src="/img/icons/icon_perfume.png" alt="">
                    </div>
                    <div class="item-header">Распив от 5 мл</div>
                </div>
                <div class="why-body-item non-visible">
                    <div class="item-icon">
                        <img src="/img/icons/icon_delivery.png" alt="">
                    </div>
                    <div class="item-header">Минимальный срок обработки и доставки заказа</div>
                </div>
                <div class="why-body-item">
                    <div class="item-icon">
                        <img src="/img/icons/icon_basket.png" alt="">
                    </div>
                    <div class="item-header">Подарки каждому покупателю</div>
                </div>
                <div class="why-body-item non-visible">
                    <div class="item-icon">
                        <img src="/img/icons/icon_world.png" alt="">
                    </div>
                    <div class="item-header">Доставка по всей России</div>
                </div>
                <div class="why-body-item non-visible">
                    <div class="item-icon">
                        <img src="/img/icons/icon_purchase.png" alt="">
                    </div>
                    <div class="item-header">Доставка от 5000 рублей бесплатно</div>
                </div>
                <div class="why-body-item visible">
                    <div class="item-icon">
                        <img src="/img/icons/icon_purchase.png" alt="">
                    </div>
                    <div class="item-header">Доставка от 5000 рублей по всей России бесплатно</div>
                </div>
                <div class="why-body-item">
                    <div class="item-icon">
                        <img src="/img/icons/icon_gift.png" alt="">
                    </div>
                    <div class="item-header">Готовые аромабоксы - идеальное решение для подарка</div>
                </div>
            </div>
        </section>
        <section class="choose" id="choose">
            <div>
                <h2 class="section-header header-choose">Ароматы на любой выбор и вкус</h2>
                <p class="section-subheader">Сколько людей, столько и предпочтений. Поэтому у меня вы найдете именно тот
                    аромат, который всегда хотели среди разных видов парфюмерии.</p>
            </div>
            <div class="choose-item" style="margin-bottom: 90px">
                <div class="choose-item-image shadow">
                    <img src="/img/about1.png" alt="">
                </div>
                <div class="choose-item-text"><strong>Аромасеты</strong><br>

                    Если вы хотите познакомиться с несколькими ароматами сразу , то вам помогут готовые аромасеты.
                    Каждый набор ароматов имеет свой характер и уникальный стиль. С их помощью вы можете примерять новые
                    образы , подчеркивая свой вкус и индивидуальность.

                    Также готовые аромасеты - идеальное решение для подарка коллеге , другу и любому близкому человеку.

                    Все аромасеты собраны с любовью и на них действует скидка 20 %.
                    <a href="#catalog" class="main-info-button button-black" style="width: 62%">перейти к аромасетам</a>
                </div>
            </div>
            <div class="choose-item">
                <div class="choose-item-image shadow">
                    <img src="/img/about4.png" alt="">
                </div>
                <div class="choose-item-text" style="margin-left: 0;margin-right: 56px;"><strong>Группы
                        ароматов</strong><br>

                    Вы не помните название парфюма , но точно знаете , что он цитрусовый ? Или вы просто любите
                    восточные ароматы ? А может вы собрались на свидание и ищете цветочную композицию ?
                    Отлично ! Для вашего удобства все ароматы разделены на группы , что ускорит поиски вашего идеального
                    парфюма .
                    <a href="#catalog" class="main-info-button button-black" style="width: 50%">перейти к ароматам</a>
                </div>
            </div>
        </section>
        <section class="sale non-visible">
            <div class="sale-text">скидка 5% при первой покупке</div>
            <div class="sale-text">скидка 20% на все аромасеты</div>
        </section>
        <section class="sale visible">
            <div class="sale-text">элитный парфюм от 500 рублей</div>
        </section>
        <section id="catalog">
            <div class="section-header">каталог</div>
            <div class="choose-category">
                <div class="category-item active" data-cat="smells">ароматы</div>
                <div class="category-item" data-cat="boxes">аромабоксы</div>
            </div>
            <div class="catalog-categories flex-style">
                <?php include 'categories_render.php'?>
            </div>
            <div class="catalog-categories adapt-column">
                <div class="brands">
                    <div class="brands-button">Бренды<i class="fa fa-arrow-down" aria-hidden="true"></i></div>
                    <div class="brands-list shadow" style="height: auto"></div>
                    <div class="brand-container"></div>
                </div>
                <div class="sort_serch">
                    <div class="sort_price" data-sort="sort">Сортировать:</div>
                    <div class="search">
                        <input type="text" name="search" placeholder="Поиск в ароматах:">
                    </div>
                </div>
            </div>
            <?php include 'price_render.php'; ?>
            <input type="hidden" data-a="a">
            <a class="main-info-button cat-button" data-load="download">загрузить еще</a>
        </section>
        <section class="sale non-visible">
            <div class="sale-text">скидка 20% на все аромасеты и на первую покупку</div>
        </section>
        <div class="putMessage visible">
            <b>УСПЕЙ ПОЛУЧИТЬ</b>
            <p class="action"><span><span class="blink">СКИДКУ 20%</span> НА ПЕРВУЮ ПОКУПКУ</span> ДО 8 ИЮНЯ</p>
            <div id="CDT">
                <div id="countdown"></div>
            </div>
            <div style="margin-bottom: 11px;display: flex;justify-content: center;">
                <div style="position: relative">
                    <span class="clock1">дни</span><span class="clock2">часы</span><span
                        class="clock3">минуты</span><span class="clock4">секунды</span>
                </div>
            </div>
        </div>
        <div class="visible">
            <div class="section-header">напиши нам, и мы поможем подобрать тебе парфюм:</div>
            <form class="contacts-form">
                Номер телефона:
                <input type="tel" placeholder="Телефон" name="number">
                Имя:
                <input type="text" placeholder="Введите ваше имя" name="name" style="width: 55%">
                <textarea name="message" placeholder="Введите текст сообщения" style="width: 48%"></textarea>
                <a class="main-info-button color" data-button="message">отправить</a>
            </form>
        </div>
        <section class="why visible" id="why">
            <div class="section-header why-header">почему выбирают нас?</div>
            <div class="why-body">
                <div class="why-body-item">
                    <div class="item-icon">
                        <img src="/img/icons/icon_shield.png" alt="">
                    </div>
                    <div class="item-header">Только оригинальный парфюм</div>
                </div>
                <div class="why-body-item non-visible">
                    <div class="item-icon">
                        <img src="/img/icons/icon_bottle.png" alt="">
                    </div>
                    <div class="item-header">Более 40 ароматов в наличии</div>
                </div>
                <div class="why-body-item">
                    <div class="item-icon">
                        <img src="/img/icons/icon_perfume.png" alt="">
                    </div>
                    <div class="item-header">Распив от 5 мл</div>
                </div>
                <div class="why-body-item non-visible">
                    <div class="item-icon">
                        <img src="/img/icons/icon_delivery.png" alt="">
                    </div>
                    <div class="item-header">Минимальный срок обработки и доставки заказа</div>
                </div>
                <div class="why-body-item">
                    <div class="item-icon">
                        <img src="/img/icons/icon_basket.png" alt="">
                    </div>
                    <div class="item-header">Подарки каждому покупателю</div>
                </div>
                <div class="why-body-item non-visible">
                    <div class="item-icon">
                        <img src="/img/icons/icon_world.png" alt="">
                    </div>
                    <div class="item-header">Доставка по всей России</div>
                </div>
                <div class="why-body-item non-visible">
                    <div class="item-icon">
                        <img src="/img/icons/icon_purchase.png" alt="">
                    </div>
                    <div class="item-header">Доставка от 5000 рублей бесплатно</div>
                </div>
                <div class="why-body-item visible">
                    <div class="item-icon">
                        <img src="/img/icons/icon_purchase.png" alt="">
                    </div>
                    <div class="item-header">Доставка от 5000 рублей по всей России бесплатно</div>
                </div>
                <div class="why-body-item">
                    <div class="item-icon">
                        <img src="/img/icons/icon_gift.png" alt="">
                    </div>
                    <div class="item-header">Готовые аромабоксы - идеальное решение для подарка</div>
                </div>
            </div>
        </section>
        <section class="why" style="color: white" id="delivery">
            <div class="section-header">Доставка и оплата</div>
            <div class="pay">
                <div class="pay-item">
                    <div class="pay-item-circle" style="margin-right: 2px">1 <div class="line"></div>
                    </div>
                    <div class="pay-item-text right">Выбираете понравившийся парфюм и объем флакона.
                        Добавляете в корзину с помощью кнопки «добавить в корзину».</div>
                </div>
                <div class="pay-item">
                    <div class="pay-item-circle">2</div>
                    <div class="pay-item-text">Заполняете свои данные в корзине и оформляете заказ.
                        При возникновение вопросов свяжитесь с менеджером магазина по телефону или электронной почте,
                        указанных в контактах</div>
                </div>
                <div class="pay-item">
                    <div class="pay-item-circle">3</div>
                    <div class="pay-item-text right">Наш менеджер свяжется с вами для уточнения информации по заказу.
                        Оплачиваете покупку удобным для вас способом и выбираете способ доставки.</div>
                </div>
                <div class="pay-item">
                    <div class="pay-item-circle">4</div>
                    <div class="pay-item-text">После оплаты заказ передаётся в транспортную компанию для доставки по
                        казанному вами адресу.</div>
                </div>
                <div class="pay-item">
                    <div class="pay-item-circle">5</div>
                    <div class="pay-item-text right">Вы получаете ваш заказ. Наш парфюм вдохновляет и делает вас лучше!
                    </div>
                </div>
            </div>
        </section>
        <section class="why" id="reviews">
            <div class="section-header why-reviews">Отзывы</div>
            <?php include 'reviews.php'; ?>
        </section>
        <section id="question">
            <div class="section-header question-header">Остались вопросы?</div>
            <p class="section-subheader">Свяжитесь со мной любым удобным для вас способом</p>
            <div class="contacts">
                <div class="socials" style="justify-content: center">
                    <a href="https://www.instagram.com/rose_de_parfume/" target="_blank" class="socials-icon color">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                    <a href="https://wa.me/79996736893" target="_blank" class="socials-icon color">
                        <i class="fa fa-whatsapp" aria-hidden="true"></i>
                    </a>
                </div>
                <a href="tel:+79996746893" class="phone" style="justify-content: center">
                    <div class="color phone-container">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <span class="phone-number">+7(999)673-68-93</span>
                    </div>
                </a>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer-nav">
            <?php include 'nav.php'; ?>
        </div>
        <div class="copy">&copy; rose_de_parfume, 2021</div>
    </footer>
    <script src="/script/jquery.js"></script>
    <script src="/script/jquery.countdown.js"></script>
    <script src="/script/jquery.cookie.js"></script>
    <script src="/script/OwlCarousel2-2.3.4/dist/owl.carousel.js"></script>
    <script src="/script/script.js"></script>
</body>

</html>