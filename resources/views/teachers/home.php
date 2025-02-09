<?php components("teachers/header"); ?>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navbar -->
    <?php components("teachers/navbar"); ?>

    <div class="flex flex-grow">
        <!-- Sidebar -->
        <?php components("teachers/sidebar"); ?>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Student Section -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-6 flex items-center justify-between mt-4 relative overflow-hidden">
                <!-- Matn qismi -->
                <div class="max-w-md z-10">
                    <h2 class="text-2xl font-semibold text-gray-800">It's better with students!</h2>
                    <p class="text-gray-600 mt-2">
                        Get a live view into your students' progress, targeted assignment recommendations, and so much more!
                    </p>
                    <a href="createclass" class="mt-4 bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded-md">
                        Create a class
                    </a>
                </div>

                <!-- Rasm qismi -->
                <div class="relative w-60">
                    <img src="https://cdn.kastatic.org/images/coach-dashboard/create-class-student-heads.png" 
                         alt="Students Illustration" class="w-full object-cover">
                </div>
            </div>
        </div>
    </div>

    <?php components("teachers/footer"); ?>
