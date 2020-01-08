<?php 

$terms = get_terms( array(
    'taxonomy' => 'document_year',
    'hide_empty' => false,
) );

?>

<div class="bg-ligth_gray">
    <div class="container py-5">

        <div class="d-flex justify-content-between my-4">
            <div>
                <h2>Updates & documents</h2>
            </div>
            <div>
                <select>
                    <option value="-1">Filter</option> 
                    <?php foreach ($terms as $term): 
                    ?>
                        <option value="<?php echo $term->term_id ?>"><?php echo $term->name ?></option> 
                    <?php endforeach ?>
                </select>
            </div>
        </div>

        <div id="documents-response" class="pb-4">
        </div>
    </div>
</div>

<!-- Add ajax -->