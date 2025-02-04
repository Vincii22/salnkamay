<nav class="flex justify-between items-center p-4 bg-[rgba(255,255,255,0.6)] text-black border-b-1 border-gray-700 rounded-bl-3xl rounded-br-3xl">
    <!-- Left Side: Logo and Text -->
    <div class="flex items-center">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/2.png') }}" alt="Logo" class="h-10 mr-2">
        </a>
        <h4 class="text-lg font-bold">SALINKAMAY</h4>
    </div>

    <!-- Middle: Navigation Links -->
    <div>
        <ul class="flex space-x-6">
            <li><a href="{{ url('/home')}}" class="hover:text-gray-400">Home</a></li>
            <li><a href="{{ url('/about')}}" class="hover:text-gray-400">About Us</a></li>
            <li class="relative">
                <a href="#" class="hover:text-gray-400">More <span class="inline-block transform rotate-90 ml-1">&#x2193;</span></a>
                <!-- Dropdown Menu -->
                <ul class="absolute hidden bg-gray-800 text-white p-2 rounded-lg mt-2">
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Link</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Link</a></li>
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-700">Link</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- Right Side: Social Media Links -->
    <div class="flex space-x-4">
        <a href="#" class="hover:text-gray-400"><img src="{{ asset('images/4.png') }}" alt="Social 1" class="h-8"></a>
        <a href="#" class="hover:text-gray-400"><img src="{{ asset('images/5.png') }}" alt="Social 2" class="h-8"></a>
        <a href="#" class="hover:text-gray-400"><img src="{{ asset('images/6.png') }}" alt="Social 3" class="h-8"></a>
    </div>
</nav>

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
</script>
