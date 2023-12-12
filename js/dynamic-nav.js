document.addEventListener('DOMContentLoaded', function() {
    const path = window.location.pathname;

    if (path === '/NATRSJB/') {
        const homeLink = document.getElementById('home-link');
        homeLink.classList.add('current');
    }
    if (path === '/NATRSJB/post-job') {
        const postLink = document.getElementById('post-link');
        postLink.classList.add('current');
    }
    if (path === '/NATRSJB/announcements') {
        const announcementLink = document.getElementById('announcements-link');
        announcementLink.classList.add('current');
    }
    if (path === '/NATRSJB/add_jobs') {
        const announcementLink = document.getElementById('newJob-link');
        announcementLink.classList.add('current');
    }
    if (path === '/NATRSJB/newAnnouncement') {
        const announcementLink = document.getElementById('newAnnouncement-link');
        announcementLink.classList.add('current');
    }
});