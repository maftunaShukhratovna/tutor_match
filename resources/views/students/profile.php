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
        <div class="flex-1 bg-white p-8">
            <div class="max-w-2xl ml-12 bg-white p-6 shadow rounded-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Profile</h2>

                <div class="flex items-center space-x-6">
                    <!-- Profile Picture -->
                    <div class="relative w-24 h-24">
                        <img id="profile_image" src="https://via.placeholder.com/150" alt="Profile Picture"
                            class="w-full h-full rounded-full border-2 border-gray-300 object-cover">
                        <input type="file" id="profile_picture" accept="image/*" class="hidden"
                            onchange="previewImage(event)" />
                        <button type="button" onclick="document.getElementById('profile_picture').click()"
                            class="absolute bottom-0 left-1/2 transform -translate-x-1/2 bg-blue-600 text-white text-xs px-2 py-1 rounded">
                            Upload
                        </button>
                    </div>

                    <!-- Profile Info -->
                    <div>
                        <h3 id="username" class="text-xl font-semibold text-gray-900">Loading...</h3>
                        <p id="useremail" class="text-gray-600">Loading...</p>
                    </div>
                </div>

                <!-- Profile Form -->
                <form id="updateProfileForm" class="mt-6 space-y-4">
                    <!-- Full Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" id="name" placeholder="Enter your full name"
                            class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400" />
                    </div>

                    <!-- Age -->
                    <div>
                        <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                        <input type="number" id="age" placeholder="Enter your age"
                            class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400" />
                    </div>

                    <!-- Bio -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Bio</label>
                        <textarea id="description" rows="3" placeholder="Tell about yourself"
                            class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400"></textarea>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="emailuser" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="emailuser" placeholder="Enter your email"
                            class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400" />
                    </div>

                    <input class="hidden" id="student-id" />

                    <!-- Password -->
                    <div class="relative">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" placeholder="Enter your password"
                            class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400" />
                    </div>

                    <!-- Save Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

async function updateProfile(event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('emailuser').value;
    const password = document.getElementById('password').value;
    const age = document.getElementById('age').value;
    const description = document.getElementById('description').value;
    const studentId = document.getElementById('student-id').value;


    const token = localStorage.getItem('token');
    const { default: apiFetch } = await import('/js/utils/apiFetch.js');

    try {
        const response = await apiFetch('/student/updateInfo', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                Authorization: `Bearer ${token}`,
            },
            body: JSON.stringify({
                full_name: name,
                email: email,
                password: password,
                age: age,
                description: description,
                student_id:studentId
            }),
        });

        console.log('Profile updated successfully:', response);
        alert('Profile updated!');
        window.location.href = '/student/home';
    } catch (error) {
        console.error('Error updating profile:', error);
        alert('Failed to update profile.');
    }
}

document.getElementById('updateProfileForm').addEventListener('submit', updateProfile);



    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profile_image').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
    
    window.onload = async function() {
        try {
            const { default: apiFetch } = await import('/js/utils/apiFetch.js');
            const response = await apiFetch('/students/getInfo', {
                method: 'GET',
            });

            if (response.data) {
                document.getElementById('emailmain').innerText = response.data.email;

                document.getElementById('username').innerText = response.data.full_name;
                document.getElementById('useremail').innerText = response.data.email;
                document.getElementById('name').value = response.data.full_name;
                document.getElementById('age').value = response.data.age;
                document.getElementById('description').value = response.data.description;
                document.getElementById('emailuser').value = response.data.email;
                document.getElementById('password').value = response.data.password;
                document.getElementById('student-id').value = response.data.student_id;

                if (response.data.profile_picture) {
                    document.getElementById('profile_image').src = response.data.profile_picture;
                }
            } else {
                console.error('Failed to fetch data:', response.message);
            }
        } catch (error) {
            console.error('Error fetching student data:', error);
        }
    };
    


    </script>

    <?php components('students/footer'); ?>

