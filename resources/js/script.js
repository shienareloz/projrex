// Function to show the appropriate form (Login or Register)
function showForm(formType) {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    if (formType === 'login') {
        loginForm.style.display = 'block';
        registerForm.style.display = 'none';
    } else {
        loginForm.style.display = 'none';
        registerForm.style.display = 'block';
    }
}

// Validate the Login Form (Basic Validation)
function validateLogin() {
    const username = document.getElementById('loginUsername').value;
    const password = document.getElementById('loginPassword').value;

    if (!username || !password) {
        alert('Please fill in both username and password.');
        return false;
    }

    alert('Login successful!');
    return false; // Prevent form submission for now
}

// Validate the Registration Form (Basic Validation)
function validateRegister() {
    const username = document.getElementById('regUsername').value;
    const email = document.getElementById('regEmail').value;
    const password = document.getElementById('regPassword').value;
    const confirmPassword = document.getElementById('regConfirmPassword').value;
    const identity = document.getElementById('regSelect').value;
    const course = document.getElementById('regCourse').value;

    if (!username || !email || !password || !confirmPassword || !identity || !course) {
        alert('Please fill in all the fields.');
        return false;
    }

    // Check if passwords match
    if (password !== confirmPassword) {
        alert('Passwords do not match.');
        return false;
    }

    alert('Registration successful!');
    return false; // Prevent form submission for now
}
