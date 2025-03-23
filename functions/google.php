<?php

function add_google_tag() {
    ?>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-N0X8WW10V4"></script>
<script>
window.dataLayer = window.dataLayer || [];

function gtag() {
    dataLayer.push(arguments);
}
gtag('js', new Date());

gtag('config', 'G-N0X8WW10V4');
</script>
<?php
}
add_action('wp_head', 'add_google_tag');