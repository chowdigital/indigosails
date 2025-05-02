<?php
/**
 * Template Name: Yacht Results Page
 * @package Cloudsdale_Theme
 */
get_header(); // Adds the header
?>

<section class="container-wide">
    <style>
    .ns-parent {
        margin-bottom: 0px;
        height: auto;
        padding: 20px 0px;
    }
    </style>

    <div class="ns-parent">
        <div class="small-screen" id="nsWidget"
            style="margin: 0 auto; ; width: 100%; height: 2000px; position: relative;"></div>

        <script type="text/javascript" src="https://widgets.nausys.com/js/widgets/nausys_widget_1.2.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/iframeResizer.min.js"></script>
        <script type="text/javascript">
        // Initialize the NauSYS widget
        var opts = {
            companyId: '29113128',
            type: 'searchResults',
            language: 'en',
            method: 'GET'
        };
        new NsWidget("nsWidget", opts);

        // Wait for the iframe to load and initialize iframeResizer
        document.addEventListener('DOMContentLoaded', function() {
            var iframeCheckInterval = setInterval(function() {
                var iframe = document.querySelector('#nsWidget iframe');
                if (iframe) {
                    clearInterval(iframeCheckInterval);
                    iFrameResize({
                        log: false, // Set to true for debugging
                        checkOrigin: false, // Disable origin check if the iframe is on a different domain
                        heightCalculationMethod: 'bodyScroll' // Use body scroll height for resizing
                    }, iframe);
                }
            }, 100); // Check every 100ms
        });
        </script>
    </div>
</section>

<?php get_footer(); ?>