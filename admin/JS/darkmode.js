admin = document.getElementById("admin");

chk.addEventListener('change', () => {
    document.body.classList.toggle('dark');
    admin.classList.toggle('dark');
});