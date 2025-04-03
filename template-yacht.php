<?php
/**
 * Template Name: Yacht Page Template
 * @package Cloudsdale_Theme
 */
get_header(); // Adds the header
?>
<style>
/* Default: Mobile (xs) */
.ns-parent {
    margin-bottom: 0;
    padding: 20px 0px;
}

/* Small tablets (≥480px) */
@media (min-width: 361px) {
    .ns-parent {
        margin-bottom: -160px;
    }
}

/* Tablets (≥768px) */
@media (min-width: 608px) {
    .ns-parent {
        margin-bottom: -260px;
    }
}

@media (min-width: 641px) {
    .ns-parent {
        margin-bottom: -260px;
    }
}


/* Desktops (≥1024px) */
@media (min-width: 863px) {
    .ns-parent {
        margin-bottom: -310px;
    }
}
</style>
<div class="ns-parent">

    <div class="small-screen" id="nsWidget"
        style="margin: 0 auto; max-width: 1000px; width: 100%; height: 500px; position: relative;"></div>

    <script src="https://widgets.nausys.com/js/widgets/nausys_widget_1.2.js"></script>
    <script>
    var opts = {
        companyId: '29113128',
        type: 'searchForm',
        language: 'en',
        method: 'GET',
        results: 'https://www.indigosails.co.uk/yacht-charter-results/'
    };
    new NsWidget("nsWidget", opts);
    </script>

</div>


</main>

<?php get_footer(); ?>