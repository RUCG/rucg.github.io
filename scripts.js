// scripts.js

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Bildbewegung bei Scrollen
window.addEventListener('scroll', function () {
    const profilePicture = document.getElementById('profile-picture');
    const scrollPosition = window.scrollY;

    if (scrollPosition > 1) { // Passe diesen Wert je nach Bedarf an
        profilePicture.parentElement.classList.add('scrolled');
    } else {
        profilePicture.parentElement.classList.remove('scrolled');
    }
});