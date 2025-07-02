<!DOCTYPE html>
<html lang="tr" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>MyNotes</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js CDN (dropdown, toggle vs için şart) -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-thumb {
            background: #d53f8c;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-purple-900 via-indigo-800 to-blue-900 min-h-screen p-4 text-white">

    <!-- Navbar -->
    @include('layouts.navigation')

    <!-- Sayfa İçeriği -->
    <main class="pt-6">
        @yield('content')
    </main>

</body>
</html>
