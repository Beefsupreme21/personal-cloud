<!doctype html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Website</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

</head>

<body x-data="{ open: false }">
    <header>
        <x-mobile-nav />
        <x-desktop-nav />
    </header>

    <div class="flex flex-1 flex-col bg-[#1b1b1c] md:pl-64">
        <x-mobile-nav-toggle />
        <main class="max-w-screen-lg min-h-screen sm:px-16 md:px-24">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
