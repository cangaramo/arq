<?php 
    $footer = get_field('footer', 'option'); 
    $addresses = $footer['addresses'];
?>

<footer >

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