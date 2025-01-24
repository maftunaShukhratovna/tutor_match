function toggleModal() {
    const modal = document.getElementById('profile');
    modal.classList.toggle('hidden');
    document.getElementById('courses').classList.remove('hidden');
  }


  async function updateProfile() {
    event.preventDefault();
 
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const age = document.getElementById('age').value;
    const description = document.getElementById('description').value;


    const token = localStorage.getItem('token');
    const { default: apiFetch } = await import('/js/utils/apiFetch.js');
    const studentId = document.getElementById('student-id').value;


    apiFetch(`/student/updateInfo`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
        Authorization: `Bearer ${token}`,
      },
      body: JSON.stringify({

        full_name: name,
        email: email,
        password: password,
        age: age,
        description: description,
        student_id: studentId,  
      }),
    })


      .then(data => {
        console.log('Profile updated successfully:', data);
        window.location.href='/student/home';
        alert('Profile updated!');
      })
      .catch(error => {
        console.error('Error updating profile:', error);
        alert('Failed to update profile.');
      });
  }

  document.getElementById('profileForm').addEventListener('submit', updateProfile);


  async function showSection(sectionId) {
  
    document.querySelectorAll('.content').forEach((section) => {
      section.classList.add('hidden');
    });
    
    document.getElementById(sectionId).classList.remove('hidden');
    
    const { default: apiFetch } = await import('/js/utils/apiFetch.js');

    if(sectionId === 'profile') {
      apiFetch('/students/getInfo', {
        method: 'GET' 
      })

        .then(data => {
          console.log(data);

          document.getElementById('name').value = data.data.full_name;
          document.getElementById('email').value = data.data.email;
          document.getElementById('password').value = data.data.password;
          document.getElementById('age').value = data.data.age;
          document.getElementById('description').value = data.data.description;
          document.getElementById('student-id').value = data.data.student_id;
          
        });
    }
  }

  async function getInfo() {
    const { default: apiFetch } = await import('/js/utils/apiFetch.js');
    apiFetch('/students/getInfo', {
      method: 'GET' 
    })

      .then(data => {
        console.log(data);
        document.getElementById('email').value = data.data.email;

      });
  }
  

