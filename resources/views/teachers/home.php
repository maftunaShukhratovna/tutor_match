<?php components("teachers/header"); ?>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navbar -->
<?php components("teachers/navbar"); ?>
    

    <div class="flex flex-grow">
        <!-- Sidebar -->
<?php components("teachers/sidebar"); ?>
        

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-semibold text-gray-800">Teacher Dashboard</h1>
            <p class="mt-4 text-gray-600">Overview of your teaching activities and classes.</p>

            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                
                <!-- Create Class Card
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-700">Create a New Class</h2>
                    <p class="text-gray-600 mt-2">Add a new class to share with students.</p>
                    <div class="mt-4 flex items-center space-x-2">
                        <a href="/teacher/createclass" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Create Class</a>
                    </div>
                </div>

                My Profile Card -->
                <!-- <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-700">My Profile</h2>
                    <p class="text-gray-600 mt-2">View or edit your personal information.</p>
                    <div class="mt-4 flex items-center space-x-2">
                        <a href="/teacher/profile" class="bg-blue-600 text-white px-4 py-2 rounded-lg">View Profile</a>
                    </div>
                </div> -->

                <!-- My Classes Card -->
                <!-- <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-700">My Classes</h2>
                    <p class="text-gray-600 mt-2">View and manage your ongoing classes.</p>
                    <div class="mt-4 flex items-center space-x-2">
                        <a href="/teacher/classes" class="bg-blue-600 text-white px-4 py-2 rounded-lg">View My Classes</a>
                    </div>
                </div> --> 

            </div>
        </div>
    </div>

</body>
</html>
