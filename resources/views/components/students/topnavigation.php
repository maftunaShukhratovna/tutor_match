<div class="flex items-center justify-between">
            <!-- Profile Section -->
            
            <div class="flex items-center space-x-10">
                <img src="https://cdn.kastatic.org/images/avatars/svg/blobby-blue.svg" alt="Avatar"
                    class="w-16 h-16 rounded-full">
                <div>
                    <h1 id="emailmain" class="text-xl font-bold"> </h1>
                    <p></p>
                    <div class="flex space-x-2 text-sm text-gray-500">
                        <a href="/student/editprofile" class="hover:underline">Create your profile</a>
                        <span>-</span>
                        <a href="/student/editprofile"  class="hover:underline">Add your bio</a>
                    </div>
                </div>
            </div>


            <a href="/student/editprofile"
                class="px-4 py-2 bg-gray-300 hover:bg-gray-300 text-gray-700 rounded-lg">Edit Profile
            </a>

        </div>
            <script>
    window.onload = async function() {
    
        const { default: apiFetch } = await import('/js/utils/apiFetch.js');
        const response = await apiFetch('/students/getInfo', {
            method: 'GET',
        });

        console.log(response);
        document.getElementById('emailmain').innerText = response.data.email; 
  };

</script>