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
        <div class="flex-1 bg-white p-8 overflow-auto">
            <!-- Courses Section -->
            <div id="courses" class="content p-6 bg-gray-50 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold text-gray-800">My Courses</h1>
                    <button class="text-blue-600 font-medium hover:underline">Edit Courses</button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
    window.onload = async function() {

        const {
            default: apiFetch
        } = await import('/js/utils/apiFetch.js');
        const response = await apiFetch('/students/getInfo', {
            method: 'GET',
        });

        console.log(response);
        document.getElementById('emailmain').innerText = response.data.email;
    };

    document.addEventListener("DOMContentLoaded", async function () {
    try {
        const { default: apiFetch } = await import('/js/utils/apiFetch.js');
        const response = await apiFetch('/students/getMyClasses', { method: 'GET' });

        let classes = response.data;
        let currentIndex = 0;
        const itemsPerPage = 3;

        const classesContainer = document.querySelector(".grid");
        const paginationContainer = document.createElement("div");
        paginationContainer.className = "flex justify-between items-center mt-4"; 

        const prevButton = document.createElement("button");
        const nextButton = document.createElement("button");

        prevButton.textContent = "Prev";
        nextButton.textContent = "Next";

        prevButton.className = "px-3 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600";
        nextButton.className = "px-3 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600";

        function renderClasses() {
            classesContainer.innerHTML = "";

            let visibleClasses = classes.slice(currentIndex, currentIndex + itemsPerPage);
            visibleClasses.forEach((cls) => {
                const classCard = document.createElement("div");
                classCard.className = "bg-white border border-gray-200 rounded-xl shadow-lg p-6 hover:shadow-xl transition flex flex-col";

                classCard.innerHTML = `
                    <h2 class="text-lg font-semibold text-gray-900">${cls.name}</h2>
                    <p class="text-sm text-gray-600 mt-2">${cls.description}</p>
                    <p class="text-sm text-gray-600 mt-2">📚 Subject: <span class="font-medium text-gray-800">${cls.subject}</span></p>
                    <p class="text-sm text-gray-600 mt-2">🕒 Duration: <span class="font-medium text-gray-800">${cls.duration}</span></p>
                    <p class="text-sm text-gray-600 mt-2">📍 Location: <span class="font-medium text-gray-800">${cls.place}</span></p>
                    <p class="text-sm text-gray-600 mt-2">💰 Cost: <span class="font-medium text-gray-800">${cls.cost.toLocaleString()} UZS</span></p>
                    
                    <div class="mt-4 flex justify-between">
                        <a href="seeClassInfo/${cls.id}" class="px-3 py-1 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600">
                            See Full Info
                        </a>
                        <button class="px-3 py-1 bg-green-500 text-white font-medium rounded-lg hover:bg-gray-600">
                            Message Teacher
                        </button>
                        <button class="cancel-btn px-3 py-1 bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg" data-class-id="${cls.id}">
                            Cancel
                        </button>
                    </div>
                `;
                classesContainer.appendChild(classCard);
            });

            prevButton.disabled = currentIndex === 0;
            nextButton.disabled = currentIndex + itemsPerPage >= classes.length;

            prevButton.style.opacity = prevButton.disabled ? "0.5" : "1";
            nextButton.style.opacity = nextButton.disabled ? "0.5" : "1";

            addCancelEventListeners();
        }

        prevButton.addEventListener("click", function () {
            if (currentIndex > 0) {
                currentIndex -= itemsPerPage;
                renderClasses();
            }
        });

        nextButton.addEventListener("click", function () {
            if (currentIndex + itemsPerPage < classes.length) {
                currentIndex += itemsPerPage;
                renderClasses();
            }
        });

        async function getStudentId() {
            const { default: apiFetch } = await import('/js/utils/apiFetch.js');
            const response = await apiFetch('/students/getInfo', { method: 'GET' });
            return response.data.id;
        }

        function addCancelEventListeners() {
            document.querySelectorAll(".cancel-btn").forEach((button) => {
                button.addEventListener("click", async function () {
                    const classId = this.getAttribute("data-class-id");
                    const studentId = await getStudentId();

                    try {
                        const { default: apiFetch } = await import('/js/utils/apiFetch.js');
                        const response = await apiFetch('/students/registerClass', {
                            method: 'POST',
                            body: JSON.stringify({
                                student_id: parseInt(studentId, 10),
                                class_id: parseInt(classId, 10),
                                action: "cancel"
                            }),
                        });

                        classes = classes.filter(cls => cls.id !== parseInt(classId, 10));
                        renderClasses();
                    } catch (error) {
                        console.error("Error:", error);
                    }
                });
            });
        }

        renderClasses();

        paginationContainer.appendChild(prevButton);
        paginationContainer.appendChild(nextButton);
        classesContainer.parentElement.appendChild(paginationContainer);

    } catch (error) {
        console.error("Error fetching classes:", error);
    }
});



    </script>


    <?php components('students/footer'); ?>