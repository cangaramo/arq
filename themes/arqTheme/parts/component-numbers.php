<?php 
    $bg_image = $values['background_image'];
    $numbers = $values['numbers'];
?>

<div id="numbers-trigger"></div>
<div class="bg-image" style="background-image:url(<?php echo $bg_image ?>)">

    <div class="bg-layer">
        <div class="container more-padding-top" >
            <div class="row py-5 mt-5 mb-4 px-3 px-lg-0 numbers position-relative">

                <?php foreach ($numbers as $number): ?>

                    <div class="col-sm num my-3">
                        <div class="w-100">
                            <span><?php echo $number['symbol'] ?></span><span class="counter"><?php echo $number['number'] ?></span><span><?php echo $number['value'] ?></span>
                            <p class="label"><?php echo $number['label'] ?></p>
                        </div>
                    </div>

                <?php endforeach ?>

            </div>
        </div>
    </div>

</div>