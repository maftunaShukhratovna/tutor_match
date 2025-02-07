<?php components('teachers/header'); 
      components('teachers/navbar');
?>

<body class="bg-gray-100">
    <div class="max-w-5xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">

        <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-md">
            <!-- Teacher Profile Section -->
            <h2 class="text-2xl font-semibold mb-4">Teacher Profile</h2>

            <form id="profileForm" class="space-y-4" onsubmit="updateProfile()">
                <!-- Personal Information Section -->
                <h3 class="text-xl font-semibold mb-2">Personal Information</h3>
                <div class="flex items-center space-x-4 mb-6">
                    <!-- Profile Picture (Circular) -->

                    <div class="w-24 h-24 rounded-full overflow-hidden border-2 border-gray-300 relative">
                        <img id="profile_image" src="https://via.placeholder.com/150" alt="Picture"
                            class="w-full h-full object-cover" />
                        <!-- Hidden File Input -->
                        <input type="file" id="profile_picture" accept="image/*" class="hidden"
                            onchange="previewImage(event)" />
                        <!-- Upload Button -->
                        <button type="button" onclick="document.getElementById('profile_picture').click()"
                            class="absolute bottom-0 left-1/2 transform -translate-x-1/2 bg-blue-600 text-white text-xs px-2 py-1 rounded">
                            Upload
                        </button>
                    </div>
                    <input type="number" id="teacher-id" class="hidden" />


                    <div class="flex-1">
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your full name"
                            class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
                            required />
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="w-1/2 pr-2">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="tel" id="phone" placeholder="+998901234567"
                            class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
                             required />
                    </div>

                    <!-- Email -->
                    <div class="w-1/2 pr-2">
                        <label for="emailuser" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="emailuser" placeholder="Enter your email"
                            class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
                            required />
                    </div>

                    <!-- Password -->
                    <div class="w-1/2 pl-2 relative">
                        <label for="passworduser" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="passworduser" placeholder="Enter your password"
                            class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400" />
                        <!-- Show/Hide Password Icon -->
                        <span onclick="togglePasswordVisibility()"
                            class="absolute top-1/2 right-2 transform -translate-y-2/2 cursor-pointer text-gray-500"> @
                        </span>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date</label>
                    <input type="date" id="birth_date" name="birth_date"
                        class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
                        required />
                </div>

                <div class="mb-4">
                    <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                    <select name="province" id="province"
                        class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
                        required>
                        <option value="Tashkent">Tashkent</option>
                        <option value="Andijon">Andijon</option>
                        <option value="Farg`ona">Farg`ona</option>
                        <option value="Namangan">Namangan</option>
                        <option value="Sirdarya">Sirdarya</option>
                        <option value="Jizzakh">Jizzakh</option>
                        <option value="Samarkand">Samarkand</option>
                        <option value="Kashkadaryo">Kashkadaryo</option>
                        <option value="Surkhondaryo">Surkhondaryo</option>
                        <option value="Bukhoro">Bukhoro</option>
                        <option value="Navoiy">Navoiy</option>
                        <option value="Xorazm">Xorazm</option>

                    </select>
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700">About You</label>
                    <textarea id="description" name="description" rows="4"
                        class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
                        placeholder="Describe yourself..." required></textarea>
                </div>

                <!-- Education Section -->
                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-2">Education</h3>
                    <div id="education-section">
                        <button type="button" onclick="addEducation()" class="bg-green-500 text-white rounded px-4 py-2"
                            required>Add University</button>
                    </div>
                </div>

                <!-- Experience Section -->
                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-2">Experience</h3>
                    <div class="mb-4">
                        <label for="student_number" class="block text-sm font-medium text-gray-700">Number of Students
                            Taught</label>
                        <input type="number" id="student_number" name="student_number"
                            class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
                            required />
                    </div>
                    <div class="mb-4">
                        <label for="experience" class="block text-sm font-medium text-gray-700">Experience
                            (Years)</label>
                        <input type="number" id="experience" name="experience"
                            class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
                            required />
                    </div>
                    <div class="mb-4">
                        <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                        <input type="text" id="subject" name="subject"
                            class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
                            required />
                    </div>

                    <div class="mb-6">
                        <h3 class="text-xl font-semibold mb-2">Workplace</h3>
                        <div class="mb-4">
                            <label for="workplace" class="block text-sm font-medium text-gray-700">Workplace</label>
                            <input required type="text" id="workplace" name="workplace"
                                placeholder="Enter your workplace (optional)"
                                class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400" />
                        </div>
                    </div>
                </div>

                <!-- Certificates Section -->
                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-2">Certificates</h3>
                    <div id="certificates-section">
                        <button type="button" onclick="addCertificate()"
                            class="bg-green-500 text-white rounded px-4 py-2">Add Certificate</button>
                    </div>

                    <h3 class="text-xl font-semibold mb-2">University Diplomas</h3>
                    <div id="diploma-section">
                        <button type="button" onclick="addDiploma()"
                            class="bg-green-500 text-white rounded px-4 py-2">Add Diploma</button>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg">Submit</button>
            </form>
        </div>

        <script>
        window.onload = async function() {

            const {
                default: apiFetch
            } = await import('/js/utils/apiFetch.js');
            const response = await apiFetch('/teacher/getInfo', {
                method: 'GET',
            });

            console.log(response.data.password);
            console.log(response.data.teacher_id);
            document.getElementById('name').value = response.data.full_name;
            document.getElementById('emailuser').value = response.data.email;
            document.getElementById('passworduser').value = response.data.password;
            document.getElementById('teacher-id').value = response.data.teacher_id;

        };
        </script>
    </div>
    <?php components('teachers/footer');