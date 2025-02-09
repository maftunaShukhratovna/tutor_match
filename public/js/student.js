
  async function updateProfile(event) {
    event.preventDefault();
 
    const name = document.getElementById('name').value;
    const email = document.getElementById('emailuser').value;
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

  document.getElementById('updateProfileForm').addEventListener('submit', updateProfile);




 
  

