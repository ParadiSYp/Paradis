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
                <div class="time">
                    <p>Время работы: 10:00 - 00:00</p>
                    <p>Адрес: Раиса Беляева 45А</p>
                </div>
                <div class="navbar-header">
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Menu</a></li>
                        <img src="img/logo.svg">
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
                        <input type="text" name="name" placeholder="Ваше имя" required><br>
                    </div>
                    <div class="labe">
                        <label>Количество персон:</label>
                        <input type="number" name="guests" placeholder="Количество персон" required><br>
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
                <img src="img/povar.png" alt="Restourant povar">
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


    
</body>
</html>