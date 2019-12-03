<?php 
    $args = array(
        'post_type' => 'investor_documents', 
        'posts_per_page' => -1
    );
    $documents = get_posts($args);
?>

<div class="container py-5">

    <h2 class="mb-4">Updates & documents</h2>

    <div class="row documents">

        <?php foreach ($documents as $document): 
            $document_id = $document->ID;
            $title = get_the_title($document_id);
            $description = get_field('description', $document_id);
            $date = get_field('date', $document_id);
            $type = get_field('type', $document_id);
            $permalink = get_the_permalink($document_id);

            switch ($type){
                case 'Financial':
                    $icon = get_bloginfo('template_url') . '/assets/images/financial.png';
                    $label = "Read";
                break;
                case 'Investor':
                    $icon = get_bloginfo('template_url') . '/assets/images/investor.png';
                    $label = "Download";
                break;
                case 'Film':
                    $icon = get_bloginfo('template_url') . '/assets/images/film.png';
                    $label = "Play";
                break;
                case 'Audio':
                    $icon = get_bloginfo('template_url') . '/assets/images/audio.png';
                    $label = "Listen";
                break;
                case 'Article':
                    $icon = get_bloginfo('template_url') . '/assets/images/article.png';
                    $label = "Read";
                break;
                case 'PDF':
                    $icon = get_bloginfo('template_url') . '/assets/images/pdf.png';
                    $label = "Download";
                break;
            }
        ?>

            <div class="col-4 my-4">
                <div class="p-4 box">
                    <img src="<?php echo $icon ?>">
                    <h4 class="mt-4 mb-3"><?php echo $title ?></h4>
                    <p class="mb-1"><?php echo $date ?></p>
                    <p><?php echo $description ?></p>
                    <div class="absolute-link">
                        <a class="link" href="<?php echo $permalink ?>"><?php echo $label ?></a>
                    </div>
                </div>
            </div>

        <?php endforeach ?>
    </div>

</div>