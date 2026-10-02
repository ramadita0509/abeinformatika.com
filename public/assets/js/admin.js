document.getElementById('sidebarToggle')?.addEventListener('click', function () {
    document.body.classList.toggle('sidebar-open');
});

document.getElementById('sidebarBackdrop')?.addEventListener('click', function () {
    document.body.classList.remove('sidebar-open');
});
