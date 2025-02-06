<div id="profile" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
  <div class="bg-white w-[400px] rounded-lg shadow-lg p-6 relative">
    <!-- Close Button -->
    <button onclick="toggleModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
      &times;
    </button>

    <!-- Modal Title -->
    <h2 class="text-lg font-medium text-gray-800 mb-4 text-center">Edit basic info</h2>
    

    <!-- Form -->
    <form id="updateProfileForm" class="space-y-4" onsubmit="updateProfile()">
      <div class="flex justify-between">
        <!-- Profile Picture (Left Section) -->
        <div class="flex flex-col items-center mb-4 w-1/3">
          <div class="w-24 h-24 rounded-full overflow-hidden border-2 border-gray-300 relative">
            <img
              id="profile_image"
              src="https://via.placeholder.com/150" 
              alt="Picture"
              class="w-full h-full object-cover"
            />
            <!-- Hidden File Input -->
            <input
              type="file"
              id="profile_picture"
              accept="image/*"
              class="hidden"
              onchange="previewImage(event)"
            />
            <!-- Upload Button -->
            <button
              type="button"
              onclick="document.getElementById('profile_picture').click()"
              class="absolute bottom-0 left-1/2 transform -translate-x-1/2 bg-blue-600 text-white text-xs px-2 py-1 rounded"
            >
              Upload
            </button>
          </div>
        </div>

        <!-- Right Section with Inputs -->
        <div class="w-2/3">
          <!-- Full Name -->
          <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Full name</label>
            <input
              type="text"
              id="name"
              placeholder="Enter your full name"
              class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
            />
          </div>
          <input type="number" id="student-id" class="hidden"/>

          <!-- Age -->
          <div class="mb-4">
            <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
            <input
              type="number"
              id="age"
              placeholder="Enter your age"
              class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
            />
          </div>

          <!-- Bio -->
          <div class="mb-4">
            <label for="decription" class="block text-sm font-medium text-gray-700">BIO</label>
            <textarea
              id="description"
              rows="3"
              placeholder="Tell the community about yourself"
              class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
            ></textarea>
            <p class="text-xs text-gray-500 mt-1">160 characters left</p>
          </div>
        </div>
      </div>

      <!-- Email & Password (Another Flexbox) -->
      <div class="flex justify-between">
        <!-- Email -->
        <div class="w-1/2 pr-2">
          <label for="emailuser" class="block text-sm font-medium text-gray-700">Email</label>
          <input
            type="email"
            id="emailuser"
            value=""
            placeholder="Enter your email"
            class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
          />
        </div>

        <!-- Password -->
        <div class="w-1/2 pl-2 relative">
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input
            type="password"
            id="password"
            placeholder="Enter your password"
            class="mt-1 w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring focus:ring-blue-200 focus:border-blue-400"
          />
          <!-- Show/Hide Password Icon -->
          <span
            onclick="togglePasswordVisibility()"
            class="absolute top-1/2 right-2 transform -translate-y-2/2 cursor-pointer text-gray-500"> @
          </span>
        </div>
      </div>

      <!-- Buttons -->
      <div class="flex justify-end space-x-3 mt-4">
        <button type="button" onclick="toggleModal()" class="px-4 py-2 text-sm bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
          Cancel
        </button>
        <button type="submit" class="px-4 py-2 text-sm bg-blue-600 text-white rounded hover:bg-blue-700">
          Save
        </button>
      </div>
    </form>
  </div>
</div>

<script>
 
  function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        document.getElementById('profile_image').src = e.target.result;
      };
      reader.readAsDataURL(file);
    }
  }


  function togglePasswordVisibility() {
    const passwordField = document.getElementById('password');
    const type = passwordField.type === 'password' ? 'text' : 'password';
    passwordField.type = type;
  }
</script>




  