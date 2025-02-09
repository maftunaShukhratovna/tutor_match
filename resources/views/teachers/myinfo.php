<?php components('teachers/header'); 
      components('teachers/navbar');
?>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <?php components('teachers/sidebar'); ?>

        <!-- Content -->
        <div class="flex-1 p-10">
            <div class="bg-white p-8 rounded-lg shadow-lg">
                <h2 class="text-2xl font-semibold mb-4">Teacher Profile</h2>

                <div class="space-y-4">
                    <h3 class="text-xl font-semibold mb-2">Personal Information</h3>

                    <div class="flex items-center space-x-4 mb-6">
                        <div class="w-24 h-24 rounded-full overflow-hidden border-2 border-gray-300 relative">
                            <img id="profile_image" src="https://via.placeholder.com/150" alt="Picture"
                                class="w-full h-full object-cover" />
                        </div>


                        <div class="flex-1">
                            <label class="block text-sm font-medium text-gray-700">Full Name</label>
                            <p id="full_name" class="mt-1 text-gray-900 font-medium bg-gray-100 px-3 py-2 rounded"></p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <p id="phonenumber" class="mt-1 text-gray-900 font-medium bg-gray-100 px-3 py-2 rounded"></p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <p id="emailuser" class="mt-1 text-gray-900 font-medium bg-gray-100 px-3 py-2 rounded"></p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Birth Date</label>
                        <p id="birth_date" class="mt-1 text-gray-900 font-medium bg-gray-100 px-3 py-2 rounded"></p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Province</label>
                        <p id="province" class="mt-1 text-gray-900 font-medium bg-gray-100 px-3 py-2 rounded"></p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">About You</label>
                        <p id="description" class="mt-1 text-gray-900 font-medium bg-gray-100 px-3 py-2 rounded"></p>
                    </div>

                    <h3 class="text-xl font-semibold mb-2">Experience</h3>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Number of Students Taught</label>
                        <p id="student_numbers" class="mt-1 text-gray-900 font-medium bg-gray-100 px-3 py-2 rounded"></p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Experience (Years)</label>
                        <p id="experience_years" class="mt-1 text-gray-900 font-medium bg-gray-100 px-3 py-2 rounded"></p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Subject</label>
                        <p id="subject" class="mt-1 text-gray-900 font-medium bg-gray-100 px-3 py-2 rounded"></p>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700">Workplace</label>
                        <p id="workplace" class="mt-1 text-gray-900 font-medium bg-gray-100 px-3 py-2 rounded"></p>
                    </div>

                    <h3 class="text-xl font-semibold mb-2">Education</h3>
                    <ul id="education" class="list-disc pl-5 text-gray-900 font-medium bg-gray-100 px-3 py-2 rounded"></ul>

                </div>
            </div>
        </div>
    </div>

    <script>
    window.onload = async function() {
    try {
        const { default: apiFetch } = await import('/js/utils/apiFetch.js');
        const response = await apiFetch('/teacher/getInfo', { method: 'GET' });

        if (!response || !response.data) {
            console.error("Ma'lumot yuklanmadi!");
            return;
        }

        const teacher = response.data;

        // Asosiy ma'lumotlar
        document.getElementById('full_name').innerText = teacher.full_name || "no info";
        document.getElementById('emailuser').innerText = teacher.email || "no info";
        document.getElementById('birth_date').innerText = teacher.birth_date || "no info";
        document.getElementById('province').innerText = teacher.province || "no info";
        document.getElementById('phonenumber').innerText = teacher.phone || "no info";
        document.getElementById('description').innerText = teacher.description || "no info";

        // Profil rasmi
        if (teacher.profile_image) {
            document.getElementById('profile_image').src = teacher.profile_image;
        }

        // Tajriba
        if (teacher.experience && teacher.experience.length > 0) {
            document.getElementById('subject').innerText = teacher.experience[0].subject;
            document.getElementById('workplace').innerText = teacher.experience[0].workplace;
            document.getElementById('experience_years').innerText = teacher.experience[0].experience_years + " years";
            document.getElementById('student_numbers').innerText = teacher.experience[0].student_numbers + " students";
        } else {
            document.getElementById('subject').innerText = "no info";
            document.getElementById('workplace').innerText = "no info";
            document.getElementById('experience_years').innerText = "no info";
            document.getElementById('student_numbers').innerText = "no info";
        }

        // Ta'lim
        let educationList = "";
        if (teacher.education && teacher.education.length > 0) {
            teacher.education.forEach(edu => {
                educationList += `<li><strong>${edu.degree}:</strong> ${edu.university_name}</li>`;
            });
        } else {
            educationList = "<li>no info</li>";
        }
        document.getElementById('education').innerHTML = educationList;

    } catch (error) {
        console.error("Xatolik yuz berdi:", error);
    }
};        
    </script> 

    <?php components('teachers/footer'); ?>

