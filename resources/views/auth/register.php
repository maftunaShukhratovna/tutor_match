<?php components('auth/header'); ?>

<body class="font-sans bg-gray-50">
    <!-- Navbar -->
    <?php components('auth/navbar'); ?>


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


        const roleText = document.querySelector("h2").textContent.split(' ')[4];

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
                if(roleText==='Learner'){
                    window.location.href = '/student/home';
                }
                 else {
                    window.location.href = '/';
                 }
                
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

    <?php components('auth/footer'); ?>

