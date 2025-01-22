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
                <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.vecteezy.com%2Ffree-vector%2Ftutor-logo&psig=AOvVaw1TkHIR0cm2cI1yzkNsp2-F&ust=1737601406756000&source=images&cd=vfe&opi=89978449&ved=0CBcQjhxqFwoTCLiW9e2riIsDFQAAAAAdAAAAABAJ"
                    alt="Logo" class="w-10 h-10">
                <span class="text-xl font-bold text-blue-600">Tutor Match</span>
            </div>
            <a href="/about" class="text-gray-600 hover:text-blue-600 font-medium">Explore</a>
        </div>
        <div class="flex space-x-4">
            <a href="#" class="text-gray-600 hover:text-blue-600 font-medium">Search</a>
            <a href="login" class="text-gray-600 hover:text-blue-600 font-medium">Log in</a>
            <a href="register"
                class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 font-medium shadow-md">Sign
                up</a>
        </div>
    </nav>


    <div class="min-h-screen bg-green-50 flex items-center justify-center py-10 px-4">
        <div class="bg-white shadow-md rounded-lg max-w-4xl w-full flex overflow-hidden">

            <div class="w-1/2 p-8" id="registration-form">
                <h2 class="text-2xl font-bold text-gray-800">Sign Up</h2>
                <p class="text-gray-600 mt-2" id="role-message">Join Khan Academy for free as a</p>
                <div class="mt-4 space-x-2">
                    <button id="learner-btn"
                        class="role-btn bg-white text-blue-600 border-2 border-blue-600 py-2 px-4 rounded hover:bg-blue-600 hover:text-white hover:border-transparent"
                        onclick="changeRole('Learner')">Learner</button>
                    <button id="teacher-btn"
                        class="role-btn bg-white text-blue-600 border-2 border-blue-600 py-2 px-4 rounded hover:bg-blue-600 hover:text-white hover:border-transparent"
                        onclick="changeRole('Teacher')">Teacher</button>
                    <button id="admin-btn"
                        class="role-btn bg-white text-blue-600 border-2 border-blue-600 py-2 px-4 rounded hover:bg-blue-600 hover:text-white hover:border-transparent"
                        onclick="changeRole('Admin')">Admin</button>

                </div>

                <form id='form' onsubmit="register(event)" class="mt-8 space-y-4">
                    <div>
                        <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" id="full_name" name="full_name"
                            class="mt-1 px-4 py-2 border border-gray-300 rounded w-full focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 px-4 py-2 border border-gray-300 rounded w-full focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password"
                            class="mt-1 px-4 py-2 border border-gray-300 rounded w-full focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div>
                        <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm
                            Password</label>
                        <input type="password" name="confirm-password"
                            class="mt-1 px-4 py-2 border border-gray-300 rounded w-full focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div id="error">

                    </div>


                    <button type="submit" id="register_btn"
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Register</button>
                </form>
                <p class="text-gray-600 mt-4 text-sm">By signing up for Tutor Match, you agree to our <a href="#"
                        class="text-blue-600">Terms of use</a> and <a href="#" class="text-blue-600">Privacy Policy</a>.
                </p>
            </div>


            <div class="w-1/2 bg-gray-200 flex items-center justify-center">
                <img src="https://cdn.kastatic.org/images/lohp/laptop_collage@2x.png" alt="Registration Illustration"
                    class="h-3/4">

            </div>
        </div>
    </div>
    <script>
    function changeRole(role) {

        document.querySelector("h2").textContent = `Sign Up as a ${role}`;
        document.getElementById('role-message').textContent = `Join Tutor Match as a ${role}`;
        const buttons = document.querySelectorAll('.role-btn');
        buttons.forEach(button => {

            button.classList.remove('bg-blue-600', 'text-white', 'border-transparent');
            button.classList.add('bg-white', 'text-blue-600', 'border-blue-600');
        });

        const selectedButton = document.getElementById(`${role.toLowerCase()}-btn`);
        selectedButton.classList.remove('bg-white', 'text-blue-600', 'border-blue-600');
        selectedButton.classList.add('bg-blue-600', 'text-white', 'border-transparent');

        console.log(`Selected role: ${role}`);
    }

    async function register(event) {
        event.preventDefault();
        const button = event.target;
        button.disabled = true;
        const loadingMessage = document.createElement('span');
        loadingMessage.classList.add('text-white');
        loadingMessage.textContent = ' Creating account...';
        button.appendChild(loadingMessage);

        let form = document.getElementById("form"),
            formData = new FormData(form);


        const roleText = document.querySelector("h2").textContent.split(' ')[4]; // 'Sign Up as a Teacher', 'Sign Up as a Learner', etc.

        if (roleText) {
            formData.append('status', roleText);

            const {
                default: apiFetch
            } = await import('./js/utils/apiFetch.js');

            try {
                const data = await apiFetch('/register', {
                    method: 'POST',
                    body: formData
                });
                localStorage.setItem('token', data.token);
                window.location.href = '/';
            } catch (error) {
                document.getElementById('error').innerHTML = '';
                Object.keys(error.data.errors).forEach(err => {
                    document.getElementById('error').innerHTML +=
                        `<p class="text-red-500 mt-1">${error.data.errors[err]}</p>`;
                });
            } finally {
                button.disabled = false;
                button.removeChild(loadingMessage);
            }
        } else {
            document.getElementById('error').innerHTML = `<p class="text-red-500 mt-1">Status is missing </p>`;
        }


    }
    </script>
</body>

</html>



<!-- <script>
        async function register(event) {
            event.preventDefault(); 
            const button = event.target;
            button.disabled = true;
            const loadingMessage = document.createElement('span');
            loadingMessage.classList.add('text-white');
            loadingMessage.textContent = ' Creating account...';
            button.appendChild(loadingMessage);

            let form = document.getElementById("form"),
                formData = new FormData(form);

            const { default: apiFetch } = await import('./js/utils/apiFetch.js');
            try {
                const data = await apiFetch('/register', { method: 'POST', body: formData });
                localStorage.setItem('token', data.token);
                window.location.href = '/dashboard';
            } catch (error) {
                document.getElementById('error').innerHTML = '';
                Object.keys(error.data.errors).forEach(err => {
                    document.getElementById('error').innerHTML += `<p class="text-red-500 mt-1">${error.data.errors[err]}</p>`;
                });
            } finally {
                button.disabled = false;
                button.removeChild(loadingMessage);
            }
        }
    </script>
 -->