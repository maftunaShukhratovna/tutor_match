console.log("login.js yuklandi!");
async function login() {
    let errorMessage = document.getElementById("forTest"),
        email = document.getElementById("email"),
        password = document.getElementById("password"),
        form = document.getElementById("form");

    if (email.value === "" || password.value === "") {
        errorMessage.innerHTML = "Enter email/password";
        errorMessage.style.color = "red";
        return; 
    }

    errorMessage.innerHTML = "";

    let formData = new FormData(form);

    try {
        let response = await fetch("http://localhost:8000/api/login", {
            method: "POST",
            body: formData,
        });

        if (!response.ok) {
            throw new Error("Login failed");
        }

        let data = await response.json();
        localStorage.setItem("token", data.token);
        console.log("Token stored:", localStorage.getItem("token"));

        alert("Login successful!");
        window.location.href = "/dashboard";
    } catch (error) {
        errorMessage.innerHTML = error.message;
        errorMessage.style.color = "red";
        console.error(error);
    }
}




// async function login() {
//     let form = document.getElementById("form"),
//         formData = new FormData(form);
//     const { default: apiFetch } = await import('./utils/apiFetch.js');
    
//     await apiFetch('/login', { method: "POST", body: formData })
//         .then(data => console.log(data))
//         .catch(error => { 
//             console.error(error.data.errors);
//             Object.keys(error.data.errors).forEach(err => {
//                 document.getElementById('error').innerHTML += `<p class="text-red-500 mt-1">${error.data.errors[err]}</p>`;
//             });
//         });
// }
