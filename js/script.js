function filterDrinks(category) {

    let drinks = document.querySelectorAll(".drink-card");

    drinks.forEach(function(drink) {

        if (category === "all") {
            drink.style.display = "block";
        }
        else if (drink.classList.contains(category)) {
            drink.style.display = "block";
        }
        else {
            drink.style.display = "none";
        }

    });
}
// Contact form validation

let contactForm = document.getElementById("contactForm");

if (contactForm) {

    contactForm.addEventListener("submit", function(event) {

        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let message = document.getElementById("message").value.trim();

        let valid = true;

        document.getElementById("nameError").textContent = "";
        document.getElementById("emailError").textContent = "";
        document.getElementById("messageError").textContent = "";

        if (name === "") {

            document.getElementById("nameError").textContent =
                "Please enter your name.";

            valid = false;
        }

        if (email === "") {

            document.getElementById("emailError").textContent =
                "Please enter your email.";

            valid = false;
        }

        if (message === "") {

            document.getElementById("messageError").textContent =
                "Please enter your message.";

            valid = false;
        }

        if (!valid) {

            event.preventDefault();

        }

    });

}
// Smooth scrolling for navigation links

document.querySelectorAll('a[href^="#"]').forEach(function(link) {

    link.addEventListener("click", function(event) {

        let target = document.querySelector(this.getAttribute("href"));

        if (target) {
            event.preventDefault();

            target.scrollIntoView({
                behavior: "smooth"
            });
        }

    });

});