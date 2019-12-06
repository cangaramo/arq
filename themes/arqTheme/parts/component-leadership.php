<?php 
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'people' 
    );

    $people = get_posts($args);
?>

<div class="container leadership py-5">

    <h2>Leadership</h2>

    <div class="multiple-items py-5">

        <?php foreach ($people as $person): 
            $person_id = $person->ID;
            $title = get_the_title($person_id);
            $role = get_field('role', $person_id);
            $short_bio = get_field('short_bio', $person_id);
            $image = get_field('image', $person_id);
        ?>

            <div class="person">
                <div class="img-person bg-image" style="background-image:url('<?php echo $image ?>')"></div>
                <h4 class="mt-3 mb-1"><?php echo $title ?></h4>
                <p><strong><?php echo $role ?></strong></p>
                <p><?php echo $short_bio ?></p>
            </div>

        <?php endforeach ?>

    </div>

</div>