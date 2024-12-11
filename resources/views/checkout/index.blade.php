{{-- resources/views/checkout/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
    <title>Оформление заказа</title>
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
<main>
    <div class="container">
        <div class="form-container">
            <form action="#" method="POST">
                <div class="radio-group">
                    <label class="custom-radio">
                        <input type="radio" name="option" value="option1">
                        <span>Доставка</span>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" name="option" value="option2">
                        <span>Самовывоз</span>
                    </label>
                </div>
                <div class="form-group">
                    <input type="text" id="address" name="address" placeholder="Укажите адрес" required>
                </div>

                <div class="form-group inline-fields">
                    <div class="form-input">
                        <input type="text" id="entrance" name="entrance" placeholder="Подъезд" required>
                    </div>
                    <div>
                        <input type="text" id="intercom" name="intercom" placeholder="Домофон" required>
                    </div>
                </div>
                <div class="form-group inline-fields">
                    <div class="form-input">
                        <input type="text" id="entrance" name="entrance" placeholder="Этаж" required>
                    </div>
                    <div>
                        <input type="text" id="intercom" name="intercom" placeholder="Квартира" required>
                    </div>
                </div>
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox" name="private_home">
                        Частный дом
                    </label>
                </div>
                <div class="form-group">
                    <textarea id="comment" name="comment" rows="4" placeholder="Примечание к адресу" required></textarea>
                </div>
                <div class="checkbox-group">
                    <label>
                        <input type="checkbox" name="private_home">
                        Сохранить адрес для следующих заказов
                    </label>
                </div>
                <div class="radio-groups">
                    <label class="inline-radio">
                        <input type="radio" name="payment_method" value="cash">
                        <span>Наличные</span>
                    </label>
                    <label class="inline-radio">
                        <input type="radio" name="payment_method" value="card">
                        <span>Картой</span>
                    </label>
                    <label class="inline-radio">
                        <input type="radio" name="payment_method" value="transfer">
                        <span>Переводом</span>
                    </label>
                </div>
                <div class="form-btn">
                    <button type="submit">Оформить заказ</button>
                </div>
            </form>
        </div>

        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=" width="500" height="633" style="border:0;"
                allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</main>

</html>
<script>
    document.querySelectorAll('.custom-radio input').forEach(radio => {
        radio.addEventListener('change', function() {
            // Удаляем класс 'selected' у всех кнопок
            document.querySelectorAll('.custom-radio').forEach(button => {
                button.classList.remove('selected');
            });

            // Добавляем класс 'selected' к выбранной кнопке
            if (this.checked) {
                this.parentElement.classList.add('selected');
            }
        });
    });
</script>
