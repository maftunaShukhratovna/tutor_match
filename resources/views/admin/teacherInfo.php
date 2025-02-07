<?php components("admins/header"); ?>

<body class="bg-gray-100">
    <div class="flex">
        <?php components("admins/sidebar"); ?>
        

        <div class="max-w-4xl mx-auto p-8 bg-white shadow-lg rounded-lg">
        <h1 class="text-3xl text-black mt-4">Teacher's Resume </h1>

            <!-- Profile Image -->
            <div class="flex flex-col items-center">
                <img src="profile-image.jpg" alt="Teacher Profile"
                    class="w-32 h-32 rounded-full border-4 border-blue-500 shadow-lg">
                <h1 id="full_name" class="text-2xl font-semibold mt-4"></h1>
                <p id="subject" class="text-gray-600"></p>
            </div>

            <!-- Personal Info -->
            <div class="mt-6 border-t pt-4">
                <h2 class="text-xl font-semibold text-gray-800">Personal Information</h2>
                <p><strong>Email:</strong> <span id="email"></span></p>
                <p><strong>Date of Birth</strong> <span id="birth_date"></span></p>
                <p><strong>Province:</strong> <span id="province"></span></p>
                <p><strong>Phone:</strong> <span id="phone"></span></p>

            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Description -->
                <div class="mt-6 border-t pt-4">
                    <h2 class="text-xl font-semibold text-gray-800">Description</h2>
                    <p id="description" class="text-gray-700"></p>
                </div>

                <!-- Education -->
                <div class="mt-6 border-t pt-4">
                    <h2 class="text-xl font-semibold text-gray-800">Education</h2>
                    <ul id="education" class="list-disc list-inside text-gray-700"></ul>
                </div>

                <!-- Experience -->
                <div class="mt-6 border-t pt-4">
                    <h2 class="text-xl font-semibold text-gray-800">Experience</h2>
                    <p><strong>Work Place:</strong> <span id="workplace"></span></p>
                    <p><strong>Subject:</strong> <span id="subject_exp"></span></p>
                    <p><strong>Experience Years:</strong> <span id="experience_years"></span> yil</p>
                    <p><strong>Number of students taught:</strong> <span id="student_numbers"></span></p>
                </div>

            </div>


            <!-- Certificates and Diplomas -->
            <div class="mt-6 border-t pt-4">
                <h2 class="text-xl font-semibold text-gray-800">Diplomas and Certificates</h2>
                <ul class="mt-2">
                    <li><a href="certificate1.pdf" target="_blank" class="text-blue-600 underline">Diploma</a></li>
                    <li><a href="certificate2.pdf" target="_blank" class="text-blue-600 underline">Certificates</a></li>
                </ul>
            </div>

            <!-- Teacher Status -->
            <div class="mt-6 border-t pt-4">
                <h2 class="text-xl font-semibold text-gray-800">Status</h2>
                <p id="teacher_status" class="text-lg"></p>
                <p id="rejection_reason" class="text-gray-600"></p>
            </div>

            <div class="text-center mt-6">
                <button id="backButton" class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700">
                    Back to list
                </button>
            </div>
        </div>
    </div>

    <script>
    window.onload = async function() {
        const {
            default: apiFetch
        } = await import('/js/utils/apiFetch.js');
        const teacherId = <?php echo $teacher_id; ?>;

        try {
            const response = await apiFetch(`/admin/getTeacher/${teacherId}`, {
                method: 'GET'
            });

            if (response && response.data) {
                const teacher = response.data;

                // Basic info
                document.getElementById('full_name').innerText = teacher.full_name;
                document.getElementById('email').innerText = teacher.email;
                document.getElementById('birth_date').innerText = teacher.birth_date;
                document.getElementById('province').innerText = teacher.province;
                document.getElementById('phone').innerText = teacher.phone;
                document.getElementById('description').innerText = teacher.description;

                // Experience
                if (teacher.experience.length > 0) {
                    document.getElementById('subject').innerText = teacher.experience[0].subject +
                        " fan o'qituvchisi";
                    document.getElementById('workplace').innerText = teacher.experience[0].workplace;
                    document.getElementById('subject_exp').innerText = teacher.experience[0].subject;
                    document.getElementById('experience_years').innerText = teacher.experience[0]
                        .experience_years;
                    document.getElementById('student_numbers').innerText = teacher.experience[0]
                    .student_numbers;
                }

                // Education
                let educationList = "";
                teacher.education.forEach(edu => {
                    educationList += `<li><strong>${edu.degree}:</strong> ${edu.university_name}</li>`;
                });
                document.getElementById('education').innerHTML = educationList;

                // Teacher Status
                const statusElement = document.getElementById('teacher_status');
                const rejectionReasonElement = document.getElementById('rejection_reason');

                if (teacher.status === "confirmed") {
                    statusElement.innerText = "Active";
                    statusElement.classList.add("text-green-600");
                    rejectionReasonElement.innerText = ""; // Clear rejection reason if active
                } else if (teacher.status === "rejected") {
                    statusElement.innerText = "Rejected";
                    statusElement.classList.add("text-red-600");
                    rejectionReasonElement.innerText = "Reason: " + (teacher.rejection_reason ||
                        "No reason provided");
                } else{
                    statusElement.innerText = "Pending";
                    statusElement.classList.add("text-blue-800");
                }

                const backButton = document.getElementById('backButton');
                backButton.addEventListener('click', function() {
                    if (teacher.status === 'confirmed') {
                        window.location.href = '/admin/activeteachers'; 
                    } else if(teacher.status==='pending'){
                        window.location.href = '/admin/registeredteachers'; // Else, go back to the teacher list
                    } else{
                        window.location.href = '/admin/rejectedteachers';
                    }
                });


            } else {
                console.error("Ma'lumot topilmadi");
            }

        } catch (error) {
            console.error("API so‘rovda xatolik:", error);
        }
    };
    </script>
</body>