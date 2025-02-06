function togglePasswordVisibility() {
    const passwordField = document.getElementById('passworduser');
    const type = passwordField.type === 'password' ? 'text' : 'password';
    passwordField.type = type;
}

async function updateProfile() {
    event.preventDefault(); // Form submitni to‘xtatish

    const name = document.getElementById('name').value;
    const email = document.getElementById('emailuser').value;
    const password = document.getElementById('passworduser').value;
    const birth_date = document.getElementById('birth_date').value;
    const province = document.getElementById('province')?.value || null;
    const description = document.getElementById('description').value;
    const student_number = document.getElementById('student_number').value;
    const experience = document.getElementById('experience').value;
    const subject = document.getElementById('subject').value;
    const workplace = document.getElementById('workplace').value;
    
    const token = localStorage.getItem('token');
    const { default: apiFetch } = await import('/js/utils/apiFetch.js');
    const teacherId = document.getElementById('teacher-id')?.value || null;

    // **Universitet va darajalarni olish**
    const universityElements = document.querySelectorAll('select[name="university"]');
    const degreeElements = document.querySelectorAll('select[name="degree"]');

    let education = [];
    universityElements.forEach((university, index) => {
        education.push({
            university: university.value,
            degree: degreeElements[index].value
        });
    });

    try {
        const response = await apiFetch(`/teacher/updateInfo`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                Authorization: `Bearer ${token}`,
            },
            body: JSON.stringify({
                full_name: name,
                email: email,
                password: password,
                birth_date: birth_date,
                province: province,
                description: description,
                student_number: student_number,
                experience: experience,
                subject: subject,
                workplace: workplace,
                teacher_id: teacherId,
                education: education 
            }),
        });

        console.log('Profile updated successfully:', response);
        alert('Profile updated!');
        window.location.href = '/teacher/waitpage';

    } catch (error) {
        console.error('Error updating profile:', error);
        alert('Failed to update profile.');
    }
}

document.getElementById('profileForm').addEventListener('submit', updateProfile);


function addEducation() {
    const educationSection = document.getElementById('education-section');
    const newEducationHTML = `
    <div class="flex items-center mb-4 education-item">
        <select name="university" class="w-1/3 border border-gray-300 rounded px-3 py-2 text-sm mr-2">
            <option value="Toshkent Milliy universitet">Toshkent Milliy universitet</option>
            <option value="Toshkent davlat pedagokika universitetti">Toshkent davlat pedagokika universitetti</option>
        </select>
        <select name="degree" class="w-1/3 border border-gray-300 rounded px-3 py-2 text-sm mr-2">
            <option value="bachelor">Bachelor</option>
            <option value="master">Master</option>
            <option value="PHD">PHD</option>

        </select>
        <button type="button" onclick="removeEducation(this)" class="bg-red-500 text-white rounded px-4 py-2">Remove</button>
    </div>
    `;
    educationSection.insertAdjacentHTML('beforeend', newEducationHTML);
    updateEducationIndexes();
}


function removeEducation(button) {
    const educationItem = button.closest('.education-item');
    educationItem.remove();
    updateEducationIndexes();
}
function updateEducationIndexes() {
    const educationItems = document.querySelectorAll('.education-item');
    educationItems.forEach((item, index) => {
        item.id = `education-${index + 1}`; 
    });
}


function addCertificate() {
    const certificatesSection = document.getElementById('certificates-section');
    const newCertificateHTML = `
    <div class="flex items-center mb-4 certificate-item">
        <input type="file" name="certificates[]" class="mr-2" />
        <input type="text" name="certificate_description[]" placeholder="Certificate Description" class="w-2/3 border border-gray-300 rounded px-3 py-2 text-sm" />
        <button type="button" onclick="removeCertificate(this)" class="bg-red-500 text-white rounded px-4 py-2">Remove</button>
    </div>
    `;
    certificatesSection.insertAdjacentHTML('beforeend', newCertificateHTML);
    updateCertificateIndexes();
}

function removeCertificate(button) {
    const certificateElement = button.closest('.certificate-item');
    certificateElement.remove();
    updateCertificateIndexes();
}

function updateCertificateIndexes() {
    const certificateItems = document.querySelectorAll('.certificate-item');
    certificateItems.forEach((item, index) => {
        item.id = `certificate-${index + 1}`; // Indekslarni yangilash
    });
}


function addDiploma() {
    const certificatesSection = document.getElementById('diploma-section');
    const newCertificateHTML = `
    <div class="flex items-center mb-4 diploma-item">
        <input type="file" name="diplomas[]" class="mr-2" />
        <input type="text" name="diplomas_description[]" placeholder="Diploma Description" class="w-2/3 border border-gray-300 rounded px-3 py-2 text-sm" />
        <button type="button" onclick="removeDiploma(this)" class="bg-red-500 text-white rounded px-4 py-2">Remove</button>
    </div>
    `;
    certificatesSection.insertAdjacentHTML('beforeend', newCertificateHTML);
    updateDiplomaIndexes();
}

function removeDiploma(button) {
    const certificateElement = button.closest('.diploma-item');
    certificateElement.remove();
    updateDiplomaIndexes();
}

function updateDiplomaIndexes() {
    const certificateItems = document.querySelectorAll('.diploma-item');
    certificateItems.forEach((item, index) => {
        item.id = `diplomas-${index + 1}`; // Indekslarni yangilash
    });
}
