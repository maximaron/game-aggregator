<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Videogames</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white">
    <header class="border-b border-gray-800">
        <nav class="container mx-auto flex flex-col lg:flex-row item-center justify-between px-4 py-6">
            <div class="flex flex-col lg:flex-row item-center">
                <a href="/">
                    <img src="/laracasts-logo.svg" alt="laracasts" class="w-32 flex-none">
                </a>
                <ul class="flex ml-0 lg:ml-16 space-x-8 mt-6 lg:mt-0">
                    <li>
                        <a href="#" class="hover:text-gray-400">Games</a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-gray-400">Reviews</a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-gray-400">Coming soon</a>
                    </li>
                </ul>
            </div>
            <div class="flex items-center mt-6 lg:mt-0">
                <div class="relative">
                    <input type="text" class="bg-gray-800 text-sm rounded-full focus:outline-none focus:shadow-outline w-64 px-3 py-1" placeholder="Search...">
                    <div class="absolute top-0">
                        a
                    </div>
                </div>
                <div class="ml-6">
                     <a href="#"><img src="/avatar.jpg" alt="avatar" class="rounded-full w-8"></a>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-8">
        @yield('content')
    </main>

    <footer class="border-t border-gray-800">
        <div class="content mx-auto px-4 py-6">
            Powered by <a href="#" class="underline hover:text-gray-400">IGDB API</a>
        </div>
    </footer>
</body>
</html>
