<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    </head>
    <body class="font-sans antialiased bg-[#111315]">
        <div class="flex flex-col items-center min-h-screen pt-6 sm:justify-center sm:pt-0">
            

            <div class="text-white w-full p-8 mt-6 overflow-hidden border border-[#3A3A3A] bg-[#1C1F22] shadow-sm sm:max-w-md rounded">
                <div class="flex justify-center mb-4">
                    <a href="/">
                        <x-admin-component.application-logo class="w-20 h-20  fill-current" />
                    </a>
               </div>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
