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
                    <h1 class="text-3xl font-bold text-gray-800">My Courses</h1>
                    <button class="text-blue-600 font-medium hover:underline">Edit Courses</button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
    window.onload = async function() {

        const {
            default: apiFetch
        } = await import('/js/utils/apiFetch.js');
        const response = await apiFetch('/students/getInfo', {
            method: 'GET',
        });

        console.log(response);
        document.getElementById('emailmain').innerText = response.data.email;
    };
    </script>


    <?php components('students/footer'); ?>