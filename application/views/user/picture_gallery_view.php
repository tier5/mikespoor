<!DOCTYPE html>
<html>
    <head>
      <?php include('include/headsection.php'); ?> 
        <script type="text/javascript">
            $(function(){
                $('.background').slick();
                $('.foreground').slick();
            });
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
        <?php //include('include/headerbanner.php'); ?>
        <div class="top-banner">
            <?php if (count($filtered_arr)) { ?>
                <section class="center slider background" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "autoplay": false, "autoplaySpeed" : 0, "arrows": false, "fade" : true}'>
                    <div>
                        <img src="<?php echo BASE_URI.'uploads/home_page/banner/thumb/'.$filtered_arr['banner_image']; ?>" alt="slidebg3" class="img-responsive"/>
                    </div>
                </section>
            <?php } else {?>
                <section class="center slider background" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "autoplay": true, "autoplaySpeed" : <?php echo $bannerlist[0]['background_image_transition']*10;?>, "arrows": true, "fade" : true}'>
                    <?php if (count($bannerlist)) { ?>
                        <?php foreach ($bannerlist as $key=>$bannerlistdata) { ?>
                            <div>
                                <img src="<?php echo BASE_URI.'uploads/home_page/banner/thumb/'.$bannerlistdata['banner_image']; ?>" alt="slidebg3" class="img-responsive"/>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </section>
            <?php } ?>
            <!--Slider background image end-->
            <!--Slider foreground image start-->
            <?php if (count($filtered_arr_fg)) { ?>
                <section class="center slider foreground" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "autoplay": false, "autoplaySpeed" : 0, "arrows": false, "fade" : true}'>
                    <div>
                        <img src="<?php echo BASE_URI.'uploads/home_page/banner/thumb/'.$filtered_arr_fg['banner_front_image'];; ?>" alt="slidebg3"/>
                    </div>
                </section>
            <?php } else {?>
                <section class="center slider foreground" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "autoplay": true, "autoplaySpeed" : <?php echo $bannerlist[0]['foreground_image_transition']*10;?>, "dots": true, "fade" : true}'>
                    <?php if (count($bannerlist)) { ?>
                        <?php foreach ($bannerlist as $key=>$bannerlistdata) { ?>
                            <?php if (array_key_exists('banner_front_image', $bannerlistdata) && $bannerlistdata['banner_front_image']!='') { ?>
                                <div>
                                    <img src="<?php echo BASE_URI.'uploads/home_page/banner/thumb/'.$bannerlistdata['banner_front_image']; ?>" alt='mobile devices'/>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </section>
            <?php } ?>
            <!--Slider foreground image end-->
        </div>
        <section class="page-content">
            <div class="container">
                <div class="row portfolio-filters triggerAnimation animated" data-animate="fadeInDown">
                    <section class="grid_12">
                        <ul id="filter-pic">
                            <li class="active"><a href="<?php echo BASE_URI.'picture-gallery'; ?>" data-filter="*">All </a></li>
                            <?php foreach($categorylist as $categorylistdata) { ?>
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
