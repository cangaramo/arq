<?php 
    $title = $values['title'];
    $image = $values['image'];
    $background_colour = $values['background_colour'];

    $background = $values['background'];

    if ($background == "Solid colour"){
        $bg = $background_colour;
    }
    else {
        $bg = "url('" . $image . "')";
    }
?>


<?php if ($background == "Solid colour"): ?>
    <div class="banner position-relative" style="background:<?php echo $bg ?>">
<?php else: ?>
    <div class="bg-image banner position-relative" style="background-image:<?php echo $bg ?>">
<?php endif ?>

        <div class="layer h-100 w-100">
            <div class="container h-100">
                <div class="d-flex h-100 align-items-center">
                    <h1 class="position-relative"><?php echo $title ?></h1>
                </div>
            </div>
        </div>

</div> 