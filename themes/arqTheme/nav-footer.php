<?php 
    $footer = get_field('footer', 'option'); 
    $addresses = $footer['addresses'];
?>

<footer >

    <div class="bg-ligth_gray">
        <div class="container py-5">
            <div class="d-md-flex align-items-center justify-content-center">
                <p class="signup">Sign up for updates</p>
                <div class="ml-md-4"><?php echo gravity_form( 2, false, false, false, '', true ); ?></div>
            </div>
        </div>
    </div>

    <div class="bg-black">
        <div class="container pt-5">
            <div class="row">
                <?php foreach ($addresses as $address): ?>
                    <div class="col-sm py-4">
                        <div class="address px-3">
                            <?php echo $address['address']?>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <p class="text-center py-5">© 2019 Arq | Privacy Policy </p>
        </div>
    </div>

</footer>