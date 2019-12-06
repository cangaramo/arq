<?php 
    $bg_img = $values['background_image'];
    $title = $values['title'];
    $text = $values['text'];
    $text_colour = $values['text_colour'];
    $vimeo_id = $values['vimeo_id'];

    if ($text_colour == "#FFFFFF"){
        $class_layer = "bg-layer";
    }
?>

<div class="bg-image video-box" id="video-box<?php echo $component_index?>" style="background-image:url('<?php echo $bg_img ?>'); color: <?php echo $text_colour ?>">
    <div class="w-100 h-100 <?php echo $class_layer ?>">
        <div class="container h-100">
            <div class="d-flex h-100 align-items-center">
                <div class="row">
                    <div class="col-lg-6 px-4 px-lg-3">
                        <div class="text position-relative" style="opacity:0; left: -70px">
                            <img style="height:85px" src="<?php echo get_bloginfo('template_url')?>/assets/images/play-btn.png">
                            <h2 class="pfdin mt-5"><?php echo $title ?></h2>
                            <div class="mb-4"><?php echo $text ?></div>
                            <a class="link" href="#" data-toggle="modal" data-target="#videoModal<?php echo $component_index?>">Watch film</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade video-modal" id="videoModal<?php echo $component_index?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-block">
                <img class="close-film" data-dismiss="modal" src="<?php echo get_bloginfo('template_url')?>/assets/images/close-white.png">
            </div>
            <div class="modal-body">
                <div class='embed-container'>
                    <iframe src='https://player.vimeo.com/video/<?php echo $vimeo_id?>' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                </div>
            </div>  
        </div>
    </div>
</div>