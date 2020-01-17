<?php 
$terms = get_terms( array(
    'taxonomy' => 'document_year',
    'hide_empty' => false,
) );

$anchor = $values['anchor'];

?>

<div id="<?php echo $anchor ?>" class="bg-ligth_gray">
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


<!-- Updates and documents -->
<!-- Modal -->
<?php 
$disclaimer = get_field('disclaimer', 'option'); 
?>
<div class="modal fade" id="disclaimerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered container" role="document">

        <div class="modal-content">

            <div class="modal-header"></div>

            <div class="modal-body px-4">
                <div><?php echo $disclaimer ?></div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="accept-btn btn btn-primary" data-dismiss="modal">Accept</button>
            </div>

        </div>

    </div>
</div>