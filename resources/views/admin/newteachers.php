<?php components("admins/header"); ?>

<body class="bg-gray-100">
    <div class="flex">
        <?php components("admins/sidebar"); ?>
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-semibold text-gray-800">Registered Teachers List</h1>
            <p class="mt-4 text-gray-600">Manage all registered teachers.</p>

            <div class="mt-6 overflow-x-auto">
                <table class="w-full table-auto border-collapse border border-gray-300 bg-white shadow-lg rounded-lg">
                    <thead class="bg-blue-800 text-white">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Full Name</th>
                            <th class="px-4 py-2 border">Date of Birth</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Password</th>
                            <th class="px-4 py-2 border">Subject</th>
                            <th class="px-4 py-2 border">Created At</th>
                            <th class="px-4 py-2 border">Profile</th>
                            <th class="px-4 py-2 border">Status</th>
                        </tr>
                    </thead>
                    <tbody id="newTeachersTableBody">
                        <!-- Ma'lumotlar dinamik ravishda JavaScript orqali yuklanadi -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
    window.onload = async function() {
        const {
            default: apiFetch
        } = await import('/js/utils/apiFetch.js');

        try {
            const response = await apiFetch('/admin/newTeachers/getInfo', {
                method: 'GET',
            });

            if (response.data && Array.isArray(response.data)) {
                const tableBody = document.getElementById("newTeachersTableBody");
                tableBody.innerHTML = "";

                response.data.forEach(teacher => {
                    // Tajriba mavjud bo‘lsa, birinchi experience ichidan subject olish
                    const subject = (teacher.experience.length > 0) ? teacher.experience[0].subject :
                        "N/A";

                    const row = `
            <tr class="hover:bg-gray-100">
                <td class="px-4 py-2 border">${teacher.id}</td>
                <td class="px-4 py-2 border">${teacher.full_name}</td>
                <td class="px-4 py-2 border">${teacher.birth_date ? teacher.birth_date : "N/A"}</td>
                <td class="px-4 py-2 border">${teacher.email}</td>
                <td class="px-4 py-2 border">*******</td>
                <td class="px-4 py-2 border">${subject}</td>
                <td class="px-4 py-2 border">${teacher.created_at}</td>
                <td class="px-4 py-2 border text-center">
                    <button onclick="seeFullInfo(${teacher.id})" class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700">
                    See More
                    </button>
                </td>
                <td class="px-4 py-2 border text-center">
                    <button onclick="confirm(${teacher.id})" class="bg-green-600 text-white px-3 py-1 rounded-lg hover:bg-green-700">
                    Confirm
                    </button>
                    <button onclick="reject(${teacher.id})" class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700">
                    Reject
                    </button>
                </td>
            </tr>
        `;
                    tableBody.innerHTML += row;
                });
            }

        } catch (error) {
            console.error("Error fetching students:", error);
        }
    };

    </script>
</body>

</html>