<?php 
    $text = $values['short_text'];
    $position  = $values['position'];

    if ($position == "Right") {
        $align = "justify-content-end";
    }
    else if ($position == "Left"){
        $align = "justify-content-start";
    }
    else {
        $align = "justify-content-center";
    }
?>

<div class="container my-5">
    <div class="d-flex <?php echo $align ?> w-100 short-text">
        <div class="w-lg-50">
            <?php echo $text ?>
        </div>
    </div>
</div>