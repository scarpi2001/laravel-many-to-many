<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/js/app.js'])

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title>
    
</head>
<body>
    <div id="app">

        <main>
            @yield('content')
        </main>

    </div>
</body>                 
</html>