<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Match</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-50">
    <!-- Navbar -->
    <nav class="flex justify-between items-center bg-gray-100 px-6 py-4 border-b border-gray-300">
        <!-- Logo Section -->
        <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-2">
                <img src="https://via.placeholder.com/40" alt="Logo" class="w-10 h-10">
                <span class="text-xl font-bold text-blue-600">Tutor Match</span>
            </div>
            <a href="/" class="text-gray-600 hover:text-blue-600 font-medium">Home</a>
        </div>
        <div class="flex space-x-4">
            <a href="#" class="text-gray-600 hover:text-blue-600 font-medium">Search</a>
            <a href="/login" class="text-gray-600 hover:text-blue-600 font-medium">Log in</a>
            <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 font-medium shadow-md">Sign up</a>
        </div>
    </nav>

    <!-- About Section -->
    <div class="bg-white py-16 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800">Why TutorMatch Works</h2>
            <p class="text-gray-600 mt-4 text-lg">Discover how TutorMatch creates meaningful connections between students and tutors to empower personalized learning and growth.</p>
        </div>

        <div class="mt-10 max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center">
                <img src="https://cdn.kastatic.org/images/lohp/personalized_learning_icon.png" alt="Personalized Learning" class="mx-auto mb-4">
                <h3 class="text-xl font-bold text-blue-600">Personalized Learning</h3>
                <p class="text-gray-600 mt-2">Students practice at their own pace, filling in gaps in their understanding and accelerating their learning.</p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center">
                <img src="https://cdn.kastatic.org/images/lohp/trusted_content_icon.png" alt="Trusted Content" class="mx-auto mb-4">
                <h3 class="text-xl font-bold text-blue-600">Trusted Content</h3>
                <p class="text-gray-600 mt-2">Created by experts, TutorMatch offers a wide range of reliable resources and lessons for every subject.</p>
            </div>
            <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center">
                <img src="https://cdn.kastatic.org/images/lohp/empower_teachers_icon.png" alt="Empowering Teachers" class="mx-auto mb-4">
                <h3 class="text-xl font-bold text-blue-600">Tools to Empower Teachers</h3>
                <p class="text-gray-600 mt-2">Identify student needs, tailor instruction, and engage every learner in the classroom effectively.</p>
            </div>
        </div>

        <div class="mt-16 max-w-5xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="text-center md:text-left">
                    <h3 class="text-2xl font-bold text-gray-800">Teachers</h3>
                    <p class="text-gray-600 mt-4">Differentiate your classroom and engage every student. 90% of teachers who use TutorMatch find it effective for empowering their entire classroom.</p>
                </div>
                <img src="https://cdn.kastatic.org/images/lohp/math-unicorn-donate-collage.png" alt="Teachers" class="rounded-lg shadow-md mx-auto md:mx-0">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mt-16">
                <img src="https://cdn.kastatic.org/images/lohp/faces_collage_2@2x.png" alt="Learners" class="rounded-lg shadow-md mx-auto md:mx-0">
                <div class="text-center md:text-left">
                    <h3 class="text-2xl font-bold text-gray-800">Learners and Students</h3>
                    <p class="text-gray-600 mt-4">You can learn anything! Build a solid understanding of subjects like math, science, and more with the help of TutorMatch.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
        <!-- Footer -->
        <footer class="bg-gray-100 py-10 mt-16 border-t border-gray-300">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Mission -->
            <div>
                <h3 class="text-xl font-bold text-gray-800">Our Mission</h3>
                <p class="text-gray-600 mt-4">Our mission is to provide a free, world-class education to anyone, anywhere.</p>
                <p class="text-gray-600 mt-2">Tutor Match is a 501(c)(3) nonprofit organization. Donate or volunteer today!</p>
            </div>
            
            <!-- Site Navigation -->
            <div>
                <h3 class="text-xl font-bold text-gray-800">Site Navigation</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-blue-600">About</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600">News</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600">Impact</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600">Our team</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600">Careers</a></li>
                </ul>
            </div>
            
            <!-- Help and Support -->
            <div>
                <h3 class="text-xl font-bold text-gray-800">Help & Support</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-blue-600">Help Center</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600">Support Community</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600">Contact</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600">Share Your Story</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600">Press</a></li>
                </ul>
            </div>
            
            <!-- Courses and Language -->
            <div>
                <h3 class="text-xl font-bold text-gray-800">Courses</h3>
                <ul class="mt-4 space-y-2">
                    <li><a href="#" class="text-gray-600 hover:text-blue-600">Math: Pre-K - 8th grade</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600">Science</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600">Test Prep</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600">Computing</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600">Arts & Humanities</a></li>
                </ul>
            </div>
        </div>
        
        <div class="mt-8 border-t border-gray-300 pt-4 text-center text-gray-600">
            <p>&copy; 2025 Tutor Match. All rights reserved.</p>
            <p class="mt-2 text-sm">
                <a href="#" class="hover:text-blue-600">Terms of use</a> |
                <a href="#" class="hover:text-blue-600">Privacy Policy</a> |
                <a href="#" class="hover:text-blue-600">Cookie Notice</a> |
                <a href="#" class="hover:text-blue-600">Accessibility Statement</a>
            </p>
        </div>
    </footer>

</body>
</html>
