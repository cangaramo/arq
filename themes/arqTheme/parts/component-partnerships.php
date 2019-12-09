<?php 
    $images = $values['images'];
?>
<div class="bg-whitesmoke">

    <div class="container py-5">
        <h3 class="text-center my-4">Partnerships</h3>

        <div class="d-flex flex-column flex-lg-row justify-content-center my-5">

            <?php foreach ($images as $image): ?>

                <a href="<?php echo $image['link'] ?>"><img height="60" class="d-block mx-auto mx-lg-4 my-3" src="<?php echo $image['image']?>"></a> 
            
            <?php endforeach ?>

        </div>

    </div>

</div>