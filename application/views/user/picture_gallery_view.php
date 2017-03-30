<!DOCTYPE html>
<html>
    <head>
      <?php include('include/headsection.php'); ?> 
        <script type="text/javascript">
        function get_ctatgory (catagory) {


            $.ajax({
                url: '<?php echo BASE_URI;?>picture_gallery/category_picture',
                type: "post",
                data:{catagory:catagory},
                success: function(response)
                {
                    $('#gallery').html(response);
                     $("#gallery").unitegallery();
                      $("#page").html("");
                }
            });
        }
        </script>
    </head>
    <body>
        <?php include('include/header.php'); ?>
        <?php include('include/headerbanner.php'); ?>
        <section class="page-content">
            <div class="container">
                <div class="row portfolio-filters triggerAnimation animated" data-animate="fadeInDown">
                    <section class="grid_12">
                        <ul id="filter-pic">
                            <li class="active"><a href="<?php echo BASE_URI.'picture-gallery'; ?>" data-filter="*">All </a></li>
                            <?php foreach($categorylist as $categorylistdata) { ?>
                            <!-- <li><a href="<?php echo BASE_URI.'picture-gallery/category/'.$categorylistdata['picture_slug']; ?>"><?php echo $categorylistdata['picture_title']; ?> </a></li> -->
                            <li><a onclick="get_ctatgory('<?php echo $categorylistdata['picture_id']; ?>')"><?php echo $categorylistdata['picture_title']; ?> </a></li>
                            <?php }?>  
                        </ul>
                    </section>                  
                </div>   
                
                <div id="gallery" style="display:none;">
                    <?php if(count($gallerylist)>0){?> 
                        <?php foreach($gallerylist as $gallerylistdata) { ?>
                            <a href="http://unitegallery.net">
                                <img alt="<?php echo $gallerylistdata['gpicture_title']; ?>" src="<?php echo BASE_URI.'uploads/picture/'.$gallerylistdata['gpicture_image']; ?>" data-image="<?php echo BASE_URI.'uploads/picture/'.$gallerylistdata['gpicture_image']; ?>" data-description="This is a Lemon Slice" style="display:none">
                            </a>
                        <?php }  
                    } else { ?>
                        <h3>No Picures Found</h3>
                    <?php } ?>
                </div>
                

                <div class="row" id="page">
                    <div class="grid_12 pagination">
                        <?php if($totalrec!=0) { ?>
                            <div class="page_no_area">
                            <?php include ("include/pagination.php");
                            $total_records = $totalrec;
                            $page_req=ceil($total_records / 20);
                            $page = 1;
                            // how many records per page
                            $size = 20;
                            // we get the current page from $_GET
                            if ($nowpage){
                                $start = ($nowpage - 1) * 20;
                                $page = (int) $nowpage;
                            }
                            else
                            {
                                $start=0;
                            }
                            $pagination = new Pagination();
                            $linkto = BASE_URI."picture-gallery/page/%s";
                            $pagination->setLink($linkto);
                            $pagination->setPage($page);
                            $pagination->setSize($size);
                            $pagination->setTotalRecords($total_records);
                             
                            // now use this SQL statement to get records from your table
                            ?>
                            <?php
                                      $navigation = $pagination->create_links();
                                      echo $navigation; // will draw our page navigation
                                             ?>
                            </div>
                            <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php include('include/footer.php'); ?>
    
    
    </body>
</html>
