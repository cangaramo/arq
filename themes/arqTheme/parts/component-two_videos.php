<?php 
    //Video 1
    $video1 = $values['video1'];
    $bg_img1 = $video1['background_image'];
    $title1 = $video1['title'];
    $text1 = $video1['text'];
    $text_colour1 = $video1['text_colour'];
    $vimeo_id1 = $video1['vimeo_id'];

    if ($text_colour1 == "#FFFFFF"){
        $class_layer1 = "bg-layer";
    }

    //Video 2
    $video2 = $values['video2'];
    $bg_img2 = $video2['background_image'];
    $title2 = $video2['title'];
    $text2 = $video2['text'];
    $text_colour2 = $video2['text_colour'];
    $vimeo_id2 = $video2['vimeo_id'];

    if ($text_colour2 == "#FFFFFF"){
        $class_layer2 = "bg-layer";
    }
?>
<div>

    <div class="row">
    
        <div class="col-lg-6 px-0">

            <!-- Video 1 -->
            <div class="bg-image video-box" id="video-box-random" style="background-image:url('<?php echo $bg_img1 ?>'); color: <?php echo $text_colour1 ?>">
                <div class="w-100 h-100 <?php echo $class_layer1 ?>">
                    <div class="container h-100">
                        <div class="d-flex h-100 align-items-center">
                            <div class="row">
                                <div class="col-lg-7 offset-lg-2">
                                    <div class="text position-relative px-4 px-lg-0" style="opacity:0; left: -70px">
                                        <img class="d-block mb-5" style="height:85px" src="<?php echo get_bloginfo('template_url')?>/assets/images/play-btn.png">

                                        <?php if ($title1): ?>
                                            <h2 class="pfdin mt-5"><?php echo $title1 ?></h2>
                                        <?php endif ?>

                                        <?php if ($text1):?>
                                            <div class="mb-4"><?php echo $text1 ?></div>
                                        <?php endif ?>

                                        <a class="link" href="#" data-toggle="modal" data-target="#videoModal1-<?php echo $component_index?>">Watch film</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div> <!-- col -->

        <div class="col-lg-6 px-0">

            <!-- Video 2 -->
            <div class="bg-image video-box" id="video-box-random" style="background-image:url('<?php echo $bg_img2 ?>'); color: <?php echo $text_colour2 ?>">
                <div class="w-100 h-100 <?php echo $class_layer2 ?>">
                    <div class="container h-100">
                        <div class="d-flex h-100 align-items-center">
                            <div class="row">
                                <div class="col-lg-7 offset-lg-2">
                                    <div class="text position-relative px-4 px-lg-0" style="opacity:0; left: -70px">
                                        <img class="d-block mb-5" style="height:85px" src="<?php echo get_bloginfo('template_url')?>/assets/images/play-btn.png">

                                        <?php if ($title2): ?>
                                            <h2 class="pfdin mt-5"><?php echo $title2 ?></h2>
                                        <?php endif ?>

                                        <?php if ($text2):?>
                                            <div class="mb-4"><?php echo $text2 ?></div>
                                        <?php endif ?>

                                        <a class="link" href="#" data-toggle="modal" data-target="#videoModal2-<?php echo $component_index?>">Watch film</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- col -->
        
    </div> <!-- row -->

</div>


<!-- Modal 1 -->
<div class="modal fade video-modal" id="videoModal1-<?php echo $component_index?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-block">
                <img class="close-film" data-dismiss="modal" src="<?php echo get_bloginfo('template_url')?>/assets/images/close-white.png">
            </div>
            <div class="modal-body">
                <div class='embed-container'>
                    <iframe src='https://player.vimeo.com/video/<?php echo $vimeo_id1?>' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                </div>
            </div>  
        </div>
    </div>
</div>


<!-- Modal 2 -->
<div class="modal fade video-modal" id="videoModal2-<?php echo $component_index?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-block">
                <img class="close-film" data-dismiss="modal" src="<?php echo get_bloginfo('template_url')?>/assets/images/close-white.png">
            </div>
            <div class="modal-body">
                <div class='embed-container'>
                    <iframe src='https://player.vimeo.com/video/<?php echo $vimeo_id2?>' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                </div>
            </div>  
        </div>
    </div>
</div>