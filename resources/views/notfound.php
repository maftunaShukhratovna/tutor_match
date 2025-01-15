<?php require '../resources/views/components/header.php';  ?>
<body class="bg-gradient-to-b from-gray-50 to-gray-100">
<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <h1 class="text-2xl font-bold text-indigo-600">Quiz App</h1>
            </div> 
            <div class="flex items-center space-x-4">
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#features" class="text-gray-600 hover:text-gray-900">Features</a>
                    <a href="#how-it-works" class="text-gray-600 hover:text-gray-900">How It Works</a>
                    <a href="/login" class="text-gray-600 hover:text-gray-900">Login</a>
                    <a href="/register"
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Register
                    </a>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="mobile-menu-button">
                        <i class="fas fa-bars text-gray-500 text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden mobile-menu md:hidden pl-3">
        <a href="#features" class="block my-2 text-xl text-gray-600 hover:text-gray-900">Features</a>
        <a href="#how-it-works" class="block my-2 text-xl text-gray-600 hover:text-gray-900">How It Works</a>
        <a href="/login" class="block my-2 text-xl text-gray-600 hover:text-gray-900">Login</a>
        <a href="/register"
           class="block my-2 text-xl inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
            Register
        </a>
    </div>
</nav>

<main>
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                <span class="block">404 Error</span>
                <span class="block text-indigo-600">Page Not Found</span>
            </h1>
            <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                The page you're looking for doesn't exist or has been moved. Please check the URL or go back to the homepage.
            </p>
            <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                <div class="rounded-md shadow">
                    <a href="/"
                       class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:px-10">
                        Go Back to Homepage
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    // Mobile menu toggle
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
<?php require '../resources/views/components/footer.php';  ?>
