<?php 
    $images = $values['images'];
    $text = $values['text'];
    $anchor = $values['anchor'];
?>
<div id="<?php echo $anchor ?>" class="container my-5">

    <div class="row">
        <?php foreach ($images as $image): ?>

            <div  class="col-lg-4 px-0">
                <div class="d-none d-lg-block" style="height: 250px; background-image:url('<?php echo $image['image'] ?>')"></div>
                <img class="d-block d-lg-none w-100" src="<?php echo $image['image'] ?>">
            </div>

        <?php endforeach ?>
    </div>

    <div class="row mt-5">
        <div class="col-lg-4 offset-lg-8">
            <?php echo $text ?>
        </div>
    </div>
    
</div>