<div class="blog-bottom" style="margin-top:-20px;">
						<h4>Recent Posts</h4>
                        <?php
		
		foreach($packagelist as $pdata)
          {
			  ?>
							<div class="product-go">
								<a href="<?php echo DOMAIN.'packages/details/'.$pdata['package_slug']; ?>" class="fashion"><img class="img-responsive " src="<?php echo 'uploads/'.$pdata['package_image']; ?>" alt=""></a>
								<div class="grid-product">
									<a href="<?php echo DOMAIN.'packages/details/'.$pdata['package_slug']; ?>" class="elit"><?php echo $pdata['package_title']; ?></a>
									<p><?php echo substr(htmlspecialchars_decode($pdata['package_content']),0,90)."..."; ?></p>
								</div>
							<div class="clearfix"> </div>
                            </div>
                            <?php
		  }
		  ?>
							
							
							</div>