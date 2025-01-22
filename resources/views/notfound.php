<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-50">
    <!-- Navbar -->
    <nav class="flex justify-between items-center bg-gray-100 px-6 py-4 border-b border-gray-300">
        <!-- Logo Section -->
        <div class="flex items-center space-x-4">
            <div class="flex items-center space-x-2">
                <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.vecteezy.com%2Ffree-vector%2Ftutor-logo&psig=AOvVaw1TkHIR0cm2cI1yzkNsp2-F&ust=1737601406756000&source=images&cd=vfe&opi=89978449&ved=0CBcQjhxqFwoTCLiW9e2riIsDFQAAAAAdAAAAABAJ" alt="Logo" class="w-10 h-10">
                <span class="text-xl font-bold text-blue-600">Tutor Match</span>
            </div>
            <a href="/about" class="text-gray-600 hover:text-blue-600 font-medium">Explore</a>
        </div>
        <div class="flex space-x-4">
            <a href="#" class="text-gray-600 hover:text-blue-600 font-medium">Search</a>
            <a href="#" class="text-gray-600 hover:text-blue-600 font-medium">Log in</a>
            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 font-medium shadow-md">Sign up</a>
        </div>
    </nav>

    <!-- 404 Page -->
    <div class="min-h-screen bg-green-50 flex items-center justify-center py-10 px-4">
        <div class="bg-white shadow-md rounded-lg max-w-4xl w-full flex overflow-hidden">

            <!-- 404 Content -->
            <div class="w-full p-8" id="error-page">
                <h2 class="text-2xl font-bold text-gray-800">404 - Page Not Found</h2>
                <p class="text-gray-600 mt-2">Oops! The page you're looking for doesn't exist.</p>
                <p class="text-gray-600 mt-4">It seems like you've hit a dead end. Don't worry, you can go back to the home page!</p>

                <!-- Redirect Button -->
                <div class="mt-6">
                    <a href="/" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 font-medium shadow-md">Go to Home</a>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Optional JavaScript if you want to add any further handling, such as tracking the error or analytics
    </script>

</body>
</html>

