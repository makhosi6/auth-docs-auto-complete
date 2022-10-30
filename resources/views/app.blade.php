<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <!-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> -->

        <link rel="stylesheet" href="../">
        <!-- Scripts -->


        @routes
        @vite('resources/js/app.js')
        @inertiaHead
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');
@font-face {
    font-family: 'Graphik';
    src: url('/build/assets/GraphikRegular.ttf');
    src: url('/build/assets/GraphikRegular.otf?#iefix') format('embedded-opentype'),
        url('/build/assets/GraphikRegular.ttf') format('truetype'),
}


* {

    font-family: "Graphik", "Rubik", Arial, sans-serif !important;
    box-shadow: none !important;
}

button.font-semibold, .font-semibold {
    font-weight: normal !important;
}

*:not(img) {
    border-radius: 0 !important;

}
        </style>
    </head>
    <body>
        @inertia
    </body>
</html>
