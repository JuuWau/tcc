(function($) {
    'use strict';

    function toggleSidebar() {
        $('.sidebar, #main-content').toggleClass('collapsed');
        if ($('.sidebar').hasClass('collapsed')) {
            $('.sidebar-dropdown').removeClass('open');
            $('.sidebar-submenu').slideUp(200).addClass('hidden');
        }
        saveSidebarState();
    }

    function toggleMobileSidebar() {
        $('.sidebar').toggleClass('show');
    }

    function closeMobileSidebar() {
        if ($(window).width() < 992) {
            $('.sidebar').removeClass('show');
        }
    }

    function saveSidebarState() {
        const isCollapsed = $('.sidebar').hasClass('collapsed');
        localStorage.setItem('sidebarCollapsed', isCollapsed);
    }

    function loadSidebarState() {
        const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
        if (isCollapsed) {
            $('.sidebar, #main-content').addClass('collapsed');
        }
    }

    function handleResponsive() {
        if ($(window).width() < 992) {
            $('.sidebar').removeClass('collapsed').addClass('mobile-sidebar');
            $('#main-content').removeClass('collapsed');
        } else {
            $('.sidebar').removeClass('mobile-sidebar show');
            loadSidebarState();
        }
    }

    function handleDropdowns() {
        $('.sidebar-dropdown > .dropdown-tog').on('click', function(e) {
            e.preventDefault();

            const $dropdown = $(this).closest('.sidebar-dropdown');
            const $submenu = $dropdown.find('.sidebar-submenu');

            $('.sidebar-dropdown').not($dropdown).removeClass('open')
                .find('.sidebar-submenu').slideUp(200).addClass('hidden');

            $submenu.stop(true, true).slideToggle(200, function() {
                $(this).toggleClass('hidden');
            });

            $dropdown.toggleClass('open');
        });
    }

    $(document).ready(function() {
        $('#sidebarToggle').click(toggleSidebar);
        $('#mobileSidebarToggle').click(toggleMobileSidebar);
        $('#main-content').click(closeMobileSidebar);

        loadSidebarState();
        handleResponsive();
        handleDropdowns();

        $(window).resize(handleResponsive);
    });

})(jQuery);