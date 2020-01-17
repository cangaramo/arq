<?php 
    $locations = $values['locations'];
    $text = $values['text'];
    $anchor = $values['anchor'];
?>

<div id="<?php echo $anchor ?>" class="bg-ligth_gray py-2">
    <div class="container locations py-5">

        <div class="d-flex justify-content-center w-100">
            <div class="w-lg-40 text-center">
                <div><?php echo $text ?></div>
            </div>
        </div>

        <div class="d-flex justify-content-center w-100 mt-4">
            <div class="w-lg-50 text-center">
                <div class="row">
                    <?php foreach ($locations as $location): ?>
                        <div class="col-lg-6 mt-4">
                            <img class="mb-2" height="28" src="<?php echo get_bloginfo('template_url')?>/assets/images/marker.png">
                            <p><strong><?php echo $location['title']?></strong></p>
                            <p><a href="tel:<?php echo $location['telephone']?>"><?php echo $location['telephone']?></a></p>
                            <p><a href="mailto:<?php echo $location['email']?>"><?php echo $location['email']?></a></p>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>

    </div>
</div>