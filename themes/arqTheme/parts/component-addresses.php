<?php 
    $footer = get_field('footer', 'option'); 
    $addresses = $footer['addresses'];
?>


<div class="bg-ligth_gray d-block d-lg-none">
    <div class="container contact-form py-5">
        <?php echo gravity_form( 1, false, false, false, '', true ); ?>
    </div>
</div>


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

<div class="bg-ligth_gray d-none d-lg-block">
    <div class="container contact-form py-5">
        <?php echo gravity_form( 1, false, false, false, '', true ); ?>
    </div>
</div>
