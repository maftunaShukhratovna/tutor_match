<?php components("admins/header"); ?>
<body class="bg-gray-100">
    <div class="flex">
        <?php components("admins/sidebar"); ?>
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-semibold text-gray-800">Students List</h1>
            <p class="mt-4 text-gray-600">Manage all registered students.</p>

            <div class="mt-6 overflow-x-auto">
                <table class="w-full table-auto border-collapse border border-gray-300 bg-white shadow-lg rounded-lg">
                    <thead class="bg-blue-800 text-white">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Full Name</th>
                            <th class="px-4 py-2 border">Age</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Password</th>
                            <th class="px-4 py-2 border">Description</th>
                            <th class="px-4 py-2 border">Created At</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody id="studentsTableBody">
                        <!-- Ma'lumotlar dinamik ravishda JavaScript orqali yuklanadi -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        window.onload = async function() {
            const { default: apiFetch } = await import('/js/utils/apiFetch.js');
            
            try {
                const response = await apiFetch('/admin/students/getInfo', {
                    method: 'GET',
                });

                if (response.data && Array.isArray(response.data)) {
                    const tableBody = document.getElementById("studentsTableBody");
                    tableBody.innerHTML = ""; 

                    response.data.forEach(student => {
                        const row = `
                            <tr class="hover:bg-gray-100">
                                <td class="px-4 py-2 border">${student.id}</td>
                                <td class="px-4 py-2 border">${student.full_name}</td>
                                <td class="px-4 py-2 border">${student.age}</td>
                                <td class="px-4 py-2 border">${student.email}</td>
                                <td class="px-4 py-2 border">*******</td>
                                <td class="px-4 py-2 border">${student.description}</td>
                                <td class="px-4 py-2 border">${student.created_at}</td>
                                <td class="px-4 py-2 border text-center">
                                    <button onclick="removeStudent(${student.id})" class="bg-red-600 text-white px-3 py-1 rounded-lg hover:bg-red-700">
                                        Remove
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

        async function removeStudent(id) {
            if (confirm("Are you sure you want to remove this student?")) {
                const { default: apiFetch } = await import('/js/utils/apiFetch.js');
                
                try {
                    const response = await apiFetch(`/admin/students/delete/${id}`, {
                        method: 'DELETE',
                    });

                    location.reload();
                   
                } catch (error) {
                    console.error("Error removing student:", error);
                }
            }
        }
    </script>
</body>
</html>
