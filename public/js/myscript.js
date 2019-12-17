// This script is written by Parviz Karimli

// Add active class to the clicked nav-item and remove from others

var navItems = document.querySelectorAll('.nav-item');

for(var i=0; i<navItems.length; i++) {
    navItems[i].addEventListener('click', activateLink);
}

function activateLink() {
    for(var i=0; i<navItems.length; i++) {
        navItems[i].classList.remove('active');
    }

    this.classList.add('active');
}
