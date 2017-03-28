<!DOCTYPE html>
<html>
    <head>
      <?php include('include/headsection.php'); ?> 
    </head>
    <body>
      <?php include('include/header.php'); ?>
      <?php include('include/headerbanner.php'); ?>
      <!-- .page-content start -->
        <section class="page-content">

            <!-- .container start -->
            <div class="container">

                <!-- .row start -->
                <div class="row portfolio-filters triggerAnimation animated" data-animate="fadeInDown">

                    <section class="grid_12">
                        <ul id="filter-pic">
                        <li class="active"><a href="<?php echo BASE_URI.'picture-gallery'; ?>" data-filter="*">All </a></li>
                        
                        <?php
                        foreach($categorylist as $categorylistdata)
                        {
                        ?>
                            <li><a href="<?php echo BASE_URI.'picture-gallery/category/'.$categorylistdata['picture_slug']; ?>"><?php echo $categorylistdata['picture_title']; ?> </a></li>
                            <?php
                        }
                        ?>
                            <?php /*?><li><a href="#" data-filter=".design">BOOK COVERS</a></li>
                            <li><a href="#" data-filter=".photography">ILLUSTRATIONS & SPREADS</a></li>
                            <li><a href="#" data-filter=".graphics">BLACK & WHITE</a></li>
                             <li><a href="#" data-filter=".graphics">CHARACTERS</a></li>
                              <li><a href="#" data-filter=".graphics">ANIMAL CHARACTERS </a></li>
                               <li><a href="#" data-filter=".graphics">PLACES</a></li>
                                <li><a href="#" data-filter=".graphics">SKETCHES </a></li>
                                 <li><a href="#" data-filter=".graphics">EDITORIAL ILLUSTRATIONS</a></li>
                                  <li><a href="#" data-filter=".graphics">STYLES</a></li><?php */?>
                        </ul>
                    </section><!-- .grid_12 end -->                    
                </div><!-- .row.portfolio-filters end  end -->

                
                
                
                
            <?php
            if(count($gallerylist)>0)
            {
            ?>  
                
                <div id="gallery" style="display:none;">

        
        <?php
        
        
        foreach($gallerylist as $gallerylistdata)
        {
            
        ?>
        <a href="http://unitegallery.net">
        <img alt="<?php echo $gallerylistdata['gpicture_title']; ?>"
             src="<?php echo BASE_URI.'uploads/picture/'.$gallerylistdata['gpicture_image']; ?>"
             data-image="<?php echo BASE_URI.'uploads/picture/'.$gallerylistdata['gpicture_image']; ?>"
             data-description="This is a Lemon Slice"
             style="display:none">
        </a>
        <?php
        }
        ?>
        

             
    </div>
            <?php
            }
            else
            {
                ?>
                <h3>No Picures Found</h3>
                <?php
            }
            ?>
                
                
                
    
                
                
                
                

                <!-- .roe start -->
                <div class="row">
                    <div class="grid_12 pagination">
                        <?php /*?><ul>
                            <li class="current-page">
                                <span>Page 1 of 5</span>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#" class=" icon-double-angle-right"></a></li>
                        </ul><?php */?>
                        <?php
if($totalrec!=0)
{
?>
<!--pagination class-->
<div class="page_no_area">
<?php
include ("include/pagination.php");
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
<!--pagination class ends-->
<?php
}
?>
                    </div><!-- .grid_12 end -->
                </div><!-- .row end -->
            </div><!-- .container end -->
        </section><!-- .page-content end -->

      <?php include('include/footer.php'); ?>
    

    </body>
</html>
