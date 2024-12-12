<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paradis - French Restaurant</title>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-delivery.css') }}">
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
            <img src="{{ asset('img/fon_delivery.jpg') }}" alt="Eiffel Tower Background">
        </div>
        <div class="overlay">
            <h1>A taste of France at your home!</h1>
            <p>Погрузитесь в атмосферу французской кухни, не выходя из дома!
                Наш ресторан предлагает услугу доставки, чтобы вы могли насладиться изысканными блюдами прямо у себя на столе. </p>
        </div>
    </main>

    <div class="delivery-section">
        <div class="tex">
        <h2>Delivery services</h2>
        </div>
        <div class="delivery-content">
            <h3 class="delivery-subtitle">Стоимость доставки</h3>

            <div class="delivery-prices">
                <p>Новый город, 40 к.с. Отрадна, Притяжение - 300 руб, от 2000 руб - бесплатно;</p>
                <p>Чапаев, пр - 300 руб, от 2000 - бесплатно;</p>
                <p>21, 24, 44, 65, 69 к.см - 350 руб, от 2000 руб - бесплатно;</p>
                <p>МЖК - 400 руб, от 2000 руб - бесплатно;</p>
                <p>Юсш к/са - 400 руб, от 2000 руб - бесплатно;</p>
                <p>7ой микр - 400 руб, от 2000 - бесплатно;</p>
                <p>ПСК - 400 руб - бесплатно;</p>
                <p>Нижнегорск - 450 руб, от 2500 руб - бесплатно;</p>
                <p>Садоводка - 600 руб, от 3000 руб - бесплатно;</p>
                <p>М.Шоссе13 - 650 руб, от 10000 руб - бесплатно;</p>
                <p>Прохлада - 700 руб, от 10000 руб - бесплатно;</p>
                <p>Тепличный - 800 руб, от 10000 руб - бесплатно;</p>
                <p>Заторы, баэс отрада - 850 руб, от 10000 - бесплатно;</p>
            </div>

            <div class="delivery-time">
                <p>Время доставки - 60-90 минут, за город и в промзону - до 1,5 часов и, конечно, в зависимости от погодных условий время может меняться!</p>
                <p>Заказы принимаются с 11.00 до 23.00 часов!</p>
            </div>

            <button class="order-button">
                Перейти к оформлению
            </button>
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
