document.addEventListener("DOMContentLoaded", function() {
    var currentURL = window.location.href;
    var sidebarItems = document.querySelectorAll(".nav-item");

    // Loop melalui semua elemen rute dan tambahkan kelas "active" ke yang sesuai
    sidebarItems.forEach(function(item) {
        var link = item.querySelector("a");
        var href = link.getAttribute("href");
        if (currentURL.includes(href)) {
            item.classList.add("active");
        }
    });
});






