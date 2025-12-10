// Admin Panel JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Handle logout link
    const logoutLinks = document.querySelectorAll('.logout-link');
    logoutLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('logout-form').submit();
        });
    });

    // Auto-collapse sidebar on mobile
    const sidebarCollapseLinks = document.querySelectorAll('.sidebar-link[data-bs-toggle="collapse"]');
    sidebarCollapseLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth < 992) {
                const collapseElement = document.querySelector(this.getAttribute('href'));
                const bsCollapse = new bootstrap.Collapse(collapseElement);
                bsCollapse.toggle();
            }
        });
    });

    // Update sidebar icons on collapse
    document.querySelectorAll('.collapse').forEach(collapse => {
        collapse.addEventListener('show.bs.collapse', function() {
            const trigger = document.querySelector('[href="#' + this.id + '"]');
            if (trigger) {
                const icon = trigger.querySelector('.fa-chevron-down');
                if (icon) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                }
            }
        });

        collapse.addEventListener('hide.bs.collapse', function() {
            const trigger = document.querySelector('[href="#' + this.id + '"]');
            if (trigger) {
                const icon = trigger.querySelector('.fa-chevron-up');
                if (icon) {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                }
            }
        });
    });

    // Auto-show active collapse
    const activeCollapse = document.querySelector('.collapse.show');
    if (activeCollapse) {
        const trigger = document.querySelector('[href="#' + activeCollapse.id + '"]');
        if (trigger) {
            const icon = trigger.querySelector('.fa-chevron-down');
            if (icon) {
                icon.classList.remove('fa-chevron-down');
                icon.classList.add('fa-chevron-up');
            }
        }
    }

    // Add active class to parent collapse if child is active
    document.querySelectorAll('.sidebar-link.active').forEach(link => {
        const parentCollapse = link.closest('.collapse');
        if (parentCollapse) {
            parentCollapse.classList.add('show');
            const trigger = document.querySelector('[href="#' + parentCollapse.id + '"]');
            if (trigger) {
                const icon = trigger.querySelector('.fa-chevron-down');
                if (icon) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                }
            }
        }
    });

    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// Logout confirmation
function confirmLogout() {
    return confirm('Are you sure you want to logout?');
}

// Initialize on page load
window.onload = function() {
    // Add loading animation removal
    document.body.classList.add('loaded');
};
