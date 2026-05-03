const toggleBtn = document.getElementById('toggleBtn');
const sidebar = document.getElementById('sidebar');
const content = document.getElementById('content');
const topbar = document.querySelector('.topbar');

// OPEN 
toggleBtn.addEventListener('click', function (e) {
    e.stopPropagation(); 
    sidebar.classList.toggle('active');
    content.classList.toggle('shift');
    topbar.classList.toggle('shift');
});

// CLOSE 
document.addEventListener('click', function (e) {
    if (
        sidebar.classList.contains('active') &&
        !sidebar.contains(e.target) &&
        !toggleBtn.contains(e.target)
    ) {
        sidebar.classList.remove('active');
        content.classList.remove('shift');
        topbar.classList.remove('shift');
    }
});