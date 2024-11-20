<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paradis - French Restaurant</title>
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>
<body>
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
                    <a href="#"><img src="{{ asset('img/icon.svg') }}" alt="User Icon"></a>
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
</body>
</html>