<?php components('header'); ?>
<body class="font-sans bg-gray-50">
    <!-- Navbar -->
    
<?php components('navbar'); ?>
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

