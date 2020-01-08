<?php 
    $bg_colour = $values['bg_colour'];
    $button_colour = $values['button_colour'];
    $event = $values['event'];
    $event_title = get_the_title($event);
    $event_fields = get_fields($event);
    $file = $event_fields['file'];
    $link = $event_fields['link'];

    if ($link) {
        $event_permalink = $link;
    }
    else if ($file) {
        $event_permalink = $file;
    }
    else {
        $event_permalink = get_the_permalink($event);
    }
    
    if ($button_colour == "White") {
        $class_btn = "link-white";
    }
    else {
        $class_btn = "link";
    }
?>

<div class="position-relative color-white" style="background:<?php echo $bg_colour ?>">

    <div class="container position-relative" style="z-index: 2">
        <div class="row">
            <div class="col-md-5 py-5 py-lg-0">
                <div class="more-padding-top">
                    <h2><?php echo $event_title ?></h2>
                    <div class="my-4"><?php echo $event_fields['description'] ?></div>
                    <a class="<?php echo $class_btn ?>" href="<?php echo $event_permalink ?>" target="_blank">More</a>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 h-100 absolute-top d-none d-md-block">
        <div class="row h-100">
            <div class="col-md-6 offset-md-6 h-100">
                <div class="w-100 h-100 bg-image" style="background-image:url('<?php echo $event_fields['image'] ?>')"></div>
            </div>
        </div>
    </div>

    <img class="w-100 d-block d-md-none" src="<?php echo $event_fields['image'] ?>">

</div>
