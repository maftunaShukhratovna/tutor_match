<?php components('auth/header'); ?>
<body class="font-sans bg-gray-50">
    
<?php components('auth/navbar'); ?>

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

            const { default: apiFetch } = await import('/js/utils/apiFetch.js');
            
            try {
                const data = await apiFetch('/login', { method: 'POST', body: formData });
                localStorage.setItem('token', data.token);
                console.log(data.data.status)

                if(data.data.status==="Learner"){
                    window.location.href = '/student/home';
                } else if(data.data.status==="Teacher"){
                    window.location.href= '/teacher/waitpage';
                } else if(data.data.status==="Admin"){
                    window.location.href= '/admin/home';
                }

                
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

<?php components('auth/footer'); ?>



   
