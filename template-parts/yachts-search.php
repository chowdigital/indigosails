<section class="container-wide">
    <div class="book-image"
        style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>'); background-size: cover; background-position: center; background-repeat: no-repeat; min-height:500px;">

        <style>
        .ns-parent {
            margin-bottom: 0px;
            height: auto;
            padding: 20px 0px;

            padding: 20px;
        }

        .no-js {
            background-color: rgba(252, 252, 252, 0.39);
        }

        @media (min-width: 472px) {
            .ns-parent {
                margin-bottom: -200px;
            }
        }




        @media (min-width: 800px) {
            .ns-parent {
                margin-bottom: -260px;
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
                results: 'http://localhost/indigo/results/'
            };
            new NsWidget("nsWidget", opts);
            </script>

        </div>
        </script>
    </div>
</section>