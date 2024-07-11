<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Студия звукозаписи Big Shmouk Records">
    <meta name="author" content="Big Shmouk Records">
    <title>Студия звукозаписи Big Shmouk Records</title>

    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">

    <!-- Bootstrap + Big Shmouk Studio main styles -->
    <link rel="stylesheet" href="assets/css/bigshmouk-studio.css">

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

<!-- Page Navigation -->
<nav class="navbar custom-navbar navbar-expand-lg navbar-dark" data-spy="affix" data-offset-top="20">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="assets/imgs/logo.png">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#service">Услуги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#portfolio">Портфолио</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#team">Команда</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonial">Отзывы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Контакты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary btn-sm ml-lg-3" href="{{ route('filament.client.auth.login') }}">Войти</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Of Page Navigation -->

<!-- Page Header -->
<header class="header">
    <div class="overlay">
        <h6 class="subtitle">Большая команда с большими амбициями</h6>
        <h1 class="title">Big Shmouk Records</h1>
        <div class="buttons text-center">
            <a href="#service" class="btn btn-primary rounded w-lg btn-lg my-1">Наш сервис</a>
            <a href="#contact" class="btn btn-outline-light rounded w-lg btn-lg my-1">Свяжитесь с нами</a>
        </div>
    </div>
</header>
<!-- End Of Page Header -->

<!-- Box -->
<div class="box text-center">
    <div class="box-item">
        <i class="ti-vector"></i>
        <h6 class="box-title">Современный подход</h6>
        <p>Мы придерживаемся строгих стандартов при обслуживании наших клиентов, используя современную технику.</p>
    </div>
    <div class="box-item">
        <i class="ti-hand-open"></i>
        <h6 class="box-title">Большой опыт</h6>
        <p>Наши сотрудники хорошо разбираются во всех аспектах и нюансах звукорежиссуры, так как имеют большой опыт</p>
    </div>
    <div class="box-item">
        <i class="ti-microphone"></i>
        <h6 class="box-title">Качественное оборудование</h6>
        <p>В нашей студии вы найдёте самую лучшую и качественную аппаратуру, которая подойдёт абсолютно каждому.</p>
    </div>
</div>
<!-- End of Box -->

<!-- About Section -->
<section id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 col-lg-4">
                <img src="assets/imgs/about.jpg" class="w-100 img-thumbnail mb-3">
            </div>
            <div class="col-md-7 col-lg-8">
                <h6 class="section-subtitle mb-0">Мы создаем</h6>
                <h6 class="section-title mb-3">Настоящие хиты</h6>
                <p>Инженеры звука – сердце и душа студии звукозаписи. Они используют передовые аудиоинструменты и программное обеспечение, чтобы превратить запись в шедевр.</p>
                <p>Они следят за каждой деталью – от баланса громкости и пространственного размещения инструментов до эффектов и обработки звука.</p>
                <p>Это великая сила, создающая гармонию в музыке и делающая запись звучащей наилучшим образом.</p>
            </div>
        </div>
    </div>
</section>
<!-- End of About Section -->

<!-- About Section with bg -->
<section class="has-bg-img py-md">
    <div class="container text-center">
        <h6 class="section-subtitle">Что делаем мы</h6>
        <h6 class="section-title mb-6">Чего не делают другие.</h6>
        <div class="widget mb-4">
            <div class="widget-item">
                <i class="ti-notepad"></i>
                <h4>Анализируем</h4>
            </div>
            <div class="widget-item">
                <i class="ti-eye"></i>
                <h4>Оптимизируем</h4>
            </div>
            <div class="widget-item">
                <i class="ti-panel"></i>
                <h4>Создаём</h4>
            </div>
            <div class="widget-item">
                <i class="ti-thumb-up"></i>
                <h4>Результируем</h4>
            </div>
        </div>
    </div>
</section>
<!-- End Of About Sectoin -->

<!-- Service Section -->
<section id="service">
    <div class="container">
        <h6 class="section-subtitle text-center">Что конкретно мы делаем?</h6>
        <h5 class="section-title text-center mb-6">Наши услуги</h5>
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="mb-4"><i class="ti-microphone text-primary"></i></h2>
                        <h6 class="card-title">Запись</h6>
                        <p>Запись вашего голоса, используя самую лучшую технику и специальную комнату.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="mb-4"><i class="ti-panel text-primary"></i></h2>
                        <h6 class="card-title">Сведение</h6>
                        <p>Сводим ваш продукт, используя стандарты звучания каждого жанра.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="mb-4"><i class="ti-music-alt text-primary"></i></h2>
                        <h6 class="card-title">Аранжировка</h6>
                        <p>Помимо стандартных услуг студий, мы можем прямо при вас создать новый трек с нуля.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="mb-4"><i class="ti-control-forward text-primary"></i></h2>
                        <h6 class="card-title">Комплекс</h6>
                        <p>Берём три предыдущие услуги и складываем в одну услугу. Что может быть лучше?</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="mb-4"><i class="ti-bolt text-primary"></i></h2>
                        <h6 class="card-title">Продвижение</h6>
                        <p>Если вам нужно популязировать ваш продукт, наши ребята возьмутся за это!</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="mb-4"><i class="ti-palette text-primary"></i></h2>
                        <h6 class="card-title">Обложка</h6>
                        <p>Для вашего предстоящего релиза или альбома, создаём вместе с вами обложку.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="mb-4"><i class="ti-stats-up text-primary"></i></h2>
                        <h6 class="card-title">Личный менеджер</h6>
                        <p>Также, наш сотрудник может стать вашим личным менеджером.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="mb-4"><i class="ti-location-arrow text-primary"></i></h2>
                        <h6 class="card-title">Концерты</h6>
                        <p>Также, ваш личный менеджер может помочь вам в организации концертов.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End of Service Section -->

<!-- Portfolio section -->
<section id="portfolio">
    <div class="container text-center">
        <h6 class="section-subtitle">Чем мы гордимся</h6>
        <h6 class="section-title mb-5">Наше портфолио</h6>
        <div class="row">
            <div class="col-sm-4">
                <div class="img-wrapper">
                    <img src="assets/imgs/folio-1.jpg">
                    <div class="overlay">
                        <div class="overlay-infos">
                            <h5>Playboi Carti - Whole Lotta Red</h5>
                            <a href="https://www.youtube.com/watch?v=kmDXoHulZHs"><i class="ti-link"></i></a>
                        </div>
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="assets/imgs/folio-2.jpg">
                    <div class="overlay">
                        <div class="overlay-infos">
                            <h5>Big Baby Tape, Kizaru - BANDANA</h5>
                            <a href="https://www.youtube.com/watch?v=jy9sRIYzkO0"><i class="ti-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="img-wrapper">
                    <img src="assets/imgs/folio-3.jpeg">
                    <div class="overlay">
                        <div class="overlay-infos">
                            <h5>Friendly Thug 52 NGG - Cristoforo Colombo</h5>
                            <a href="https://www.youtube.com/watch?v=IoqpB8szkv0&t=1028s"><i class="ti-link"></i></a>
                        </div>
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="assets/imgs/folio-4.jpg">
                    <div class="overlay">
                        <div class="overlay-infos">
                            <h5>Yanix - G.O.A.T.uslugi</h5>
                            <a href="https://www.youtube.com/watch?v=REM9gnrrxeY"><i class="ti-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="img-wrapper">
                    <img src="assets/imgs/folio-5.jpg">
                    <div class="overlay">
                        <div class="overlay-infos">
                            <h5>Drake - Scorpion</h5>
                            <a href="https://www.youtube.com/watch?v=VtEBRE9ul90&list=PLFAcddgaFN8y1SrYofJmEIDWnXLbcrxoH"><i class="ti-link"></i></a>
                        </div>
                    </div>
                </div>
                <div class="img-wrapper">
                    <img src="assets/imgs/folio-6.jpg">
                    <div class="overlay">
                        <div class="overlay-infos">
                            <h5>Artik & Asti - Все хиты</h5>
                            <a href="https://www.youtube.com/watch?v=O4fdeq4V3-w"><i class="ti-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of portfolio section -->

<!-- Team Section -->
<section id="team">
    <div class="container">
        <h6 class="section-subtitle text-center">Познакомтесь</h6>
        <h6 class="section-title mb-5 text-center">С нашей командой</h6>
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="card text-center mb-4">
                    <img class="card-img-top inset" src="assets/imgs/avatar.jpg">
                    <div class="card-body">
                        <h6 class="small text-primary font-weight-bold">Владелец</h6>
                        <h5 class="card-title">Денисов Максим</h5>
                        <p>Владелец нашей студии звукозаписи, в прошлом очень известный артист, звукорежиссёр.</p>
                        <div class="socials">
                            <a href="https://facebook.com"><i class="ti-facebook"></i> </a>
                            <a href="https://soundcloud.com"><i class="ti-soundcloud"></i></a>
                            <a href="https://dropbox.com"><i class="ti-dropbox"></i></a>
                            <a href="https://twitter.com"><i class="ti-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card text-center mb-4">
                    <img class="card-img-top inset" src="assets/imgs/avatar-1.jpg">
                    <div class="card-body">
                        <h6 class="small text-primary font-weight-bold">Артист</h6>
                        <h5 class="card-title">Big Baby Tape</h5>
                        <p>ТОП-1 хип-хоп исполнитель в СНГ. Колоссальное кол-во платиновых пластинок, 100М+ стримов.</p>
                        <div class="socials">
                            <a href="https://facebook.com"><i class="ti-facebook"></i> </a>
                            <a href="https://soundcloud.com"><i class="ti-soundcloud"></i></a>
                            <a href="https://dropbox.com"><i class="ti-dropbox"></i></a>
                            <a href="https://twitter.com"><i class="ti-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card text-center mb-4">
                    <img class="card-img-top inset" src="assets/imgs/avatar-2.jpg">
                    <div class="card-body">
                        <h6 class="small text-primary font-weight-bold">Менеджер</h6>
                        <h5 class="card-title">Кристина Кросс</h5>
                        <p>Менеджер по продвижению с огромным опытом и большим списком достижений.</p>
                        <div class="socials">
                            <a href="https://facebook.com"><i class="ti-facebook"></i> </a>
                            <a href="https://soundcloud.com"><i class="ti-soundcloud"></i></a>
                            <a href="https://dropbox.com"><i class="ti-dropbox"></i></a>
                            <a href="https://twitter.com"><i class="ti-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card text-center mb-4">
                    <img class="card-img-top inset" src="assets/imgs/avatar-3.jpg">
                    <div class="card-body">
                        <h6 class="small text-primary font-weight-bold">Звукорежиссёр</h6>
                        <h5 class="card-title">Олег Леонов</h5>
                        <p>Звукорежиссёр, ранее работал на радио Studio 21 и был технарём на ВК Фесте и TommorowLand.</p>
                        <div class="socials">
                            <a href="https://facebook.com"><i class="ti-facebook"></i> </a>
                            <a href="https://soundcloud.com"><i class="ti-soundcloud"></i></a>
                            <a href="https://dropbox.com"><i class="ti-dropbox"></i></a>
                            <a href="https://twitter.com"><i class="ti-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card text-center mb-4">
                    <img class="card-img-top inset" src="assets/imgs/avatar-4.jpg">
                    <div class="card-body">
                        <h6 class="small text-primary font-weight-bold">Звукорежиссёр</h6>
                        <h5 class="card-title">Шамиль Али</h5>
                        <p>Звукорежиссёр, ранее был очень популярным артистом и менеджером многих поп и рэп-артистов.</p>
                        <div class="socials">
                            <a href="https://facebook.com"><i class="ti-facebook"></i> </a>
                            <a href="https://soundcloud.com"><i class="ti-soundcloud"></i></a>
                            <a href="https://dropbox.com"><i class="ti-dropbox"></i></a>
                            <a href="https://twitter.com"><i class="ti-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card text-center mb-4">
                    <img class="card-img-top inset" src="assets/imgs/avatar-5.jpeg">
                    <div class="card-body">
                        <h6 class="small text-primary font-weight-bold">Звукорежиссёр</h6>
                        <h5 class="card-title">Брайан Скотт</h5>
                        <p>Звукорежиссёр, прямиком из Лос-Анджелеса. Ранее работал в лейбле OWSLA.</p>
                        <div class="socials">
                            <a href="https://facebook.com"><i class="ti-facebook"></i> </a>
                            <a href="https://soundcloud.com"><i class="ti-soundcloud"></i></a>
                            <a href="https://dropbox.com"><i class="ti-dropbox"></i></a>
                            <a href="https://twitter.com"><i class="ti-twitter"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End of Team Sectoin -->

<!-- Fatcs Section -->
<section class="has-bg-img bg-img-2">
    <div class="container text-center">
        <h6 class="section-subtitle">Мы лучшие</h6>
        <h6 class="section-title mb-6">Наши достижения</h6>
        <div class="widget-2">
            <div class="widget-item">
                <i class="ti-cup"></i>
                <h6 class="title">100+</h6>
                <div class="subtitle">Выигранных наград и премий</div>
            </div>
            <div class="widget-item">
                <i class="ti-face-smile"></i>
                <h6 class="title">100+</h6>
                <div class="subtitle">Довольных клиентов</div>
            </div>
            <div class="widget-item">
                <i class="ti-blackboard"></i>
                <h6 class="title">845+</h6>
                <div class="subtitle">Выполненных проектов</div>
            </div>
            <div class="widget-item">
                <i class="ti-comments-smiley"></i>
                <h6 class="title">15K+</h6>
                <div class="subtitle">Отзывов о нас</div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section id="testimonial">
    <div class="container">
        <h6 class="section-subtitle text-center">Отзывы</h6>
        <h6 class="section-title text-center mb-6">Что о нас говорят клиенты?</h6>
        <div class="row">
            <div class="col-md-6">
                <div class="testimonial-wrapper">
                    <div class="img-holder">
                        <img src="assets/imgs/avatar-6.jpg">
                    </div>
                    <div class="body">
                        <p class="subtitle">После концерта в ЕКБ, мне нужно было дозаписать эксклюзивный новый трек с моего предстоящего альбома. Чуваки решили мой вопрос очень быстро и самое главное - качественно!</p>
                        <h6 class="title">Yanix</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="testimonial-wrapper">
                    <div class="img-holder">
                        <img src="assets/imgs/avatar-7.jpg">
                    </div>
                    <div class="body">
                        <p class="subtitle">Просто GOAT студия звукозаписи в городе Екатеринбург! Чуваки - профессионалы своего дела, так что им можно довериться</p>
                        <h6 class="title">ALBLAK 52</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Testimonial Section -->

<!-- Video Section -->
<section class="has-bg-img py-lg">
    <div class="container text-center">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary play-control" data-toggle="modal" data-target="#exampleModalCenter">
            <i class="ti-control-play" ></i>
        </button>
        <h6 class="section-title mt-4">Видео нашей студии звукозаписи</h6>

    </div>
</section>
<!-- End of Video Section -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/FYGCljz5kGc?si=VOKlVmpmXH5X1tS2" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</div>
<!-- end of modal -->


<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="contact-card">
            <div class="infos">
                <h6 class="section-subtitle">Получи информацию</h6>
                <h6 class="section-title mb-4">Свяжись с нами!</h6>

                <div class="item">
                    <i class="ti-location-pin"></i>
                    <div class="">
                        <h5>Местоположение</h5>
                        <p> Свердовская обл, г Екатеринбург, ул Маршалла Жукова, д 42</p>
                    </div>
                </div>
                <div class="item">
                    <i class="ti-mobile"></i>
                    <div>
                        <h5>Номер телефона</h5>
                        <p>(800) 555-3535</p>
                    </div>
                </div>
                <div class="item">
                    <i class="ti-email"></i>
                    <div class="mb-0">
                        <h5>Адрес электронной почты</h5>
                        <p>contact@bigshmouk.com</p>
                    </div>
                </div>
                <div class="item">
                    <i class="ti-world"></i>
                    <div class="mb-0">
                        <h5>bigshmouk.com</h5>
                        <p>contact@bigshmouk.com</p>
                    </div>
                </div>
            </div>
            <div class="form">
                <h6 class="section-subtitle">Доступны 24/7</h6>
                <h6 class="section-title mb-4">Свяжись с нами</h6>
                <form>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите свой адрес электронной почты" required>
                    </div>
                    <div class="form-group">
                        <textarea name="contact-message" id="" cols="30" rows="7" class="form-control form-control-lg" placeholder="Ваше сообщение"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg mt-3">Отправить сообщение</button>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section -->

<section class="has-bg-img py-0">
    <div class="container">
        <div class="footer">
            <div class="footer-lists">
                <ul class="list">
                    <li class="list-head">
                        <h6 class="font-weight-bold">О НАС</h6>
                    </li>
                    <li class="list-body">
                        <a href="#" class="logo">
                            <img src="assets/imgs/logo.png">
                            <h6>BIG SHMOUK RECORDS</h6>
                        </a>
                        <p>Создай свой лучший трек с лучшей командой. Присоединяйся!</p>
                        <p class="mt-3">
                            Copyright <script>document.write(new Date().getFullYear())</script> &copy; <a class="d-inline text-primary" href="http://www.vk.com/ey3cutter">BIG SHMOUK RECORDS</a>
                        </p>
                    </li>
                </ul>
                <ul class="list">
                    <li class="list-head">
                        <h6 class="font-weight-bold">ССЫЛКИ</h6>
                    </li>
                    <li class="list-body">
                        <div class="row">
                            <div class="col">
                                <a href="#about">О нас</a>
                                <a href="#service">Сервис</a>
                                <a href="#portfolio">Портфолио</a>
                            </div>
                            <div class="col">
                                <a href="#testmonail">Отзывы</a>
                                <a href="#team">Команда</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="list">
                    <li class="list-head">
                        <h6 class="font-weight-bold">КОНТАКТЫ</h6>
                    </li>
                    <li class="list-body">
                        <p>Заполните форму выше и мы с вами свяжемся в течении рабочего дня.</p>
                        <p><i class="ti-location-pin"></i>Свердовская обл, г Екатеринбург, ул Маршалла Жукова, д 42</p>
                        <p><i class="ti-email"></i>  contact@bigshmouk.com</p>
                        <div class="social-links">
                            <a href="https://facebook.com" class="link"><i class="ti-facebook"></i></a>
                            <a href="https://twitter.com" class="link"><i class="ti-twitter-alt"></i></a>
                            <a href="https://pinterest.com" class="link"><i class="ti-pinterest-alt"></i></a>
                            <a href="https://instagram.com" class="link"><i class="ti-instagram"></i></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- core  -->
<script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
<script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

<!-- bootstrap affix -->
<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

<!-- BigShmouk Studio js -->
<script src="assets/js/bigshmouk-studio.js"></script>

</body>
</html>
