<?php components("teachers/header") ?>

<body class="bg-gray-50 flex flex-col min-h-screen">

    <?php components("teachers/navbar") ?>

    <!-- Content -->
    <div id="pending" class="flex-grow flex items-center justify-center px-4 hidden">
        <div class="bg-white shadow-lg rounded-2xl text-center p-8 max-w-md w-full">
            <!-- Xush kelibsiz -->
            <h1 class="text-2xl font-bold text-blue-600">Welcome!!!</h1>
            <h6 id="fullname" class="text-xl font-bold text-black"></h6>

            <p class="text-gray-700 mt-2 text-lg font-medium">You registered as a teacher</p>

            <!-- Loading animatsiya -->
            <div class="flex justify-center mt-4">
                <svg class="animate-spin h-10 w-10 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                </svg>
            </div>

            <!-- Asosiy Matn -->
            <h2 class="text-xl font-semibold text-gray-800 mt-6">Your Application is Being Reviewed</h2>
            <p class="text-gray-600 mt-3 text-base">
                We got your education info and qualifications. Our team is verifying your details. Once approved, you
                will be assigned as a tutor. 🎓
            </p>

            <!-- Rasmlar qismi -->
            <div class="mt-6 flex justify-center">
                <img src="https://cdn.kastatic.org/images/lohp/empower_teachers_icon.png" alt="Review Process"
                    class="h-14">
            </div>

            <p class="text-gray-600 mt-6 text-sm">Thank you for your patience! 🚀</p>

            <!-- Qaytish Tugmasi -->
            <a href="/"
                class="mt-6 inline-block bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 font-medium shadow-md transition">
                Back to Home
            </a>
        </div>
    </div>

    <div id="rejected" class="flex-grow flex items-center justify-center px-4 hidden">
        <div class="bg-white shadow-lg rounded-2xl text-center p-8 max-w-md w-full">
            <!-- Xush kelibsiz -->
            <h1 class="text-2xl font-bold text-blue-600">Welcome!!!</h1>
            <h6 id="name" class="text-xl font-bold text-black"></h6>

            <!-- Asosiy Matn -->
            <h2 class="text-xl font-semibold text-gray-800 mt-6">Your Application was rejected</h2>
           
            <p class="text-gray-600 mt-3 text-base">
                Unfortunately, your application to become a tutor has been rejected. But don’t be discouraged! 🚀
                You can review the reason for rejection and reapply after making the necessary improvements.
                We appreciate your interest, and we hope to see you again soon!
            </p>


            <!-- Rasmlar qismi -->
            <div class="mt-6 flex justify-center">
                <img src="https://cdn.kastatic.org/images/lohp/empower_teachers_icon.png" alt="Review Process"
                    class="h-14">
            </div>

            <p class="text-gray-600 mt-6 text-sm">Thank you for your patience! 🚀</p>

            <!-- Qaytish Tugmasi -->
            <a href="/"
                class="mt-6 inline-block bg-blue-600 text-white px-6 py-3 rounded-full hover:bg-blue-700 font-medium shadow-md transition">
                Back to Home
            </a>
        </div>
    </div>

    <script>
    window.onload = async function() {
        const {
            default: apiFetch
        } = await import('/js/utils/apiFetch.js');
        const response = await apiFetch('/teacher/getInfo', {
            method: 'GET',
        });

        console.log(response);

        const pending = document.getElementById('pending');
        const rejected = document.getElementById('rejected');

        

        if (response.data.status === 'rejected') {
            document.getElementById('name').textContent = response.data.full_name;
            rejected.classList.remove("hidden");
        } else if (response.data.status === 'confirmed') {
            window.location.href="/teacher/home"
        } else {
            document.getElementById('fullname').textContent = response.data.full_name;
            pending.classList.remove("hidden");
        }
        
    };
    </script>

    <?php components("teachers/footer"); ?>