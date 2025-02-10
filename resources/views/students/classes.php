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
            <div id="all-classes" class="content p-6 bg-gray-50 rounded-lg shadow-md">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-3xl font-bold text-gray-800">All Classes</h1>
                    <input type="text" id="searchInput" placeholder="Search subject..."
                        class="px-4 py-2 border rounded-lg w-1/3 focus:ring focus:ring-blue-300">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Class Card Template (Repeat this for each class) -->
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = async function () {
            const { default: apiFetch } = await import('/js/utils/apiFetch.js');
            const response = await apiFetch('/students/getInfo', { method: 'GET' });

        document.getElementById('emailmain').innerText = response.data.email;

        };

        document.addEventListener("DOMContentLoaded", async function () {
            try {
                const { default: apiFetch } = await import('/js/utils/apiFetch.js');
                const response = await apiFetch('/students/getClasses', { method: 'GET' });

                if (!response || !response.data || !Array.isArray(response.data)) {
                    console.error('Invalid response:', response);
                    return;
                }

                const classesContainer = document.querySelector(".grid");
                classesContainer.innerHTML = ""; // Oldingi ma'lumotlarni tozalash

                response.data.forEach((cls) => {
                    const classCard = document.createElement("div");
                    classCard.className = "bg-white border border-gray-200 rounded-xl shadow-lg p-6 hover:shadow-xl transition flex flex-col";

                    // `is_registered` 1 bo‘lsa, tugma `Cancel Registration`, aks holda `Register`
                    const isRegistered = cls.is_registered === 1;
                    const buttonText = isRegistered ? " Cancel " : "Register";
                    const buttonClass = isRegistered ? "bg-red-500 hover:bg-red-600" : "bg-blue-500 hover:bg-blue-600";

                    classCard.innerHTML = `
                        <h2 class="text-lg font-semibold text-gray-900">${cls.name}</h2>
                        <p class="text-sm text-gray-600 mt-2">${cls.description}</p>
                        <p class="text-sm text-gray-600 mt-2">📚 Subject: <span class="font-medium text-gray-800">${cls.subject}</span></p>
                        <p class="text-sm text-gray-600 mt-2">🕒 Duration: <span class="font-medium text-gray-800">${cls.duration}</span></p>
                        <p class="text-sm text-gray-600 mt-2">📍 Location: <span class="font-medium text-gray-800">${cls.place}</span></p>
                        <p class="text-sm text-gray-600 mt-2">💰 Cost: <span class="font-medium text-gray-800">${cls.cost.toLocaleString()} UZS</span></p>
                        <p class="text-sm text-gray-600 mt-2">📌 Seats Available: <span class="font-medium text-gray-800">${cls.seats}</span></p>
                        <p class="text-sm text-gray-600 mt-2">📅 Created at: <span class="font-medium text-gray-800">${new Date(cls.created_at).toLocaleDateString()}</span></p>
                        
                        <div class="mt-4 flex justify-between">
                            <a href="seeClassInfo/${cls.id}" class="px-3 py-1 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600">
                                See Full Info
                            </a>
                            <button class="px-3 py-1 bg-green-500 text-white font-medium rounded-lg hover:bg-gray-600">
                                Message Teacher
                            </button>
                            <button class="register-btn px-3 py-1 ${buttonClass} text-white font-medium rounded-lg" data-class-id="${cls.id}">
                                ${buttonText}
                            </button>
                        </div>
                    `;
                    classesContainer.appendChild(classCard);
                });

                document.querySelectorAll(".register-btn").forEach((button) => {
                    button.addEventListener("click", async function () {
                        const classId = this.getAttribute("data-class-id");
                        const studentId = await getStudentId();

                        const isRegistering = this.textContent.trim() === "Register";
                        const action = isRegistering ? "register" : "cancel";

                        try {
                            const { default: apiFetch } = await import('/js/utils/apiFetch.js');
                            const response = await apiFetch('/students/registerClass', {
                                method: 'POST',
                                body: JSON.stringify({
                                    student_id: parseInt(studentId, 10),
                                    class_id: parseInt(classId, 10),
                                    action
                                }),
                            });

                            location.reload();
                        } catch (error) {
                            console.error("Error:", error);
                        }
                    });
                });

                document.getElementById("searchInput").addEventListener("input", function () {
                    const searchValue = this.value.toLowerCase();
                    document.querySelectorAll(".grid > div").forEach((card) => {
                        const subjectElement = card.querySelector("p:nth-child(3) span");
                        if (subjectElement) {
                            const subject = subjectElement.textContent.toLowerCase();
                            card.style.display = subject.includes(searchValue) ? "flex" : "none";
                        }
                    });
                });
            } catch (error) {
                console.error("Error fetching classes:", error);
            }
        });

        async function getStudentId() {
            const { default: apiFetch } = await import('/js/utils/apiFetch.js');
            const response = await apiFetch('/students/getInfo', { method: 'GET' });
            return response.data.id;
        }
    </script>

    <?php components('students/footer'); ?>
</body>
