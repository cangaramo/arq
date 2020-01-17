<?php 
    $text = $values['short_text'];
    $position  = $values['position'];
    $width = $values['width'];
    $anchor = $values['anchor'];
    $bg_colour = $values['bg_colour'];

    if ($position == "Right") {
        $align = "justify-content-end";
    }
    else if ($position == "Left"){
        $align = "justify-content-start";
    }
    else {
        $align = "justify-content-center";
    }


    if($width == "Short"){
        $class = "w-lg-50";
    }
    else if ($width == "Medium"){
        $class = "w-lg-75";
    }

    if (!$bg_colour) {
        $bg_colour = "#FFFFFF";
    }
?>

<div style="background:<?php echo $bg_colour ?>">
    <div id="<?php echo $anchor ?>" class="container py-5">
        <div class="d-flex <?php echo $align ?> w-100 short-text">
            <div class="<?php echo $class ?>">
                <?php echo $text ?>
            </div>
        </div>
    </div>
</div>