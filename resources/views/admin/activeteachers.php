<?php components("admins/header"); ?>

<body class="bg-gray-100">
    <div class="flex">
        <?php components("admins/sidebar"); ?>
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-semibold text-gray-800">Active Teachers List</h1>
            <p class="mt-4 text-gray-600">Manage all active teachers.</p>

            <div class="mt-6 overflow-x-auto">
                <table class="w-full table-auto border-collapse border border-gray-300 bg-white shadow-lg rounded-lg">
                    <thead class="bg-blue-800 text-white">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Full Name</th>
                            <th class="px-4 py-2 border">Date of Birth</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Phone Number</th>
                            <th class="px-4 py-2 border">Subject</th>
                            <th class="px-4 py-2 border">Created At</th>
                            <th class="px-4 py-2 border">Profile</th>
                        </tr>
                    </thead>
                    <tbody id="newTeachersTableBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
    window.onload = async function() {
    const { default: apiFetch } = await import('/js/utils/apiFetch.js');

    try {
        const response = await apiFetch('/admin/newTeachers/getInfo?status=confirmed', {
            method: 'GET',
        });

        if (response.data && Array.isArray(response.data)) {
            const tableBody = document.getElementById("newTeachersTableBody");
            tableBody.innerHTML = "";

            let counter=0;

            response.data.forEach(teacher => {
                counter+=1;
                const subject = (teacher.experience.length > 0) ? teacher.experience[0].subject : "N/A";

                const row = `
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border">${counter}</td>
                        <td class="px-4 py-2 border">${teacher.full_name}</td>
                        <td class="px-4 py-2 border">${teacher.birth_date ? teacher.birth_date : "N/A"}</td>
                        <td class="px-4 py-2 border">${teacher.email}</td>
                        <td class="px-4 py-2 border">${teacher.phone}</td>
                        <td class="px-4 py-2 border">${subject}</td>
                        <td class="px-4 py-2 border">${teacher.created_at}</td>
                        <td class="px-4 py-2 border text-center">
                            <a href="/admin/seeTeacherInfo/${teacher.id}" class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700">
                                See More
                            </a>
                        </td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
        }

    } catch (error) {
        console.error("Error fetching teachers:", error);
    }
};

    </script>
</body>

</html>