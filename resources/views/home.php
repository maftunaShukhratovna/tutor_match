<?php components('header'); ?>

<body class="font-sans bg-gray-50">
    <!-- Navbar -->
    
<?php components('navbar'); ?>
    <!-- Hero Section -->
    <div class="text-center py-16 bg-white">
        <div class="relative inline-block">
            <img src="https://cdn.kastatic.org/images/lohp/hero_student_collage_US_1x.png" alt="Student" class="w-48 h-48 rounded-full mx-auto shadow-lg">
            <!-- Decorations -->
            <div class="absolute -top-4 -left-6 bg-yellow-400 w-8 h-8 rounded-full"></div>
            <div class="absolute top-6 -right-6 bg-orange-500 w-6 h-6 rounded"></div>
        </div>
        <h1 class="text-4xl font-bold text-gray-800 mt-8">For every student, every classroom.</h1>
        <p class="text-gray-600 mt-4 text-lg">We’re a nonprofit with the mission to provide a free, world-class education for anyone, anywhere.</p>
        <div class="flex justify-center space-x-4 mt-8">
            <a href="login" class="bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 font-medium shadow-md">Learners</a>
            <a href="login" class="bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 font-medium shadow-md">Teachers</a>
            <a href="login" class="bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 font-medium shadow-md">Admin</a>
        </div>
    </div>

    <?php components('footer'); ?>
    

