<?php 
    $title = $values['title'];
    $image = $values['image'];
    $mobile_image = $values['mobile_bg'];

    $background_colour = $values['background_colour'];

    $background = $values['background'];

    if ($background == "Solid colour"){
        $bg = $background_colour;
    }
    else {
        $bg = "url('" . $image . "')";

        if ($mobile_image) {
            $bg_mobile =  "url('" . $mobile_image . "')";
        }
        else {
            $bg_mobile =  $bg;
        }
       
    }

    $anchor = $values['anchor'];
?>

<div id="<?php echo $anchor ?>"></div>

<!-- Desktop -->
<div   class="d-none d-md-block">
    <?php if ($background == "Solid colour"): ?>
        <div class="banner position-relative" style="background:<?php echo $bg ?>">
    <?php else: ?>
        <div class="bg-image banner position-relative d-md d-lg-block" style="background-image:<?php echo $bg ?>">
    <?php endif ?>

            <div class="layer h-100 w-100">
                <div class="container h-100">
                    <div class="d-flex h-100 align-items-center">
                        <h1 class="position-relative"><?php echo $title ?></h1>
                    </div>
                </div>
            </div>

        </div> 
</div>

<!-- Mobile -->
<div class="d-block d-md-none">

    <?php if ($background == "Solid colour"): ?>
        <div class="banner position-relative" style="background:<?php echo $bg ?>">
    <?php else: ?>
        <div class="bg-image banner position-relative d-block d-md-none" style="background-image:<?php echo $bg_mobile ?>">
    <?php endif ?>

            <div class="layer h-100 w-100">
                <div class="container h-100">
                    <div class="d-flex h-100 align-items-center">
                        <h1 class="position-relative"><?php echo $title ?></h1>
                    </div>
                </div>
            </div>

        </div> 
</div> 