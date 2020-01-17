<?php 
    $text = $values['text'];
    $images = $values['images'];
    $anchor = $values['anchor'];
?>
<div id="<?php echo $anchor ?>" class="bg-whitesmoke">

    <div class="container partnerships py-5">

        <div class="row">
        
            <div class="col-7">

                <div class="row">
                    <?php foreach ($images as $image): ?>
                        <div class="col-6">
                            <div class="add-shadow item bg-white p-3 h-100">
                                <a href="<?php echo $image['link'] ?>" target="_blank" ><img height="60" class="d-block mx-auto mx-lg-4 my-3" src="<?php echo $image['image']?>"></a>
                                <h3 class="mt-5 mb-3"><?php echo $image['title']  ?> </h3>
                                <div class="mb-5"><?php echo $image['text'] ?></div>
                                <div class="absolute-link">
                                    <a class="link" href="<?php echo $image['link']?>">More</a>
                                </div>
                            </div> 
                        </div>
                    <?php endforeach ?>
                </div>

            </div>

            <div class="col-4 offset-1">
                <h3 class="mb-3">Partnerships</h3>
                <div><?php echo $text ?></div>
            </div>
        
        </div>

    </div>

</div>