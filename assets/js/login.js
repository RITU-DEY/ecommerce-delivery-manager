document.addEventListener("DOMContentLoaded", function () {

    const form = document.querySelector("form");

    form.addEventListener("submit", function (e) {

        const email = form.email.value.trim();
        const password = form.password.value.trim();

        
        if (email === "" || password === "") {
            alert(" Email and Password required");
            e.preventDefault();
            return;
        }

        
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert(" Invalid email format");
            e.preventDefault();
            return;
        }

        
        if (password.length < 4) {
            alert(" Password too short");
            e.preventDefault();
            return;
        }

    });

});