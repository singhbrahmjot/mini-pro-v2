document.addEventListener("DOMContentLoaded", function() {
    const wrapper = document.querySelector('.wrapper');
    const loginLink = document.querySelector('.login-link');
    const signupLink = document.querySelector('.register-link');
    const btnPopup = document.querySelector('.btnlogin-popup');
    const iconClose = document.querySelector('.icon-close');
    const loginForm = document.getElementById('login');
    const signupForm = document.getElementById('signup');

    loginLink.addEventListener('click', () => {
        wrapper.classList.add('active-popup');
        loginForm.classList.remove('hide');
        signupForm.classList.add('hide');
    });

    signupLink.addEventListener('click', () => { 
        signupForm.classList.remove('hide');
        loginForm.classList.add('hide');
    });

    btnPopup.addEventListener('click', () => {
        wrapper.classList.add('active-popup');
        loginForm.classList.remove('hide');
        signupForm.classList.add('hide');
    });

    iconClose.addEventListener('click', () => {
        wrapper.classList.remove('active-popup');
    });

    document.getElementById("lnksignup").addEventListener("click", function() {
        signupForm.classList.remove("hide");
        loginForm.classList.add("hide");
    });

    document.getElementById("lnklogin").addEventListener("click", function() {
        loginForm.classList.remove("hide");
        signupForm.classList.add("hide");
    });
});

