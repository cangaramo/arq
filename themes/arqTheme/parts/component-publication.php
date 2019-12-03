<?php 
    $publication = $values['publication'];
    $title = get_the_title($publication);
    $image = get_field('image', $publication);
    $description = get_field('description', $publication);

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
?>

<div class="position-relative" 
    style="background:<?php echo $bg_colour ?>; color: <?php echo $text_colour ?>">

    <!-- Animation -->
    <?php if ($background == "Animation") : ?>

        <div class="absolute-top w-100 h-100">
            <div id="trigger-shapeA"></div>
            <img class="shapeA" src="<?php echo get_bloginfo('template_url')?>/assets/images/shape_1.png">
        </div>

    <?php endif ?>

    <!-- Publication -->
    <div class="container py-5">

        <div class="row py-5">

            <div class="col-6">
                <img class="w-100" src="<?php echo $image?>">
            </div>

            <div class="col-6">
                <div class="d-flex h-100 align-items-center">
                    <div>
                        <h3 class=""><?php echo $title ?></h3>
                        <div class="my-4"><?php echo $description ?></div>
                        <a class="download" href="#" style="color: <?php echo $text_colour ?>">
                            <img class="mr-3 align-icon" src="<?php echo get_bloginfo('template_url')?>/assets/images/download.png">
                            Download the White paper
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>