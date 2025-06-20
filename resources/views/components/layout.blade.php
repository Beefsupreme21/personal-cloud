<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Website</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Handlee&display=swap" rel="stylesheet">
    <style>
        [x-cloak] {
            display: none !important;
        }
        .playfair-display {
            font-family: "Playfair Display", serif;
            font-weight: 700;
            font-style: normal;
        }
        .handlee-regular {
            font-family: "Handlee", cursive;
            font-weight: 400;
            font-style: normal;
        }

    </style>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

</head>

<body x-data="{ open: false }">
    <header>
        <x-mobile-nav />
        <x-desktop-nav />
    </header>

    <div class="flex flex-1 flex-col bg-[#1b1b1c] md:pl-64 min-h-screen">
        <x-mobile-nav-toggle />
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>
