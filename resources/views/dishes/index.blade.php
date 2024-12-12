<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paradis - French Restaurant</title>
    <link rel="stylesheet" href="{{ asset('css/style-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">

</head>
<body>
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
                        <li><a href="">Delivery</a></li>
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
            <img src="{{ asset('img/menu_fon.jpg') }}" alt="Eiffel Tower Background">
        </div>
        <div class="overlay">
            <h1>Check out our gourmet Menu</h1>
            <p>«Наше меню» – это дань уважения французской кухне. От нежного утиного конфи до изысканных десертов – мы предлагаем блюда, которые порадуют настоящих гурманов. Каждое блюдо создано с вниманием и любовью, чтобы передать традиции и мастерство мировых производителей, славящихся Францией.</p>
        </div>
    </main>

    <div class="container">
        <div class="tex">
        <h2>Perhaps you will like one of our dishes</h2>
        <p class="subtitle">Каждое блюдо создано с вниманием и любовью, чтобы передать традиции и мастерство мировых производителей, славящихся Францией.</p>
        </div>
        <!-- Навигация по категориям -->
        <div class="navigation">
            <button class="category-btn" data-category="soups">Супы</button>
            <button class="category-btn" data-category="main_courses">Вторые блюда</button>
            <button class="category-btn" data-category="snacks">Закуски</button>
            <button class="category-btn" data-category="delicacies">Деликатесы</button>
            <button class="category-btn" data-category="baking">Выпечка</button>
            <button class="category-btn" data-category="desserts">Десерты</button>
        </div>

        <!-- Карточки -->
        <div class="cards-container">
            @foreach ($dishes as $category => $items)
                <div class="cards hidden" id="{{ $category }}">
                    @foreach ($items as $dish)
                        <div class="card">
                            <img src="{{ asset('images/' . $dish['image']) }}" alt="{{ $dish['name'] }}">
                            <h3>{{ $dish['name'] }}</h3>
                            <p>{{ $dish['description'] }}</p>
                            <div class="price-button-container">
                                <p class="price">{{ $dish['price'] }} РУБ.</p>
                                <button>В корзину</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <script>
        // Переключение категорий
        const buttons = document.querySelectorAll('.category-btn');
        const cards = document.querySelectorAll('.cards');
        buttons.forEach(button => {
            button.addEventListener('click', () => {
                // Скрыть все карточки
                cards.forEach(card => card.classList.add('hidden'));
                // Показать выбранную категорию
                const category = button.getAttribute('data-category');
                document.getElementById(category).classList.remove('hidden');
            });
        });
        // Показать первую категорию по умолчанию
        document.getElementById('soups').classList.remove('hidden');
</script>
</body>
</html>
