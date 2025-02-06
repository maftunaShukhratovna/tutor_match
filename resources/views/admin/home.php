<?php components("admins/header"); ?>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <?php components("admins/sidebar"); ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-semibold text-gray-800">Dashboard</h1>
            <p class="mt-4 text-gray-600">Overview of the application status.</p>
            
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-700">Total Students</h2>
                    <p class="text-gray-600 mt-2">Number of students</p>
                    <div class="mt-4 flex items-center space-x-2">
                        <span class="text-2xl font-bold text-gray-800">500</span>
                        <a href="students" class="bg-blue-600 text-white px-4 py-2 rounded-lg">View All Students</a>
                    </div>
                </div>

                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-700">Active Teachers</h2>
                    <p class="text-gray-600 mt-2">Number of active teachers</p>
                    <div class="mt-4 flex items-center space-x-2">
                        <span class="text-2xl font-bold text-gray-800">50</span>
                        <a href="activeteachers" class="bg-blue-600 text-white px-4 py-2 rounded-lg">View Active Teachers</a>
                    </div>
                </div>

                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-700">Registered Teachers</h2>
                    <p class="text-gray-600 mt-2">Number of registered teachers</p>
                    <div class="mt-4 flex items-center space-x-2">
                        <span class="text-2xl font-bold text-gray-800">13</span>
                        <a href="registeredteachers" class="bg-blue-600 text-white px-4 py-2 rounded-lg">View registered teachers</a>
                    </div>
                </div>

                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-700">Rejected Teachers</h2>
                    <p class="text-gray-600 mt-2">Number of rejected teachers</p>
                    <div class="mt-4 flex items-center space-x-2">
                        <span class="text-2xl font-bold text-gray-800">8</span>
                        <a href="rejectedteachers" class="bg-blue-600 text-white px-4 py-2 rounded-lg">View rejected teachers</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
