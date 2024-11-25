<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paradis - French Restaurant</title>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>
<br>
    <!-- Navigation Bar -->
    <header class="header">
        <nav class="navbar">
            <div class="navbars">
                <div class="navbar-header">
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Menu</a></li>
                        <li><a href="#">Delivery</a></li>
                        <img src="img/logo.svg">
                        <li><a href="#">Chefs</a></li>
                        <li><a href="#">Reviews</a></li>
                        <li><a href="#">Contacts</a></li>
                    </ul>
                </div>
                <div class="user-icon">
                    <a href="login"><img class="icons" src="{{ asset('img/icon.svg') }}" alt="User Icon"></a>
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
                                {{ __('Logout') }}
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
        <div class="tex">
            <h2>Reserve Your Table</h2>
            <p>Забронируйте столик заранее, чтобы насладиться лучшими блюдами нашего шеф-повара и расположиться в уютной обстановке.</p>
        </div>
        <div class="forma">  
            <form class="reservation-form">
                <div class="labe">
                    <label>Ваше имя</label>
                    <input type="text" name="name" placeholder="Ваше имя" value="Иван" required>
                </div>
                <div class="labe">
                    <label>Количество персон</label>
                    <input type="number" name="guests" placeholder="Количество персон" value="4" required>
                </div>
                <div class="labe">
                    <label>Дата</label>
                    <input type="date" name="date" value="2024-01-01" required>
                </div>
                <div class="labe"> 
                    <label>Время</label>
                    <input type="time" name="time" value="16:00" required>
                </div>
                <div class="click">
                    <button type="submit">Забронировать столик</button>
                </div>
            </form>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="about-us">
        <div class="about-content">
            <div class="contents">
                <h2>About Us</h2>
                <p>Ресторан «Paradis» — это уголок Франции в самом центре города. Мы приглашаем вас насладиться изысканными блюдами французской кухни, созданными из ингредиентов с вниманием к каждой детали. Каждое посещение — это уникальный гастрономический опыт, наполненный вкусами и ароматами, которые перенесут вас на улочки Парижа.</p>
            </div>
            <div>
                <img src="img/povar.png" alt="Restourant povar">
            </div>
        </div>
    </section>
</body>
</html>