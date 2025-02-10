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

            <form id='form' onsubmit="createClass(event)" class="mt-6 space-y-6">
                <div>
                    <label class="block text-gray-700 font-medium">Class Name</label>
                    <input type="text" name="class_name" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium">Subject</label>
                    <input type="text" name="subject" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium">Format</label>
                    <select name="format" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        <option value="online">Online</option>
                        <option value="offline">Offline</option>
                    </select>
                </div>

                <div id="platform_section">
                    <label class="block text-gray-700 font-medium">Platform (For Online)</label>
                    <input type="text" name="platform" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>

                <div id="address_section" class="hidden">
                    <label class="block text-gray-700 font-medium">Address (For Offline)</label>
                    <input type="text" name="address" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-gray-700 font-medium text-center">Duration (e.g., 3 months)</label>
                        <input type="text" name="duration" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium text-center">Time (e.g., 10:00 - 12:00, Mon-Wed-Fri)</label>
                        <input type="text" name="time" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium text-center">Cost</label>
                        <input type="number" name="cost" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium">Description</label>
                    <textarea id="description" name="description" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium">Seats Available</label>
                    <input type="number" name="seats" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                </div>

                <!-- Xatolarni chiqarish joyi -->
                <div id="error" class="text-red-500"></div>

                <button id="submit-btn" type="submit" class="w-full bg-blue-600 text-white px-4 py-3 rounded-lg font-medium hover:bg-blue-700 transition">
                    Create Class
                </button>
            </form>
        </div>
    </div>
<!-- Sahifa oxirida -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const formatSelect = document.querySelector('select[name="format"]');
        const platformSection = document.getElementById('platform_section');
        const addressSection = document.getElementById('address_section');

        function toggleFields() {
            if (formatSelect.value === "online") {
                platformSection.classList.remove("hidden");
                addressSection.classList.add("hidden");
            } else {
                platformSection.classList.add("hidden");
                addressSection.classList.remove("hidden");
            }
        }

        toggleFields();

        formatSelect.addEventListener("change", toggleFields);
    });
</script>

<script>
    async function createClass(event) {
    event.preventDefault();

    const button = document.getElementById("submit-btn");
    button.disabled = true;
    button.innerHTML = 'Creating...';

    let form = document.getElementById("form"),
        formData = new FormData(form); // ✅ Asl form ma'lumotlarini olish

    let format = formData.get("format");

    if (format === "online") {
        if (!formData.get("address")) {
            formData.set("address", "noinfo");
        }
    } else if (format === "offline") {
        if (!formData.get("platform")) {
            formData.set("platform", "noinfo");
        }
    }

    document.getElementById('error').innerHTML = '';

    const { default: apiFetch } = await import('/js/utils/apiFetch.js');

    try {
        const token = localStorage.getItem('token');
        console.log("LocalStorage'dan olingan token:", token);

        const data = await apiFetch('/teacher/createclass', {
            method: 'POST',
            body: formData 
        });

        button.innerHTML = 'Class Created ✅';
        window.location.href = "/teacher/myclasses";
    } catch (error) {
        console.error("Xatolik yuz berdi:", error);
        if (error.data && error.data.errors) {
            Object.keys(error.data.errors).forEach(err => {
                document.getElementById('error').innerHTML +=
                    `<p class="text-red-500 mt-1">${error.data.errors[err]}</p>`;
            });
        }
        button.innerHTML = 'Create Class';
    } finally {
        button.disabled = false;
    }
}


</script>
<?php components("teachers/footer"); ?>





