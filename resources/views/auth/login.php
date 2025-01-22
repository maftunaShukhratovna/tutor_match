<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Match - Login</title>
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
            <a href="/login" class="text-gray-600 hover:text-blue-600 font-medium">Log in</a>
            <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 font-medium shadow-md">Sign up</a>
        </div>
    </nav>

    <!-- Login Page -->
    <div class="min-h-screen bg-green-50 flex items-center justify-center py-10 px-4">
        <div class="bg-white shadow-md rounded-lg max-w-4xl w-full flex overflow-hidden">

            <div class="w-1/2 bg-gray-200 flex items-center justify-center">
                <img src="https://cdn.kastatic.org/images/lohp/laptop_collage@2x.png" alt="Login Illustration" class="h-3/4">
            </div>
            <!-- Login Form -->
            <div class="w-full p-8">
                <h2 class="text-2xl font-bold text-gray-800">Log In</h2>
                <p class="text-gray-600 mt-2" id="role-message">Welcome back to Tutor Match</p>

                <form onsubmit="login(event)" id="form" class="mt-8 space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="mt-1 px-4 py-2 border border-gray-300 rounded w-full focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="mt-1 px-4 py-2 border border-gray-300 rounded w-full focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div id="error"></div>
                    <button type="submit" id="login-btn" class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Log In</button>
                </form>
                <p class="text-gray-600 mt-4 text-sm">By logging in, you agree to our <a href="#" class="text-blue-600">Terms of use</a> and <a href="#" class="text-blue-600">Privacy Policy</a>.</p>
            </div>
            
        </div>
    </div>

    <!-- Loading Indicator -->
    <div id="loading" class="hidden absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <span class="text-blue-600">Loading...</span>
    </div>


    <script>
        async function login(event) {
            event.preventDefault();
            document.getElementById('loading').classList.remove('hidden');
            const button = event.target;
            button.disabled = true;

            let form = document.getElementById("form"),
                formData = new FormData(form);

            const { default: apiFetch } = await import('./js/utils/apiFetch.js');
            
            try {
                const data = await apiFetch('/login', { method: 'POST', body: formData });
                localStorage.setItem('token', data.token);
                window.location.href = '/';
            } catch (error) {
                document.getElementById('error').innerHTML = '';
                
                Object.keys(error.data.errors).forEach(err => {
                    document.getElementById('error').innerHTML += `<p class="text-red-500 mt-1">${error.data.errors[err]}</p>`;
                });
            } finally {
                document.getElementById('loading').classList.add('hidden');
                button.disabled = false;
            }
        }
    </script>

</body>
</html>



   
