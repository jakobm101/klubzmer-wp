document.addEventListener("DOMContentLoaded", function() {
    const nav = document.querySelector("nav");
    const toggle = document.createElement("button");
    toggle.innerText = "☰ Menu";
    toggle.style.display = "none";
    
    if (window.innerWidth < 768) {
        toggle.style.display = "block";
        nav.style.display = "none";
    }

    toggle.addEventListener("click", () => {
        nav.style.display = nav.style.display === "none" ? "block" : "none";
    });

    document.body.insertBefore(toggle, nav);
});
