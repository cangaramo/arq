<?php 
    $bg_img = $values['background_image'];
    $title = $values['title'];
    $text = $values['text'];
    $text_colour = $values['text_colour'];

    if ($text_colour == "White"){
        $class_layer = "bg-layer";
    }
?>

<div class="bg-image" style="height: 100vh;background-image:url('<?php echo $bg_img ?>'); color: <?php echo $text_colour ?>">
    <div class="w-100 h-100 <?php echo $class_layer ?>">
        <div class="container h-100">
            <div class="d-flex h-100 align-items-center">
                <div class="row">
                    <div class="col-6">
                        <img style="height:85px" src="<?php echo get_bloginfo('template_url')?>/assets/images/play-btn.png">
                        <h2 class="pfdin mt-5"><?php echo $title ?></h2>
                        <div class="mb-4"><?php echo $text ?></div>
                        <a class="link" href="#">Watch film</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>