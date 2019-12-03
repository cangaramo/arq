<?php $ajaxurl = home_url() . '/wp-admin/admin-ajax.php'; ?>
<div class="search-box" data-url="<?php echo $ajaxurl ?>">

    <div class="py-4">

        <div class="container">

            <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/arq-logo.svg" class="mx-auto d-block" alt="Logo">

            <input id="query-search" class="mt-4" type="text" name="search" placeholder="Type here...">

            <div class="results-container my-4 d-flex flex-column">
                
            </div>

        </div>

        <div class="close-window w-100">
            <a class="text-center d-block close-search"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/images/close.png">Close window</a>
        </div>

    </div>

</div>