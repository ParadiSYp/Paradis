<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paradis - French Restaurant</title>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-reviews.css') }}">

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
                        <li><a href="#">About Us</a></li>
                        <li><a href="menu">Menu</a></li>
                        <a href="/"><img src="img/logo.svg"></a>
                        <li><a href="#">Delivery</a></li>
                        <li><a href="#">Reviews</a></li>
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
            <img src="{{ asset('img/fon_reserve.jpg') }}" alt="Eiffel Tower Background">
        </div>
        <div class="overlay">
            <h1>Paradis is the place for any food-accompanied occasion!</h1>
            <p>Будь то деловая встреча, семейный ужин по случаю дня рождения, юбилей, романтический ужин с предложением руки и сердца или любое другое мероприятие, мы позаботимся о том, чтобы атмосфера и блюда были подобраны по достоинству!</p>
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

<div class="tables-container">
    <div class="tex">
    <p>Выберите понравившийся столик:</p>
    </div>

    <div class="tables-grid">
        <!-- Столик 1 -->
        <div class="table-item single">
            <img src="img/sticker1.png" alt="Столик 1">
        </div>

        <!-- Столик 2 -->
        <div class="table-item round">
            <img src="img/sticker2.png" alt="Столик 2">
        </div>

        <!-- Столик 3 -->
        <div class="table-item single">
            <img src="img/sticker3.png" alt="Столик 3">
        </div>

        <!-- Столик 4 -->
        <div class="table-item long">
            <img src="img/sticker4.png" alt="Столик 4">
        </div>

        <!-- Столик 5 -->
        <div class="table-item square">
            <img src="img/sticker5.png" alt="Столик 5">
        </div>

        <!-- Столики 6-8 -->
        <div class="table-item square">
            <img src="img/sticker6.png" alt="Столик 6">
        </div>

        <div class="table-item square">
            <img src="img/sticker7.png" alt="Столик 7">
        </div>

        <div class="table-item round">
            <img src="img/sticker8.png" alt="Столик 8">
        </div>
    </div>
</div>

<!-- Подвал -->
<footer class="footer">
    <div class="footer-content">
        <div class="footer-column">
            <h3>Каталог еды</h3>
            <ul>
                <li><a href="#">Супы</a></li>
                <li><a href="#">Вторые блюда</a></li>
                <li><a href="#">Мясные</a></li>
                <li><a href="#">Деликатесы</a></li>
                <li><a href="#">Выпечка</a></li>
                <li><a href="#">Десерты</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3>Компания</h3>
            <ul>
                <li><a href="#">Меню ресторана</a></li>
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
