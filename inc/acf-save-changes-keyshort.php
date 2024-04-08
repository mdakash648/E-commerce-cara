<?php add_action( 'admin_head', function() {?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.addEventListener('keydown', function (e) {
                // Check if the Ctrl key and the 'S' key are pressed together
                if (e.ctrlKey && e.key === 's') {
                    // Prevent the default action to avoid opening the browser's save dialog
                    e.preventDefault();
                    // Trigger click event on elements with the class 'acf-btn'
                    document.querySelectorAll('.acf-publish').forEach(function (btn1) {
                        btn1.click();
                    });
                    document.querySelectorAll('#publish').forEach(function (btn2) {
                        btn2.click();
                    });
                    document.querySelectorAll('#save_menu_footer').forEach(function (btn3) {
                        btn3.click();
                    });
                    document.querySelectorAll('.save').forEach(function (btn4) {
                        btn4.click();
                    });
                }
            });
        });
    </script>
<?php });?>
