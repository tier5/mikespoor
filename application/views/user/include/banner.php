<div class="slider">					     
				 <div class="fluid_container">
                   
					<div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
                    <?php
					foreach($bannerlist as $bannerlistdata)
					{
					?>
                    <div data-thumb="<?php echo 'uploads/'.$bannerlistdata['banner_image']; ?>" data-src="<?php echo 'uploads/'.$bannerlistdata['banner_image']; ?>">  </div> 		
                    <?php
					}
					?>
					<?php /*?><div data-thumb="assets/user/images/thumbnails/slider-4.jpg" data-src="assets/user/images_1/slider-4.jpg">  </div>
                    <div data-thumb="assets/user/images/thumbnails/slider-1v.jpg" data-src="assets/user/images_1/slider-1v.jpg">  </div>
                     <div data-thumb="assets/user//thumbnails/slider-3.jpg" data-src="assets/user/images_1/slider-3.jpg">  </div>
                     <div data-thumb="assets/user/images/thumbnails/slider-11.jpg" data-src="assets/user/images_1/slider-11.jpg">  </div>
                      <div data-thumb="assets/user/images/thumbnails/slider-2.jpg" data-src="assets/user/images_1/slider-2.jpg">  </div><?php */?>
					   
					  
					  
				       
					</div>
				</div>
			 <div class="clear"></div>					       
		 </div>