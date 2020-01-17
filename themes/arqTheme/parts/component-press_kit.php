<?php 
    $logo = $values['logo'];
    $img_guidelines = $values['guidelines_image'];
    $brand_guidelines = $values['brand_guidelines'];
    $images = $values['images'];
    $anchor = $values['anchor'];
?>
<div id="<?php echo $anchor ?>" class="bg-dark_gray press-kit">

    <div class="container py-5">

        <h2 class="my-5">Press Kit</h2>

        <div class="row">

            <div class="col-lg-6">
                <hr>
                <div class="d-flex flex-column flex-lg-row justify-content-between">
                    <div class="mb-3">
                        <p>Logo</p>
                        <a href="<?php echo $logo ?>" download ><img class="mt-1" height="18" src="<?php echo get_bloginfo('template_url')?>/assets/images/download-btn.png"></a>
                    </div>
                    <div><a href="<?php echo $logo ?>" download ><img height="90" src="<?php echo $logo ?>"></a></div>
                </div>
            </div>

            <div class="col-lg-6">
                <hr>
                <div class="d-flex flex-column flex-lg-row justify-content-between">
                    <div class="mb-3">
                        <p>Brand Guidelines</p>
                        <a href="<?php echo $brand_guidelines ?>" download><img class="mt-1" height="18" src="<?php echo get_bloginfo('template_url')?>/assets/images/download-btn.png"></a>
                    </div>
                    <div><a href="<?php echo $brand_guidelines ?>" download><img height="180" src="<?php echo $img_guidelines ?>"></a></div>
                </div>
            </div>

        </div>

        <hr>
        <div class="row">
            <div class="col-lg-2">
                <p>Images</p>

            </div>
            <div class="col-lg-10">
                <div class="row">
                <?php foreach ($images as $image): ?>
                    <div class="col-lg-4 px-2 py-3">
                        <a href="<?php echo $image['image'] ?>" download><img class="w-100" src="<?php echo $image['image'] ?>"></a>
                        <a href="<?php echo $image['image'] ?>" download><img class="mt-3" height="18" src="<?php echo get_bloginfo('template_url')?>/assets/images/download-btn.svg"></a>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>