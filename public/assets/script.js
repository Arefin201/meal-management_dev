// Initialize touch detection
const isTouchDevice = 'ontouchstart' in window || navigator.maxTouchPoints > 0;

document.addEventListener('DOMContentLoaded', function () {
    // Set current month/year
    const currentDateElements = document.querySelectorAll('#monthSelect, #yearSelect');
    if (currentDateElements.length > 0) {
        const currentDate = new Date();
        const monthSelect = document.getElementById('monthSelect');
        const yearSelect = document.getElementById('yearSelect');
        
        if (monthSelect) monthSelect.value = currentDate.getMonth() + 1;
        if (yearSelect) yearSelect.value = currentDate.getFullYear();
    }

    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileNavMenu = document.getElementById('mobileNavMenu');

    if (mobileMenuBtn && mobileNavMenu) {
        mobileMenuBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            mobileNavMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function (e) {
            if (!mobileNavMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                mobileNavMenu.classList.add('hidden');
            }
        });
    }

    // Mobile dropdown toggles
    document.querySelectorAll('.mobile-dropdown-toggle').forEach(toggle => {
        toggle.addEventListener('click', function () {
            const targetId = this.getAttribute('data-target');
            const targetElement = document.getElementById(targetId);
            targetElement.classList.toggle('hidden');
            this.querySelector('i:last-child').classList.toggle('fa-chevron-down');
            this.querySelector('i:last-child').classList.toggle('fa-chevron-up');
        });
    });

    // Desktop dropdown functionality - IMPROVED CODE
    const desktopDropdowns = document.querySelectorAll('.desktop-dropdown');
    
    desktopDropdowns.forEach(dropdown => {
        const dropdownButton = dropdown.querySelector('button');
        const dropdownMenu = dropdown.querySelector('.desktop-dropdown-menu');
        
        if (dropdownButton && dropdownMenu) {
            // Handle click for all devices (both touch and non-touch)
            dropdownButton.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Close all other dropdowns first
                desktopDropdowns.forEach(otherDropdown => {
                    if (otherDropdown !== dropdown) {
                        const otherMenu = otherDropdown.querySelector('.desktop-dropdown-menu');
                        if (otherMenu) otherMenu.classList.remove('show');
                    }
                });
                
                // Toggle current dropdown
                dropdownMenu.classList.toggle('show');
            });
            
            // Additional hover behavior for non-touch devices
            if (!isTouchDevice) {
                dropdown.addEventListener('mouseenter', function() {
                    dropdownMenu.classList.add('show');
                });
                
                dropdown.addEventListener('mouseleave', function() {
                    dropdownMenu.classList.remove('show');
                });
            }
        }
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        desktopDropdowns.forEach(dropdown => {
            const dropdownMenu = dropdown.querySelector('.desktop-dropdown-menu');
            if (dropdownMenu && !dropdown.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });

    // Tab functionality
    document.querySelectorAll('.tab-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const tabId = this.getAttribute('data-tab');

            // Remove active classes
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active', 'border-indigo-500');
                btn.classList.add('border-transparent');
            });

            // Activate clicked tab
            this.classList.add('active', 'border-indigo-500');
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            
            const tabContent = document.getElementById(tabId);
            if (tabContent) tabContent.classList.add('active');

            // Close mobile menu
            if (mobileNavMenu) mobileNavMenu.classList.add('hidden');
        });
    });

    // Initialize charts if function exists
    if (typeof initializeCharts === 'function') {
        initializeCharts();
    }
});