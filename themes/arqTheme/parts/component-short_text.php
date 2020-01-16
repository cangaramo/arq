<?php 
    $text = $values['short_text'];
    $position  = $values['position'];
    $width = $values['width'];

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
?>

<div class="container my-5">
    <div class="d-flex <?php echo $align ?> w-100 short-text">
        <div class="<?php echo $class ?>">
            <?php echo $text ?>
        </div>
    </div>
</div>