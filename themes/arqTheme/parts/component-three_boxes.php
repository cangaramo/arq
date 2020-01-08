<?php 
    $boxes = $values['boxes'];
?>
<div class="container my-lg-5 py-5">

    <div class="row boxes">
        
        <?php foreach ($boxes as $index=>$box): 
            $title = $box['title'];
            $permalink = $box['link'];
            $text = $box['text'];
            $link = $box['link'];
            $link_label = $box['link_label'];
        ?>
            <div class="col-lg-4 my-3">
                <div class="box">

                    <!--
                    <div class="overflow-hidden" onClick="redirectTo('<?php echo $permalink ?>')"><div class="bg-image thumbnail" style="background-image:url('<?php echo $box['image']?>')"></div></div>
                    -->

                    <div><div class="bg-image" style="height: 150px; background-image:url('<?php echo $box['image']?>')"></div></div>

                    <div class="px-3 py-2">
                        <?php if ($title): ?>
                            <h3 class="my-3"><?php echo $title ?></h3>
                        <?php endif ?>
                        <p><?php echo $text ?></p>

                        <div class="absolute-link">
                            <a class="link" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $index ?>">More</a>
                        </div>
                

                    </div>
                </div>
            </div>


            <!-- Modal -->
            <?php if ($box['type'] == "Copy"): ?>

                <div class="modal fade modalCopy" id="modal<?php echo $index ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <div class="modal-header d-block">
                                <div class="row">
                                    <div class="col-9 px-4">
                                        <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $title ?></h5>
                                    </div>
                                    <div class="col-3 px-4">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-lg-6 px-4">
                                        <div><?php echo $box['column1']?></div>
                                    </div>
                                    <div class="col-lg-6 px-4">
                                        <div><?php echo $box['column2']?></div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            
            <?php else: ?>

                <div class="modal fade video-modal" id="modal<?php echo $index?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header d-block">
                                <img class="close-film" data-dismiss="modal" src="<?php echo get_bloginfo('template_url')?>/assets/images/close-white.png">
                            </div>
                            <div class="modal-body">
                                <div class='embed-container'>
                                    <iframe src='https://player.vimeo.com/video/<?php echo $box['vimeo_id']?>' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
              
            <?php endif ?>

        <?php endforeach ?>

    </div>
</div>

