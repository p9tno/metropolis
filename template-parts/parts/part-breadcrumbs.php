<?php if (
    !is_page_template(['template-homepage.php'])
    ) { ?>
    <!-- begin breadcrumbs-->
    <div class="breadcrumbs section">
        <div class="container_center">
            <?php kama_breadcrumbs('&nbsp;|'); ?>
        </div>
    </div>
    <!-- end breadcrumbs -->
<?php } ?>
