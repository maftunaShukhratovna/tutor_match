<?php components('students/header'); ?>

<body class="bg-white">
    <?php components('students/navbar'); ?>

    <!-- Top Navigation -->
    <div class="max-w-8xl mx-auto mt-8 bg-purple-100 p-4 rounded-lg shadow">
        <?php components('students/topnavigation'); ?>
    </div>

    <div class="flex h-full">
        <!-- Sidebar -->
        <?php components('students/sidebar'); ?>

        <!-- Main Content -->
        <div class="flex-1 bg-white p-8 overflow-auto">
            <!-- Course Information -->
            <div class="content p-6 bg-gray-50 rounded-lg shadow-md">
                <h1 id="class-name" class="text-3xl font-bold text-gray-800 mb-4">Yosh matematiklar</h1>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Class Info -->
                    <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow flex space-x-6">


                        <!-- Class Tafsilotlari -->
                        <div>
                            <p id="class-subject" class="text-gray-800 text-lg font-medium"><strong>📚 Subject:</strong>
                                Matematika</p>
                            <p id="class-format" class="text-gray-800 text-lg font-medium"><strong>🎓 Format:</strong>
                                Offline</p>
                            <p id="class-location" class="text-gray-800 text-lg font-medium"><strong>📍
                                    Location:</strong> At school number
                                1</p>
                            <p id="class-duration" class="text-gray-800 text-lg font-medium"><strong>🕒
                                    Duration:</strong> 6 months</p>
                            <p id="class-time" class="text-gray-800 text-lg font-medium"><strong>⏳ Time:</strong>
                                10:00-12:00, weekdays
                            </p>
                            <p id="class-cost" class="text-gray-800 text-lg font-medium"><strong>💰 Cost:</strong>
                                500,000 UZS</p>
                            <p id="class-seats" class="text-gray-800 text-lg font-medium"><strong>📌 Seats
                                    Available:</strong> 120</p>
                            <p id="class-created" class="text-gray-800 text-lg font-medium"><strong>📅 Created
                                    at:</strong> February 7,
                                2025</p>
                            <p id="class-description" class="text-gray-800 text-lg font-medium"><strong>📖
                                    Description:</strong> Best class
                                ever</p>
                            <button class="px-4 py-2 bg-red-500 text-white font-medium rounded-lg hover:bg-gray-600">
                                Message Teacher
                            </button>

                            <button onclick="goBack()" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                                Back
                            </button>

                        </div>

                    </div>

                    <!-- Teacher Profile -->
                    <div class="bg-white p-6 rounded-lg shadow text-center">
                        <img src="https://via.placeholder.com/150" alt="Teacher Photo"
                            class="w-32 h-32 mx-auto rounded-full shadow">
                        <h2 id="teacher-name" class="text-xl font-semibold text-gray-900 mt-4">John Doe</h2>
                        <p id="teacher-location" class="text-gray-600">Tashkent, Uzbekistan</p>

                        <div class="mt-4 space-y-2">
                            <p id="teacher-students" class="text-gray-700"><strong>👩‍🏫 Students:</strong> 200</p>
                            <p id="teacher-experience" class="text-gray-700"><strong>📅 Experience:</strong> 10 years
                            </p>
                            <p id="teacher-phone" class="text-gray-700"><strong>📞 Phone:</strong> +998 90 123 45 67</p>

                            <h3 class="text-lg font-bold text-gray-800 mt-4">🎓 Education</h3>
                            <ul id="teacher-education" class="list-disc ml-5 text-gray-700 text-left">
                                <li>Bachelor - Oxford University</li>
                                <li>Master - Harvard University</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function goBack() {
            window.history.back();
        }       

        

    window.onload = async function() {
        const { default: apiFetch } = await import('/js/utils/apiFetch.js');
            const response = await apiFetch('/students/getInfo', { method: 'GET' });

        document.getElementById('emailmain').innerText = response.data.email;



        try {
            const classId = <?= json_encode($class_id) ?>;

            const {
                default: apiFetch
            } = await import('/js/utils/apiFetch.js');
            const response = await apiFetch(`/students/getClassInfo/${classId}`, {
                method: 'GET',
            });

            const classData = response["class data"];
            const teacherData = response["teacher data"];

            if (classData && teacherData) {
                // Class ma'lumotlarini joylashtirish
                document.getElementById("class-name").innerText = classData.name;
                document.getElementById("class-subject").innerHTML =
                    `<strong>📚 Subject:</strong> ${classData.subject}`;
                document.getElementById("class-format").innerHTML =
                    `<strong>🎓 Format:</strong> ${classData.format}`;
                document.getElementById("class-location").innerHTML =
                    `<strong>📍 Location:</strong> ${classData.place}`;
                document.getElementById("class-duration").innerHTML =
                    `<strong>🕒 Duration:</strong> ${classData.duration}`;
                document.getElementById("class-time").innerHTML = `<strong>⏳ Time:</strong> ${classData.time}`;
                document.getElementById("class-cost").innerHTML =
                    `<strong>💰 Cost:</strong> ${classData.cost} UZS`;
                document.getElementById("class-seats").innerHTML =
                    `<strong>📌 Seats Available:</strong> ${classData.seats}`;
                document.getElementById("class-created").innerHTML =
                    `<strong>📅 Created at:</strong> ${classData.created_at}`;
                document.getElementById("class-description").innerHTML =
                    `<strong>📖 Description:</strong> ${classData.description}`;

                // Teacher ma'lumotlarini joylashtirish
                document.getElementById("teacher-name").innerText = teacherData.full_name;
                document.getElementById("teacher-location").innerText = teacherData.province;
                document.getElementById("teacher-phone").innerHTML = `<strong>📞 Phone:</strong> ${teacherData.phone}`;
                document.getElementById("teacher-students").innerHTML = `<strong>👩‍🏫 Students:</strong> ${teacherData.experience[0].student_numbers}`;
                document.getElementById("teacher-experience").innerHTML = `<strong>📅 Experience:</strong> ${teacherData.experience[0].experience_years} years`;

                // Teacher ta’lim ma’lumotlari
                const educationList = document.getElementById("teacher-education");
                educationList.innerHTML = ""; // Oldingi ma'lumotlarni tozalash
                teacherData.education.forEach(edu => {
                    const li = document.createElement("li");
                    li.innerText = `${edu.degree} - ${edu.university_name}`;
                    educationList.appendChild(li);
                });
            }
        } catch (error) {
            console.error("Error loading class info:", error);
        }
    };
    </script>



    <?php components('students/footer'); ?>