<?php components("teachers/header"); ?>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navbar -->
    <?php components("teachers/navbar"); ?>

    <div class="flex flex-grow">
        <!-- Sidebar -->
        <?php components("teachers/sidebar"); ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-semibold text-gray-800">Your Classes</h1>
                <a href="createclass" class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-md shadow-md">
                    + Add Class
                </a>
            </div>
            <p class="mt-2 text-gray-600">Manage your classes and students.</p>

            <!-- Class Cards Container -->
            <div id="class-container" class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <p id="loading-text" class="text-gray-600 text-center text-lg mt-6">Loading classes...</p>
            </div>
        </div>
    </div>

    <script>
        window.onload = async function () {
            const {
                default: apiFetch
            } = await import('/js/utils/apiFetch.js');
            const classContainer = document.getElementById('class-container');
            const loadingText = document.getElementById('loading-text');

            const teacherToken = localStorage.getItem("token");
            if (!teacherToken) {
                classContainer.innerHTML =
                    `<p class="text-red-500 text-center text-lg mt-6">No authentication token found.</p>`;
                return;
            }

            try {
                const response = await apiFetch('/teacher/getClasses', {
                    method: 'GET',
                    headers: {
                        "Authorization": `Bearer ${teacherToken}` 
                    }
                });

                console.log(response)

                if (loadingText) loadingText.remove();
                classContainer.innerHTML = '';

                if (!response.data || response.data.length === 0) {
                    classContainer.innerHTML =
                        `<p class="text-gray-600 text-center text-lg mt-6">You have no classes yet.</p>`;
                    return;
                }

                response.data.forEach(classItem => {
                    const classCard = document.createElement('div');
                    classCard.className = 'bg-white rounded-lg shadow-lg p-6 border border-gray-200';

                    classCard.innerHTML = `
                    <div class="flex items-center">
                        <div class="w-14 h-14 bg-blue-500 text-white flex items-center justify-center rounded-lg text-3xl font-bold shadow-lg">
                            📖
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold text-gray-800">${classItem.subject}</h2>
                            <p class="text-gray-600">Class Name: <span class="font-medium">${classItem.name}</span></p>
                            <p class="text-gray-600">Format: <span class="font-medium">${classItem.format}</span></p>
                            <p class="text-gray-600">Status: 
                            <span class="font-medium ${classItem.status === 'open' ? 'text-green-500' : 'text-red-500'}">
                            ${classItem.status === 'open' ? 'Available' : 'Full'}
                            </span>
                            </p>
                            <p class="text-gray-600">Seats Left: 
                                <span class="font-medium ${classItem.seats === 0 ? 'text-red-500' : 'text-green-500'}">
                                    ${classItem.seats} 
                                </span> 
                            </p>


                        </div>
                    </div>
                    <div class="mt-4 flex justify-between">
                        <a href="/teacher/updateclass/${classItem.id}" class="text-blue-500 hover:text-blue-600 px-4 py-2 rounded-md border border-blue-500">
                            Joined Students
                        </a>
                        <a href="/teacher/updateclass/${classItem.id}" class="text-yellow-500 hover:text-yellow-600 px-4 py-2 rounded-md border border-yellow-500">
                            Edit Class
                        </a>
                        <button onclick="removeStudent(${classItem.id})" class="text-red-500 hover:text-red-600 px-4 py-2 rounded-md border border-red-500">
                            Remove
                        </button>
                    </div>

                `;
                    classContainer.appendChild(classCard);
                });

            } catch (error) {
                console.error("Error fetching classes:", error);
                classContainer.innerHTML = `
                <p class="text-red-500 text-center text-lg mt-6">Failed to load classes. Please try again later.</p>
            `;
            }
        };

        async function removeStudent(id) {
            if (confirm("Are you sure you want to remove this class?")) {
                const { default: apiFetch } = await import('/js/utils/apiFetch.js');
                
                try {
                    const response = await apiFetch(`/teacher/classes/delete/${id}`, {
                        method: 'DELETE',
                    });

                    location.reload();
                   
                } catch (error) {
                    console.error("Error removing class:", error);
                }
            }
        }
    </script>

<?php components("teachers/footer"); ?>
