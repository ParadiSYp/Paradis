<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/basket.css') }}">
    <title>Basket</title>
</head>
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
                    <a href="login"><img class="icons" src="{{ asset('img/corzina.svg') }}" alt="User Icon"></a>
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

<body>
    <main>
        <div class="basket">
            <h2>КОРЗИНА</h2>
        </div>

        <div class="parent">
            <div class="rectangle text_center_middle">№</div>
            <div class="rectangle text_center_middle">Фото</div>
            <div class="rectangle text_center_middle">Название блюда</div>
            <div class="rectangle text_center_middle">Цена за шт.</div>
            <div class="rectangle text_center_middle">Количество</div>
            <div class="rectangle text_center_middle">Цена</div>
        </div>
        <a href="{{ route('checkout.index') }}">
            <div class="form-btn">
                <button type="submit">Перейти к офрмлению</button>
            </div>
        </a>
    </main>
</body>

</html>
