<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>
<body>
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


                            @if(\Illuminate\Support\Facades\Auth::check())
                                @if(\Illuminate\Support\Facades\Auth::user()->role === 'admin')
                                    <a class="dropdown-item" href="/admin">Админ панель</a>
                                @endif
                                <p></p>
                            @endif


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
    <section class="admin">
        <h2>Изменить продукт</h2>
        <div class="table">
            <div class="thead">
                <div class="table-row users">
                    <span>id</span>
                    <span>Имя</span>
                    <span>Почта</span>
                    <span>Роль</span>
                </div>
            </div>
            <div class="t-body">
                @foreach($users as $user)
                    <div class="table-row preview-row users">
                        <div class='td'>
                            {{ $user->id }}
                        </div>
                        <div class='td'>
                            {{ $user->name }}
                        </div>
                        <div class="td table-description__admin desc">
                            {{ $user->email }}
                        </div>
                        <div class='td'>
                            {{ $user->role }}
                        </div>
                    </div>
                @endforeach
            </form>



        </div>
    </section>
    </main>

</body>
</html>