<?php 
    $box = $values['box'];
    $box2 = $values['box_2'];
?>

<div class="position-relative">

    <!-- Animation arcs -->
    <div class="arcs d-none d-lg-block">
        <div id="trigger-arcs"></div>
        <img class="arc_1" src="<?php echo get_bloginfo('template_url')?>/assets/images/arc_1.png">
        <img class="arc_2" src="<?php echo get_bloginfo('template_url')?>/assets/images/arc_2.png">
    </div>


    <!-- Boxes -->
    <div class="container py-5">

        <div class="px-lg-5 more-padding-top">

            <div class="row long-boxes">

                <div class="col-lg-5 offset-lg-1 my-3">
                    <div class="box">
                        <div class="bg-image thumbnail" style="background-image:url('<?php echo $box['image']?>')"></div>
                        <div class="px-4 py-2">
                            <h3 class="my-3"><?php echo $box['title'] ?></h3>
                            <p><?php echo $box['text']?></p>
                            <div class="absolute-link">
                                <a class="link" href="<?php echo $box['link'] ?>"><?php echo $box['label_link']?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 offset-lg-1 my-3">
                    <div class="box">
                        <div class="bg-image thumbnail" style="background-image:url('<?php echo $box2['image']?>')"></div>
                        <div class="px-4 py-2">
                            <h3 class="my-3"><?php echo $box2['title'] ?></h3>
                            <p><?php echo $box2['text']?></p>
                            <div class="absolute-link">
                                <a class="link" href="<?php echo $box['link'] ?>"><?php echo $box['label_link']?></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    
    </div>

</div>