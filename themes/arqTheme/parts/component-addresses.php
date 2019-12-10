<?php 
    $footer = get_field('footer', 'option'); 
    $addresses = $footer['addresses'];
?>


<div class="container py-5 addresses">
    <div class="row">
        <?php foreach ($addresses as $address): ?>
            <div class="col-sm py-4">
                <div class="address px-3">
                    <?php echo $address['address']?>
                </div>
            </div>
         <?php endforeach ?>
    </div>
</div>