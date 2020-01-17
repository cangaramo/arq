<?php 
    $publication = $values['publication'];
    $title = get_the_title($publication);
    $image = get_field('image', $publication);
    $description = get_field('description', $publication);
    $file = get_field('file', $publication);

    $background = $values['background'];

    if ($background == "Background colour") {

        $bg_colour = $values['background_colour'];
        $text_colour = $values['text_colour'];

        if ($text_colour == "White") {
            $text_colour = "#FFFFFF";
        }
        else {
            $text_colour = "#212529";
        }
    }

    $anchor = $values['anchor'];
?>

<div id="<?php echo $anchor ?>" class="position-relative" 
    style="background:<?php echo $bg_colour ?>; color: <?php echo $text_colour ?>">

    <!-- Animation -->
    <?php if ($background == "Animation") : ?>

        <div class="absolute-top w-100 h-100 overflow-hidden">
            <div id="trigger-shapeA"></div>
            <img class="shapeA" src="<?php echo get_bloginfo('template_url')?>/assets/images/shape_1.png">
        </div>

    <?php endif ?>

    <!-- Publication -->
    <div class="container pt-3 pb-5 py-lg-5 publication">

        <div class="row py-lg-5">

            <div class="col-lg-6 mb-4">
                <div id="trigger-move-img"></div>
                <img id="move-img" class="w-100 move-img" src="<?php echo $image?>">
            </div>

            <div class="col-lg-6">
                <div class="d-flex h-100 align-items-center">
                    <div>
                        <h3 class=""><?php echo $title ?></h3>
                        <div class="my-4"><?php echo $description ?></div>
                        <a class="download" target="_blank" href="<?php echo $file ?>" style="color: <?php echo $text_colour ?>">
                            <img class="mr-3 align-icon" src="<?php echo get_bloginfo('template_url')?>/assets/images/download.png">
                            Download the White paper
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>