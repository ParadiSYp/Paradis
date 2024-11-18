<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paradis - French Restaurant</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Navigation Bar -->
    <header class="header">
        <nav class="navbar">
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="#">Delivery</a></li>
                <li class="logo">Paradis</li>
                <li><a href="#">Chefs</a></li>
                <li><a href="#">Reviews</a></li>
                <li><a href="#">Contacts</a></li>
            </ul>
            <div class="user-icon">
                <a href="#"><img src="{{ asset('images/user-icon.png') }}" alt="User Icon"></a>
            </div>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main class="main-content">
        <div class="background-image">
            <img src="{{ asset('images/eiffel-tower.jpg') }}" alt="Eiffel Tower Background">
        </div>
        <div class="overlay">
            <h1>Try real French cuisine</h1>
            <p>В нашем ресторане вы сможете насладиться истинными шедеврами французской кухни и погрузиться в атмосферу романтики Франции.</p>
        </div>
    </main>
</body>
</html>