<?php components('students/header'); ?>

<body class="bg-white">
    <?php components('students/navbar'); ?>

    <div class="max-w-8xl mx-auto mt-8 bg-purple-100 p-4 rounded-lg shadow">
        <?php components('students/topnavigation'); ?>
    </div>

    <div class="flex h-full">
        <!-- Sidebar -->
        <?php components('students/sidebar'); ?>

        <!-- Main Content -->
        <div class="flex-1 bg-white p-8 overflow-auto">
            <div id="all-classes" class="content p-6 bg-gray-50 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold text-gray-800">All Classes</h1>
                    <input type="text" id="searchInput" placeholder="Search classes..." 
                        class="px-4 py-2 border rounded-lg w-1/3 focus:ring focus:ring-blue-300">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Class Card Template (Repeat this for each class) -->
                    <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                        <h2 class="text-lg font-semibold text-gray-900">Introduction to Python</h2>
                        <p class="text-sm text-gray-600 mt-2">Learn Python programming from scratch.</p>
                        <p class="text-sm text-gray-600 mt-2">👨‍🏫 Instructor: <span class="font-medium text-gray-800">John Doe</span></p>
                        <p class="text-sm text-gray-600 mt-2">📌 Students Enrolled: <span class="font-medium text-gray-800">25 / 30</span></p>
                        
                        <div class="mt-4 flex justify-between">
                            <button class="px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600">
                                See Full Info
                            </button>
                            <button class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600">
                                Enroll
                            </button>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                        <h2 class="text-lg font-semibold text-gray-900">AP®/College Statistics</h2>
                        <p class="text-sm text-gray-600 mt-2">Explore statistics with real-world applications.</p>
                        <p class="text-sm text-gray-600 mt-2">👨‍🏫 Instructor: <span class="font-medium text-gray-800">Jane Smith</span></p>
                        <p class="text-sm text-gray-600 mt-2">📌 Students Enrolled: <span class="font-medium text-gray-800">18 / 20</span></p>
                        
                        <div class="mt-4 flex justify-between">
                            <button class="px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600">
                                See Full Info
                            </button>
                            <button class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600">
                                Enroll
                            </button>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                        <h2 class="text-lg font-semibold text-gray-900">Web Development Basics</h2>
                        <p class="text-sm text-gray-600 mt-2">Learn how to build modern websites.</p>
                        <p class="text-sm text-gray-600 mt-2">👨‍🏫 Instructor: <span class="font-medium text-gray-800">Emily Johnson</span></p>
                        <p class="text-sm text-gray-600 mt-2">📌 Students Enrolled: <span class="font-medium text-gray-800">10 / 25</span></p>
                        
                        <div class="mt-4 flex justify-between">
                            <button class="px-4 py-2 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600">
                                See Full Info
                            </button>
                            <button class="px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600">
                                Enroll
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php components('students/footer'); ?>
</body>
