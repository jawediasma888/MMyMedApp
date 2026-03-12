
function showForm(formID) {
    document.querySelectorAll(".container").forEach(form => {
        form.classList.remove("active");
    });
    document.getElementById(formID).classList.add("active");
}

document.addEventListener('DOMContentLoaded', function() {
    const loginSpan = document.getElementById('crr-login');
    const registerSpan = document.getElementById('crr-register');
    
    if (loginSpan) {
        loginSpan.addEventListener('click', function() {
            showForm('registerContainer');
        });
    }
    
    if (registerSpan) {
        registerSpan.addEventListener('click', function() {
            showForm('loginContainer');
        });
    }
});

function validateRegisterForm() {
    const pass1 = document.querySelector('input[name="pass1"]').value;
    const pass2 = document.querySelector('input[name="pass2"]').value;
    
    if (pass1 !== pass2) {
        alert('Les mots de passe ne correspondent pas !');
        return false;
    }
    return true;
}
document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.querySelector('.register form');
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            if (!validateRegisterForm()) {
                e.preventDefault();
            }
        });
    }
});