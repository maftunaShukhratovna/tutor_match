
<?php components('students/header'); ?>

<body class="bg-white">

<?php components('students/navbar'); ?>

  <div class="max-w-8xl mx-auto mt-8 bg-purple-100 p-4 rounded-lg shadow">
    <div class="flex items-center justify-between">
      <!-- Profile Section -->

      <div class="flex items-center space-x-10">
        <img src="https://cdn.kastatic.org/images/avatars/svg/blobby-blue.svg" alt="Avatar" class="w-16 h-16 rounded-full">
        <div>
          <h1 id="profile-email" class="text-xl font-bold"></h1>
          <div class="flex space-x-2 text-sm text-gray-500">
            <button  onclick="showSection('profile')" class="hover:underline">Create your profile</button>
            <span>-</span>
            <button onclick="showSection('profile')" class="hover:underline">Add your bio</>
          </div>
        </div>
      </div>
      
      
      <button onclick="showSection('profile')" class="px-4 py-2 bg-gray-300 hover:bg-gray-300 text-gray-700 rounded-lg">Edit Profile</>

    </div>
  </div>

  <div class="flex h-full">
    <!-- Sidebar -->
    <div class="w-1/4 bg-white shadow-md p-6">
      <h2 class="text-gray-500 font-semibold mb-4">MY STUFF</h2>
      <ul class="space-y-2">
        <li><button onclick="showSection('courses')" class="w-full text-left text-blue-600 hover:underline">Courses</button></li>
      </ul>

      <h2 class="text-gray-500 font-semibold mt-6 mb-4">MY ACCOUNT</h2>
      <ul class="space-y-2">
        <li><button onclick="showSection('progress')" class="w-full text-left text-gray-700 hover:underline">Progress</button></li>
        <li><button onclick="showSection('profile')" class="w-full text-left text-gray-700 hover:underline">Profile</button></li>
        <li><button onclick="showSection('teachers')" class="w-full text-left text-gray-700 hover:underline">Teachers</button></li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 bg-white p-8 overflow-auto">
      <!-- Courses Section -->
      <div id="courses" class="content">
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-2xl font-bold">My Courses</h1>
          <button class="text-blue-600 hover:underline">Edit Courses</button>
        </div>

        <div class="grid grid-cols-2 gap-6">
          <!-- Course 1 -->
          <div class="border border-gray-200 rounded-lg shadow-sm p-4">
            <h2 class="text-lg font-semibold">AP®/College Calculus AB</h2>
            <ul class="mt-3 space-y-2 text-sm text-gray-600">
              <li>Limits and continuity - <span class="font-medium text-gray-800">11% Mastered</span></li>
              <li>Differentiation: basic derivative rules</li>
              <li>Differentiation: composite, implicit, and inverse functions</li>
            </ul>
            <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Start</button>
          </div>

          <!-- Course 2 -->
          <div class="border border-gray-200 rounded-lg shadow-sm p-4">
            <h2 class="text-lg font-semibold">AP®/College Statistics</h2>
            <ul class="mt-3 space-y-2 text-sm text-gray-600">
              <li>Exploring categorical data - <span class="font-medium text-gray-800">52% Mastered</span></li>
              <li>Exploring one-variable quantitative data</li>
              <li>Exploring two-variable quantitative data</li>
            </ul>
            <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Start</button>
          </div>
        </div>
      </div>

      <!-- Progress Section -->
      <div id="progress" class="content hidden">
        <h1 class="text-2xl font-bold">Progress</h1>
        <p class="mt-6 text-gray-700">Your progress details will appear here.</p>
      </div>

      <!-- Profile Section -->
      <?php view('students/profile'); ?>
      

  
      <!-- Teachers Section -->
      <div id="teachers" class="content hidden">
        <h1 class="text-2xl font-bold">Teachers</h1>
        <p class="mt-6 text-gray-700">Your teacher details will appear here.</p>
      </div>
    </div>
  </div>

 

<?php components('students/footer'); ?>
