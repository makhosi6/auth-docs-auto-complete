<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <title inertia>{{ config('app.name', 'Bytee Studio') }}</title>

    <!-- Fonts -->
    <!-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> -->

    <link rel="stylesheet" href="../">
    <!-- Scripts -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-G7KH7EFNN4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-G7KH7EFNN4');
    </script>

    @routes
    @vite('resources/js/app.js')
    @inertiaHead
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');


        * {

            font-family: "Graphik", "Rubik", Arial, sans-serif !important;
            box-shadow: none !important;
        }

        button.font-semibold,
        .font-semibold {
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