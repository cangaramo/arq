<?php 
    $images = $values['images'];
    $text = $values['text'];
?>
<div class="container my-5">

    <div class="row">
        <?php foreach ($images as $image): ?>

            <div  class="col-4 px-0">
                <div style="height: 250px; background-image:url('<?php echo $image['image'] ?>')"></div>
            </div>

        <?php endforeach ?>
    </div>

    <div class="row mt-5">
        <div class="col-4 offset-8">
            <?php echo $text ?>
        </div>
    </div>
    
</div>