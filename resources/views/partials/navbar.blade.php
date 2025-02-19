<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<nav class="flex justify-between items-center p-4 bg-[rgba(255,255,255,0.6)] text-black border-b-1 border-gray-700 rounded-bl-3xl rounded-br-3xl">
    <!-- Left Side: Logo and Text -->
    <div class="flex items-center">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/2.png') }}" alt="Logo" class="h-10 mr-2">
        </a>
        <a href="{{ url('/') }}"> <h4 class="text-lg font-bold font-[Garet]">SALINKAMAY</h4> </a>
    </div>

    <!-- Middle: Navigation Links (Hidden on Mobile) -->
    <div class="hidden md:block">
        <ul class="flex space-x-6">
            <li><a href="{{ url('/home')}}" class="hover:text-gray-400 font-[Garet]">Home</a></li>
            <li><a href="{{ url('/about')}}" class="hover:text-gray-400 font-[Garet]">About Us</a></li>
            <li class="relative">
                <a href="#" class="hover:text-gray-400 font-bold font-[Garet]">More <i class="fa fa-chevron-down"></i></a>
                <!-- Dropdown Menu -->
                <ul class="absolute hidden bg-gray-800 text-white p-2 rounded-lg mt-2">
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 font-[Garet]">Link</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 font-[Garet]">Link</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-700 font-[Garet]">Link</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- Hamburger Menu (Visible on Mobile) -->
    <div class="md:hidden flex items-center">
        <button id="hamburger" class="text-2xl">
            <i class="fa fa-bars"></i>
        </button>
    </div>

    <!-- Right Side: Social Media Links -->
    <div class="hidden md:flex space-x-4">
        <a href="#" class="hover:text-gray-400"><img src="{{ asset('images/4.png') }}" alt="Social 1" class="h-8"></a>
        <a href="#" class="hover:text-gray-400"><img src="{{ asset('images/5.png') }}" alt="Social 2" class="h-8"></a>
        <a href="#" class="hover:text-gray-400"><img src="{{ asset('images/6.png') }}" alt="Social 3" class="h-8"></a>
    </div>
</nav>

<!-- Mobile Menu Dropdown -->
<div id="mobileMenu" class="md:hidden bg-gray-800 text-white w-full p-4 hidden">
    <ul>
        <li><a href="{{ url('/home') }}" class="block px-4 py-2 hover:bg-gray-700 font-[Garet]">Home</a></li>
        <li><a href="{{ url('/about') }}" class="block px-4 py-2 hover:bg-gray-700 font-[Garet]">About Us</a></li>
        <li class="relative">
            <a href="#" class="block px-4 py-2 hover:bg-gray-700 font-bold font-[Garet]">More <i class="fa fa-chevron-down"></i></a>
            <ul class="absolute hidden bg-gray-700 text-white p-2 rounded-lg mt-2">
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-600 font-[Garet]">Link</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-600 font-[Garet]">Link</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-600 font-[Garet]">Link</a></li>
            </ul>
        </li>
    </ul>
</div>

<script>
    // Show dropdown menu when hovering "More"
    document.querySelectorAll('.relative').forEach(item => {
        item.addEventListener('mouseenter', () => {
            item.querySelector('ul').classList.remove('hidden');
        });
        item.addEventListener('mouseleave', () => {
            item.querySelector('ul').classList.add('hidden');
        });
    });

    // Mobile Hamburger Menu
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');
    hamburger.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Mobile Dropdown Toggle
    document.querySelectorAll('.relative > a').forEach(item => {
        item.addEventListener('click', (e) => {
            const dropdown = item.nextElementSibling;
            if (dropdown) {
                dropdown.classList.toggle('hidden');
                e.preventDefault();
            }
        });
    });
</script>
