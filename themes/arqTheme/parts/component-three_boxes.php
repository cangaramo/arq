<?php 
    $boxes = $values['boxes'];
?>
<div class="container my-lg-5 py-5">

    <div class="row boxes">
        
        <?php foreach ($boxes as $index=>$box): 
            $title = $box['title'];
            $permalink = $box['link'];
            $text = $box['text'];
            $link = $box['link'];
            $link_label = $box['link_label'];
        ?>
            <div class="col-lg-4 my-3">
                <div class="box">

                    <!--
                    <div class="overflow-hidden" onClick="redirectTo('<?php echo $permalink ?>')"><div class="bg-image thumbnail" style="background-image:url('<?php echo $box['image']?>')"></div></div>
                    -->

                    <div><div class="bg-image" style="height: 150px; background-image:url('<?php echo $box['image']?>')"></div></div>

                    <div class="px-3 py-2">
                        <?php if ($title): ?>
                            <h3 class="my-3"><?php echo $title ?></h3>
                        <?php endif ?>
                        <p><?php echo $text ?></p>

                        <div class="absolute-link">
                            <a class="link"  class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $index ?>">More</a>
                        </div>
                

                    </div>
                </div>
            </div>


            <!-- Modal -->

            <!-- Copy -->
            <?php if ($box['type'] == "Copy"): ?>

                <div class="modal fade modalCopy" id="modal<?php echo $index ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <div class="modal-header d-block">
                                <div class="row">
                                    <div class="col-9 px-4">
                                      <!--  <h5 class="modal-title" id="exampleModalLongTitle"><?php echo $title ?></h5> -->
                                    </div>
                                    <div class="col-3 px-4">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-body pt-0">

                                <div class="row">
                                    <div class="col-lg-6 px-4">
                                        <div><?php echo $box['column1']?></div>
                                    </div>
                                    <div class="col-lg-6 px-4">
                                        <div><?php echo $box['column2']?></div>
                                        <div class="row">
                                            <?php 
                                            $stats = $box['stats'];
                                            foreach ($stats as $stat):?>
                                            <div class="col-lg-6">
                                                <div class="stat pl-3 mb-4">
                                                    <p class="mb-0 number"><span><?php echo $stat['number']?></span><span><?php echo $stat['symbol']?></span></p>
                                                    <p class="mb-0 description"><span><?php echo $stat['description']?></span></p>
                                                </div>
                                            </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>

                                <?php if ($box['add_chart']): ?>
                                    <div class="row">
                                    
                                        <div class="col-lg-6 px-4">

                                            <!-- First table -->
                                            <table class="table table-materials">

                                                <thead>
                                                    <tr class="bg-red">
                                                    <th scope="col" class="text-left">Energy</th>
                                                    <th scope="col">% of Arq Fuel</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                    <th scope="row" class="text-left">Carbon</th>
                                                    <td>82.6%</td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row" class="text-left">Hydrogen</th>
                                                    <td>4.8%</td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row" class="text-left">Nitrogen</th>
                                                    <td>1.8%</td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row" class="text-left">Oxygen</th>
                                                    <td>9.1%</td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row" class="text-left">Sulphur</th>
                                                    <td>0.7%</td>
                                                    </tr>
                                                </tbody>

                                            </table>

                                            <!-- Second table -->
                                            <table class="table table-materials">

                                                <thead>
                                                    <tr class="bg-gray">
                                                    <th scope="col" class="text-left">Energy</th>
                                                    <th scope="col">% of Arq Fuel</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                    <th scope="row" class="text-left">Clay</th>
                                                    <td>0.74%</td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row" class="text-left">Quartz</th>
                                                    <td>0.18%</td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row" class="text-left">Pyrite</th>
                                                    <td>0.02%</td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row" class="text-left">Other</th>
                                                    <td>0.06%</td>
                                                    </tr>
                                                </tbody>

                                            </table>

                                        </div>

                                        <div class="col-lg-6">
                                            <div>
                                                <img height="350" src="<?php echo get_bloginfo('template_url')?>/assets/images/chart.png">
                                                <!-- 
                                                <div id="chart"></div> -->
                                            </div>
                                        </div>

                                    </div>

                                <?php endif ?>

                            </div>
                        
                        </div>
                    </div>
                </div>
            
            <!-- Video -->
            <?php else: ?>

                <div class="modal fade video-modal" id="modal<?php echo $index?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header d-block">
                                <img class="close-film" data-dismiss="modal" src="<?php echo get_bloginfo('template_url')?>/assets/images/close-white.png">
                            </div>
                            <div class="modal-body">
                                <div class='embed-container'>
                                    <iframe src='https://player.vimeo.com/video/<?php echo $box['vimeo_id']?>' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
              
            <?php endif ?>

        <?php endforeach ?>

    </div>
</div>

