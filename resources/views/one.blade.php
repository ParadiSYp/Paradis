<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paradis - French Restaurant</title>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .container {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 5px;
            background-color: #B27A41;
            margin: 0 120px 0 120px;
        }
        
        form {
            margin-top: 20px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #B27A41;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
        }
        button:hover {
            background-color: #4B2500;
        }
    </style>
</head>
<br>
    <!-- Navigation Bar -->
    <header class="header">
        <nav class="navbar">
            <div class="navbars">
                <div class="time">
                    <p>Время работы: 10:00 - 00:00</p>
                    <p>Адрес: Раиса Беляева 45А</p>
                </div>
                <div class="navbar-header">
                    <ul>
                        <li><a href="/">About Us</a></li>
                        <li><a href="menu">Menu</a></li>
                        <a href="/"><img src="img/logo.svg"></a>
                        <li><a href="delivery">Delivery</a></li>
                        <li><a href="reviews">Reviews</a></li>
                    </ul>
                </div>
                <div class="user-icon">
                    <div>
                        <a href="check"><img class="icons" src="{{ asset('img/corzina.svg') }}" alt="User Icon"></a>
                        <a href="login"><img class="icons" src="{{ asset('img/icon.svg') }}" alt="User Icon"></a>
                    </div>
                    @guest
                    <div class="line">
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                            </li>
                        @endif
                        <div class="lines">
                        </div>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                            </li>
                        @endif
                    </div>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main class="main-content">
        <div class="background-image">
            <img src="{{ asset('img/fon.jpg') }}" alt="Eiffel Tower Background">
        </div>
        <div class="overlay">
            <h1>Try real French cuisine</h1>
            <p>В нашем ресторане вы сможете насладиться истинными шедеврами французской кухни и погрузиться в атмосферу романтики Франции.</p>
        </div>
    </main>

    <section class="reservation">
        <form id="reservation-form">
            <div class="tex">
                <h2>Reserve Your Table</h2>
                <p>Забронируйте столик заранее, чтобы насладиться лучшими блюдами нашего шеф-повара и расположиться в уютной обстановке.</p>
            </div>
            <div class="forma">
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    @csrf
                    <div class="labe">
                        <label>Ваше имя:</label>
                        <input type="text" name="name" placeholder="Иван" required><br>
                    </div>
                    <div class="labe">
                        <label>Количество персон:</label>
                        <input type="number" name="guests" placeholder="2" required><br>
                    </div>
                    <div class="labe">
                        <label>Дата:</label>
                        <input type="date" name="date" required><br>
                    </div>
                    <div class="labe">
                        <label>Время:</label>
                        <input type="time" name="time" required><br>
                    </div>
                    <div class="click">
                        <button type="submit">Забронировать столик</button>
                    </div>
            </div>
        </form>
        </section>
        <div class="push" id="message"></div>
        <script>
            $(document).ready(function() {
                $('#reservation-form').on('submit', function(e) {
                    e.preventDefault(); // Предотвращаем стандартное поведение формы

                    $.ajax({
                        type: 'POST',
                        url: '{{ route("reserve.store") }}',
                        data: $(this).serialize(),
                        success: function(response) {
                            $('#message').html('<p style="color: white;">' + response.success + '</p>');
                            $('#reservation-form')[0].reset(); // Сбрасываем форму
                        },
                        error: function(xhr) {
                            if (xhr.status === 401) {
                                // Если пользователь не аутентифицирован, перенаправляем на страницу входа
                                window.location.href = '{{ route("login") }}';
                            } else {
                                let errors = xhr.responseJSON.errors;
                                let errorMessage = '<p style="color: red;">Пожалуйста, исправьте следующие ошибки:</p><ul>';
                                $.each(errors, function(key, value) {
                                    errorMessage += '<li>' + value[0] + '</li>'; // Показываем только первое сообщение об ошибке
                                });
                                errorMessage += '</ul>';
                                $('#message').html(errorMessage);
                            }
                        }
                    });
                });
            });
        </script>

    <!-- About Us Section -->
    <section class="about-us">
        <div class="about-content">
            <div class="contents">
                <h2>About Us</h2>
                <p>Ресторан «Paradis» — это уголок Франции в самом центре города. Мы приглашаем вас насладиться изысканными блюдами французской кухни, созданными из ингредиентов с вниманием к каждой детали. Каждое посещение — это уникальный гастрономический опыт, наполненный вкусами и ароматами, которые перенесут вас на улочки Парижа.</p>
            </div>
            <div>
                <img class="imgs" src="img/povar.png" alt="Restourant povar">
            </div>
        </div>
    </section>

    <!-- Highlights Section -->
    <section class="highlights">
        <div class="highlight">
            <img src="{{ asset('img/info1.svg') }}" alt="Drinks">
            <h3>Напитки на любой вкус</h3>
            <p>В нашем барном меню есть всё — от жареного эфиопского кофе до любых алкогольных напитков...</p>
        </div>
        <div class="highlight">
            <img src="{{ asset('img/info2.svg') }}" alt="Comfort Zone">
            <h3>Уютная, просторная зона!</h3>
            <p>Наслаждайтесь нашими индивидуальными стендами, которые расположены в наших просторных, хорошо освещенных залах...</p>
        </div>
        <div class="highlight">
            <img src="{{ asset('img/img3.svg') }}" alt="Variety of Menu">
            <h3>Разнообразное меню</h3>
            <p>У нас есть как мясные, так и вегетарианские блюда, а также вкусные десерты!</p>
        </div>
    </section>


    <section>
        <div class="contents-2">
                <h2>Favorite dishes of our guests</h2>
                <p>Наши любимые гости регулярно возвращаются к нам, чтобы насладиться своими излюбленными блюдами. В связи с этим мы рады представить вам специальную подборку самых популярных у наших посетителей кулинарных шедевров!…</p>
        </div>
        <div class="keks">
            <img src="img/keks.png" alt="">
        </div>
        <div class="clicks">
            <a href="menu"><button type="submit">Посмотреть все меню</button></a>
        </div>
    </section>

    <section class="kuhnya">
        <h1>The best ingredients</h1>
        <p>Мы очень гордимся тем, что тщательно подбираем ингредиенты для приготовления наших блюд, чтобы они были максимально вкусными и аутентичными. Мы можем достичь такого высокого уровня качества, только добавляя в наше меню особую тщательность, которую трудно найти в других ресторанах.</p>
        <div class="ingri">
            <img src="img/ingridient.png">
        </div>
    </section>

    <section class="povar">
       <div class="povar-text">
            <div class="povar-texts">
                <h1>Галичевин<br> Павел<br> Романович</h1>
                <p>— настоящий мастер своего дела, для которого гастрономия — не просто профессия, а призвание.                  </p>
            </div>
            <div class="povar-texts centr">
                <p>Our chef</p>
            </div>
            <div class="povar-texts">
                <p>Уже в 16 лет, будучи еще школьником, Виктор впервые оказался на профессиональной кухне. Начав с роли помощника повара, он шаг за шагом постигал секреты ремесла, проходя все этапы — от повара до су-шефа, пока в 22 года не стал шефом. Этот стремительный путь говорит о его преданности делу, целеустремленности и таланте, которые помогают ему каждый день создавать настоящие шедевры.</p>
            </div>
       </div>
    </section>
    </section>
    <div class="container">
        <h2>Отзывы</h2>
        
        @foreach($comments as $comment)
            <div class="review">
                <h3>{{ $comment->author }}</h3>
                <p>{{ $comment->content }}</p>
                <small>{{ $comment->created_at->format('d.m.Y H:i') }}</small>
            </div>
        @endforeach

        <!-- Форма для добавления нового отзыва -->
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <input type="text" name="author" placeholder="Ваше имя" required>
            <textarea name="content" placeholder="Ваш отзыв" required></textarea>
            <button type="submit">Отправить отзыв</button>
        </form>
    </div>

<!-- Подвал -->
<footer class="footer">
    <div class="footer-content">
        <div class="footer-column">
            <h3>Каталог еды</h3>
            <ul>
                <li><a href="menu">Супы</a></li>
                <li><a href="menu">Вторые блюда</a></li>
                <li><a href="menu">Мясные</a></li>
                <li><a href="menu">Деликатесы</a></li>
                <li><a href="menu">Выпечка</a></li>
                <li><a href="menu">Десерты</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Компания</h3>
            <ul>
                <li><a href="menu">Меню ресторана</a></li>
                <li><a href="#">Отзывы</a></li>
                <li><a href="#">Доставка</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Контакты</h3>
            <ul>
                <li><a href="mailto:example@mail.com">example@mail.com</a></li>
                <li>Чуйкова 55/1 (БЦ) Блахауз дд 69/67</li>
                <li><a href="tel:+7999999999">+7 999 999 99 99</a></li>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>
