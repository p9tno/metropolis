<?php if (
    !is_page_template(['template-homepage.php']) &&
    !is_404()
    ) { ?>
    <!-- begin breadcrumbs-->
    <div class="breadcrumbs section">
        <div class="container_center fade fade_top_js">
            <?php kama_breadcrumbs('&nbsp;|'); ?>
        </div>
    </div>
    <!-- end breadcrumbs -->
<?php } ?>
