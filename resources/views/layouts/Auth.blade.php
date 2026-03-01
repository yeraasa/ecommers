<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Midnight Bloom')</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#11b4d4",
                        "background-light": "#f6f8f8",
                        "background-dark": "#101f22",
                    },
                    fontFamily: {
                        display: ["Manrope", "sans-serif"]
                    },
                },
            },
        }
    </script>

    <style>
        body {
            font-family: 'Manrope', sans-serif;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-background-light dark:bg-background-dark min-h-screen flex items-center justify-center">
    @yield('content')
    @stack('scripts')
</body>
</html>
