<?php components("teachers/header"); ?>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Navbar -->
    <?php components("teachers/navbar"); ?>

    <div class="flex flex-grow">
        <!-- Sidebar -->
        <?php components("teachers/sidebar"); ?>

        <div class="bg-white shadow-lg rounded-lg p-6 max-w-3xl mx-auto mt-10">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Create a New Class</h2>
            <p class="text-gray-600">Fill in the details to create a new class.</p>

            <form id='form' onsubmit="updateClass(event)" class="mt-6 space-y-6">
                <div>
                    <label class="block text-gray-700 font-medium">Class Name</label>
                    <input type="text" name="class_name"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium">Subject</label>
                    <input type="text" name="subject"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium">Format</label>
                    <select name="format" id="formatSelect"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        <option value="online">Online</option>
                        <option value="offline">Offline</option>
                    </select>
                </div>

                <div id="platform_section">
                    <label class="block text-gray-700 font-medium">Platform (For Online)</label>
                    <input type="text" name="platform"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>

                <div id="address_section" class="hidden">
                    <label class="block text-gray-700 font-medium">Address (For Offline)</label>
                    <input type="text" name="address"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium text-center">Duration</label>
                        <input type="text" name="duration"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium text-center">Time</label>
                        <input type="text" name="time"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium text-center">Cost</label>
                        <input type="number" name="cost"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium">Description</label>
                    <textarea id="description" name="description" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500"
                        required></textarea>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium">Seats Available</label>
                    <input type="number" name="seats"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div id="error" class="text-red-500"></div>

                <button id="submit-btn" type="submit"
                    class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg font-medium hover:bg-blue-700 transition">
                    Update Class
                </button>
            </form>
        </div>

        <!-- Table -->
<div class="bg-white shadow-lg rounded-lg p-6 max-w-5xl mx-auto mt-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Joined Students</h2>

    <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="py-2 px-4 border-r text-left text-gray-700">Student ID</th>
                <th class="py-2 px-4 border-r text-left text-gray-700">Full Name</th>
                <th class="py-2 px-4 border-r text-left text-gray-700">Age</th>
                <th class="py-2 px-4 text-left text-gray-700">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b hover:bg-gray-50">
                
            </tr>
        </tbody>
    </table>
</div>
</div>


    <script>
        window.onload = async function () {
        const classId = <?= json_encode($class_id) ?>;

        const { default: apiFetch } = await import('/js/utils/apiFetch.js');
        const response = await apiFetch(`/teacher/joinedStudents/${classId}`, { method: 'GET' });

        if (response) {
            let counter=0;
            const tbody = document.querySelector("tbody");
            tbody.innerHTML = ""; // Jadvalni tozalaymiz

            response.data.forEach(student => {
                counter++;
                const row = document.createElement("tr");
                row.className = "border-b hover:bg-gray-50";

                row.innerHTML = `
                    <td class="py-2 px-4 border-r">${counter}</td>
                    <td class="py-2 px-4 border-r">${student.full_name}</td>
                    <td class="py-2 px-4 border-r">${student.age ?? 'N/A'}</td>
                    <td class="py-2 px-4">
                        <button class="px-3 py-1 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600">
                            Message
                        </button>
                    </td>
                `;

                tbody.appendChild(row);
            });
        } else {
            document.querySelector("tbody").innerHTML = `
                <tr>
                    <td colspan="4" class="py-4 px-4 text-center text-gray-500">No students joined yet.</td>
                </tr>
            `;
        }
    };


    document.addEventListener("DOMContentLoaded", function() {
        const formatSelect = document.getElementById("formatSelect");
        const platformSection = document.getElementById("platform_section");
        const addressSection = document.getElementById("address_section");

        formatSelect.addEventListener("change", function() {
            if (this.value === "online") {
                platformSection.classList.remove("hidden");
                addressSection.classList.add("hidden");
            } else {
                platformSection.classList.add("hidden");
                addressSection.classList.remove("hidden");
            }
        });

        loadClassData();
    });

    async function loadClassData() {
        const classId = <?= json_encode($class_id) ?>;

        try {
            const {
                default: apiFetch
            } = await import('/js/utils/apiFetch.js');
            const response = await apiFetch(`/teacher/getClassInfo/${classId}`, {
                method: 'GET'
            });


            console.log(response);

            const classData = response.data;

            const form = document.getElementById("form");

            form.class_name.value = classData.name;
            form.subject.value = classData.subject;
            form.format.value = classData.format;
            form.duration.value = classData.duration;
            form.time.value = classData.time;
            form.cost.value = classData.cost;
            form.description.value = classData.description;
            form.seats.value = classData.seats;

            if (classData.format === "online") {
                form.platform.value = classData.place; 
                document.getElementById("platform_section").classList.remove("hidden");
                document.getElementById("address_section").classList.add("hidden");
            } else {
                form.address.value = classData.place; 
                document.getElementById("platform_section").classList.add("hidden");
                document.getElementById("address_section").classList.remove("hidden");
            }

        } catch (error) {
            console.error("Error fetching class data:", error);
        }
    }

    async function updateClass(event) {
    event.preventDefault();
    const classId = <?= json_encode($class_id) ?>;

    const button = document.getElementById("submit-btn");
    button.disabled = true;
    button.innerHTML = 'Updating...';

    let form = document.getElementById("form"),
        formData = new FormData(form);

    let format = formData.get("format") || "offline"; 

    let description = formData.get("description")?.trim();
    if (!description) {
        formData.set("description", "No description provided");
    }


    if (format === "online") {
        formData.set("address", "noinfo");
    }


    if (format === "offline") {
        formData.set("platform", "noinfo");
    }

    formData.append("class_id", classId); 

    document.getElementById('error').innerHTML = '';

    try {
        const { default: apiFetch } = await import('/js/utils/apiFetch.js');
        const data = await apiFetch('/teacher/updateclass', {
            method: 'POST',
            body: formData
        });

        button.innerHTML = 'Class Updated ✅';
        window.location.href = "/teacher/myclasses";
    } catch (error) {
        console.error("Error:", error);
        if (error.data && error.data.errors) {
            Object.values(error.data.errors).forEach(err => {
                document.getElementById('error').innerHTML += `<p class="text-red-500 mt-1">${err}</p>`;
            });
        }
        button.innerHTML = 'Update Class';
    } finally {
        button.disabled = false;
    }
}


    </script>

    <?php components("teachers/footer"); ?>