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
            <!-- Courses Section -->
            <div id="courses" class="content p-6 bg-gray-50 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold text-gray-800">My Classes</h1>
                    <button class="text-blue-600 font-medium hover:underline">Edit Classes</button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Course 1 -->
                    <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                        <h2 class="text-lg font-semibold text-gray-900">AP®/College Calculus AB</h2>
                        <p class="text-sm text-gray-600 mt-2">Master the fundamentals of Calculus AB.</p>
                        <div class="mt-4 text-sm text-gray-600 space-y-2">
                            <p>📌 Limits and continuity - <span class="font-medium text-gray-800">11% Mastered</span>
                            </p>
                            <p>📌 Differentiation: basic derivative rules</p>
                            <p>📌 Differentiation: composite, implicit, and inverse functions</p>
                        </div>
                        <button
                            class="mt-4 w-full px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600">
                            Start Course
                        </button>
                    </div>

                    <!-- Course 2 -->
                    <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                        <h2 class="text-lg font-semibold text-gray-900">AP®/College Statistics</h2>
                        <p class="text-sm text-gray-600 mt-2">Explore statistics with real-world applications.</p>
                        <div class="mt-4 text-sm text-gray-600 space-y-2">
                            <p>📌 Exploring categorical data - <span class="font-medium text-gray-800">52%
                                    Mastered</span></p>
                            <p>📌 Exploring one-variable quantitative data</p>
                            <p>📌 Exploring two-variable quantitative data</p>
                        </div>
                        <button
                            class="mt-4 w-full px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600">
                            Start Course
                        </button>
                    </div>

                    <!-- Course 3 -->
                    <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-6 hover:shadow-xl transition">
                        <h2 class="text-lg font-semibold text-gray-900">Introduction to Python</h2>
                        <p class="text-sm text-gray-600 mt-2">Learn Python programming from scratch.</p>
                        <div class="mt-4 text-sm text-gray-600 space-y-2">
                            <p>📌 Variables and Data Types</p>
                            <p>📌 Control Flow Statements</p>
                            <p>📌 Functions and Modules</p>
                        </div>
                        <button
                            class="mt-4 w-full px-4 py-2 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600">
                            Start Course
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
    window.onload = async function() {
    
        const { default: apiFetch } = await import('/js/utils/apiFetch.js');
        const response = await apiFetch('/students/getInfo', {
            method: 'GET',
        });

        console.log(response);
        document.getElementById('emailmain').innerText = response.data.email; 
  };

</script>


    <?php components('students/footer'); ?>