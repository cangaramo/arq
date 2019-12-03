<?php 
    $bg_colour = $values['bg_colour'];
    $event = $values['event'];
    $event_title = get_the_title($event);
    $event_fields = get_fields($event);
    $event_permalink = get_the_permalink($event);
?>

<div class="position-relative color-white" style="background:<?php echo $bg_colour ?>">

    <div class="container position-relative" style="z-index: 2">
        <div class="row">
            <div class="col-5">
                <div class="more-padding-top">
                    <h2><?php echo $event_title ?></h2>
                    <div class="my-4"><?php echo $event_fields['description'] ?></div>
                    <a class="link-white" href="<?php echo $event_permalink ?>">More</a>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 h-100 absolute-top">
        <div class="row h-100">
            <div class="col-6 offset-6 h-100">
                <div class="w-100 h-100 bg-image" style="background-image:url('<?php echo $event_fields['image'] ?>')"></div>
            </div>
        </div>
    </div>

</div>
