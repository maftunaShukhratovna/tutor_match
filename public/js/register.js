async function register() {
    let errorMessage = document.getElementById("forTest"),
        name = document.getElementById("name"),
        email = document.getElementById("email"),
        password = document.getElementById("password"),
        confirmPassword = document.getElementById("confirm-password"),
        form = document.querySelector("form");

    if (!errorMessage) {
        errorMessage = document.createElement("div");
        errorMessage.id = "forTest";
        form.parentNode.insertBefore(errorMessage, form);
    }

    if (!name.value || !email.value || !password.value || !confirmPassword.value) {
        errorMessage.innerHTML = "Enter all information.";
        errorMessage.style.color = "red";
        return;
    }

    if (password.value !== confirmPassword.value) {
        errorMessage.innerHTML = "passwords dont match.";
        errorMessage.style.color = "red";
        return;
    }

    errorMessage.innerHTML = "";

    let formData = new FormData(form);

    try {
        let response = await fetch("http://localhost:8000/api/register", {
            method: "POST",
            body: formData,
        });

        if (!response.ok) {
            throw new Error("Registration failed");
        }

        let data = await response.json();
        alert("Registration successful!");
        window.location.href = "/dashboard";
    } catch (error) {
        errorMessage.innerHTML = error.message;
        errorMessage.style.color = "red";
        console.error(error);
    }
}
