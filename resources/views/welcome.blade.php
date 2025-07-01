<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <title>Welcome to Kobami</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @vite('resources/css/app.css') {{-- Tailwind via Vite --}}
</head>
<body class="bg-white text-[#022954] font-sans flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8">

    <main class="text-center max-w-xl mx-auto">
        <h1 class="text-5xl sm:text-6xl font-extrabold mb-6 tracking-tight leading-tight">
            Kobami
        </h1>

        <p class="text-lg sm:text-xl text-gray-600 mb-10 max-w-lg mx-auto">
            All-in-one delivery app for food, groceries, and errands across Malé and nearby islands.
        </p>

        <div class="flex justify-center space-x-6 mb-10">
            <!-- Login as bordered button -->
            <a href="{{ route('login') }}"
               class="px-8 py-3 rounded-xl font-semibold text-[#022954] border-2 border-[#022954] bg-white hover:bg-[#f3f4f6] transition shadow-sm hover:shadow-md focus:outline-none focus:ring-4 focus:ring-[#022954]/30">
                Log In
            </a>
            <!-- Sign Up as filled button -->
            <a href="{{ route('register') }}"
               class="px-8 py-3 rounded-xl font-semibold text-white bg-[#022954] hover:bg-[#011e3f] transition shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-[#022954]/50">
                Sign Up
            </a>
        </div>

        <p class="text-sm text-gray-400 tracking-wide select-none">
            Laravel + Flutter powered • Made for the Maldives
        </p>
    </main>

</body>
</html>
