<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Videogames</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <livewire:styles>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body class="bg-gray-900 text-white">
    <header class="border-b border-gray-800">
        <nav class="container mx-auto flex flex-col lg:flex-row item-center justify-between px-4 py-6">
            <div class="flex flex-col lg:flex-row item-center">
                <a href="/">
                    <img src="/download.png" alt="laracasts" class="w-20 flex-none">
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
               <livewire:search-dropdown>
                <div class="ml-6">
                     <a href="#"><img src="/ava.svg" alt="avatar" class="rounded-full w-8"></a>
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
<livewire:scripts>
<script src="../../js/app.js"></script>
    @stack('scripts')
</body>
</html>
