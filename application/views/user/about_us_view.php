<!DOCTYPE html>
<html>
    <head>
    <?php include('include/headsection.php'); ?>
    <style>
      .apoint{
      	cursor:pointer;
      	cursor:pointer;
      	font-size:25px;
        font-weight:bold;
        font-family: fantasy;
        color:#717A8B;
      }
      .containerc {
        width: 438px;
        height: 111px;
        position:relative;
      }
      .containera {
        width: 438px;
        height: 134px;
        position:relative;
      }
      .containere {
        width: 438px;
        height: 263px;
        position:relative;
      }
      .containerl {
        width: 438px;
        height: 242px;
        position:relative;
      }
      .containerb {
        width: 438px;
        height: 134px;
        position:relative;
      }
      .containerd {
        width: 438px;
        height: 243px;
        position:relative;
      }
      .nava{
        width: 50px;
        height: 50px;
        position: absolute;
        top: 34%;
        left: 23%;
        font-size:25px;
        font-weight:bold;
        font-family: fantasy;
        color:#717A8B;
      }
      .navc{
        width: 50px;
        height: 50px;
        position: absolute;
        top: 16%;
        left: 23%;
        font-size:25px;
        font-weight:bold;
        font-family: fantasy;
        color:#717A8B;
      }
      .navf{
        width: 50px;
        height: 50px;
        position: absolute;
        top: 74%;
        left: 23%;
        font-size:25px;
        font-weight:bold;
        font-family: fantasy;
        color:#717A8B;
      }
      .navl{
        width: 50px;
        height: 50px;
        position: absolute;
        top: 68%;
        left: 69%;
        font-size:25px;
        font-weight:bold;
        font-family: fantasy;
        color:#717A8B;
      }
      .navb{
        width: 50px;
        height: 50px;
        position: absolute;
        top: 29%;
        left: 69%;
        font-size:25px;
        font-weight:bold;
        font-family: fantasy;
        color:#717A8B;
      }
    </style>
  
    </head>
    <body>
      <?php include('include/header.php'); ?>
      <?php include('include/headerbanner.php'); ?>
      <br><br><br>
      <?php if($aboutinfo['cms_choice']=='0'){?>
      <section class="page-content">
          <div class="container">
              <div class="row">
                  <div class="grid_6">
                      <div class="triggerAnimation animated" data-animate="fadeInLeft">
                          <ul class="team-alternative row">

                              <li class="team-member ">
                                  <img src="<?= isset($aboutinfo['cms_aimage1']) && strlen(trim($aboutinfo['cms_aimage1'])) ? BASE_URI.'uploads/'.$aboutinfo['cms_aimage1'] : BASE_URI.'assets/images/puzzle_top_left.png' ?>" alt="team member image" height="220" width="285"/>
                                  <div class="team-member-hover">
                                        <div class="mask"></div>

                                        <div class="team-member-info">
                                            <h5><?php echo $abouttitle['cms_aimage1'];?></h5>
                                            <span class="position"><?php echo $aboutcontent['cms_aimage1'];?></span>
                                            <a href="<?php echo $aboutlink['cms_aimage1'];?>" class="btn-medium empty white" target="_blank">Read more</a>
                                        </div>
                                  </div>
                              </li>
                              <li class="team-member">
                                  <img src="<?= isset($aboutinfo['cms_aimage2']) && strlen(trim($aboutinfo['cms_aimage2'])) ? BASE_URI.'uploads/'.$aboutinfo['cms_aimage2'] : BASE_URI.'assets/images/puzzle_top_right.png' ?>" alt="team member image" height="220" width="285"/>
                                  <div class="team-member-hover">
                                        <div class="mask"></div>

                                        <div class="team-member-info">
                                            <h5><?php echo $abouttitle['cms_aimage2'];?></h5>
                                            <span class="position"><?php echo $aboutcontent['cms_aimage2'];?></span>
                                            <a href="<?php echo $aboutlink['cms_aimage2'];?>" class="btn-medium empty white" target="_blank">Read more</a>
                                        </div>
                                  </div>
                              </li>

                              <li class="team-member">
                                  <img src="<?= isset($aboutinfo['cms_aimage3']) && strlen(trim($aboutinfo['cms_aimage3'])) ? BASE_URI.'uploads/'.$aboutinfo['cms_aimage3'] : BASE_URI.'assets/images/puzzle_bottom_left.png' ?>" alt="team member image" height="220" width="285"/>
                                  <div class="team-member-hover">
                                        <div class="mask"></div>

                                        <div class="team-member-info">
                                            <h5><?php echo $abouttitle['cms_aimage3'];?></h5>
                                            <span class="position"><?php echo $aboutcontent['cms_aimage3'];?></span>
                                            <a href="<?php echo $aboutlink['cms_aimage3'];?>" class="btn-medium empty white" target="_blank">Read more</a>
                                        </div>
                                  </div>
                              </li>
                              <li class="team-member">
                                  <img src="<?= isset($aboutinfo['cms_aimage4']) && strlen(trim($aboutinfo['cms_aimage4'])) ? BASE_URI.'uploads/'.$aboutinfo['cms_aimage4'] : BASE_URI.'assets/images/puzzle_bottom_right.png' ?>" alt="team member image" height="220" width="285"/>
                                  <div class="team-member-hover">
                                        <div class="mask"></div>

                                        <div class="team-member-info">
                                            <h5><?php echo $abouttitle['cms_aimage4'];?></h5>
                                            <span class="position"><?php echo $aboutcontent['cms_aimage4'];?></span>
                                            <a href="<?php echo $aboutlink['cms_aimage4'];?>" class="btn-medium empty white" target="_blank">Read more</a>
                                        </div>
                                  </div>
                              </li>                                
                          </ul>
                      </div>
                  </div>
                  <article class="grid_6">
                      <div class="triggerAnimation animated" data-animate="fadeInRight">
                            <section class="heading-bordered">
                                <h3><?php echo $aboutinfo['cms_title']; ?> </h3>
                            </section>
                            <?php echo htmlspecialchars_decode($aboutinfo['cms_content']); ?> 
                      </div>
                  </article>
              </div>
          </div>
      </section>
      <?php } else if($aboutinfo['cms_choice']=='1'){?>
      <section class="page-content">
          <div class="container">
              <div class="row">
                  <div class="grid_12" align="center">
                      <div id="pdf">
                          <object width="90%" height="1425" type="application/pdf" data="assets/images/sample.pdf?#view=FitH&scrollbar=0&toolbar=0&navpanes=0" id="pdf_content">
                            <p>It appears your Web browser is not configured to display PDF files.</p>
                          </object>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <?php } ?>
      <section class="page-content parallax parallax-1" data-stellar-background-ratio="0.5">
          <div class="container">
              <div class="row">
                  <article class="grid_12 timeline">
                      <section class="heading-centered triggerAnimation animated" data-animate="bounceIn">
                      <h2 style="margin-bottom:32px;"><?php echo $aboutinfo['cms_title']; ?> </h2>
                      <?php echo htmlspecialchars_decode($aboutinfo['cms_fcontent']); ?>
                      <br>
                      <div class="row">
                        <div class="grid_12" align="center">
                          <ul>
                            <li>
                              <img src="assets/timeline/new/1.png" class="front">
                              <span>
                                <img src="<?= strlen($timelinelist[0]['timeline_thumbnail']) ? BASE_URI.'uploads/picture/thumb/'.$timelinelist[0]['timeline_thumbnail'] : 'assets/timeline/new/1-a.png' ?>" class="front">
                                <div class="transparent"></div>
                              </span>
                              <div class="dated"><?php echo htmlspecialchars_decode($timelinelist[0]['timeline_title']); ?>
                                
                              </div>
                              <span class="popout">
                                <i class="fa fa-times" aria-hidden="true"></i>
                                <h1><?php echo htmlspecialchars_decode($timelinelist[0]['timeline_title']); ?></h1>
                                  <?php echo htmlspecialchars_decode($timelinelist[0]['timeline_content']); ?>
                              </span>
                            </li>
                            <?php for ($i=1 ; $i<=sizeof($timelinelist); $i++){?>
                            <?php if(isset($timelinelist[$i])){ ?>
                            <li>
                            <?php if(sizeof($timelinelist)-1==$i)  { ?>
                              <img src="assets/timeline/new/5.png" class="front left">
                              <span>
                                <img src="<?= strlen($timelinelist[$i]['timeline_thumbnail']) ? BASE_URI.'uploads/picture/thumb/'.$timelinelist[$i]['timeline_thumbnail'] : 'assets/timeline/new/5-a.png' ?>" class="front">
                                <div class="transparent"></div>
                              </span>
                              <?php } else { ?>
                              <img src="assets/timeline/new/2.png" class="front">
                              <span>
                                <img src="<?= strlen($timelinelist[$i]['timeline_thumbnail']) ? BASE_URI.'uploads/picture/thumb/'.$timelinelist[$i]['timeline_thumbnail'] : 'assets/timeline/new/2-a.png' ?>" class="front">
                                <div class="transparent"></div>
                              </span>
                              <?php } ?>
                              <div class="dated"><?php echo $timelinelist[$i]['timeline_title']; ?>
                              </div>
                              <span class="popout">
                                <i class="fa fa-times" aria-hidden="true"></i>
                                <h1><?php echo htmlspecialchars_decode($timelinelist[$i]['timeline_title']); ?></h1><?php echo htmlspecialchars_decode($timelinelist[$i]['timeline_content']); ?>
                              </span>
                            </li>
                            <?php } ?>
                            <?php if(isset($timelinelist[$i+1])){ ?>
                            <li> 
                              <?php if(sizeof($timelinelist)-1==$i+1) {?>
                                <img src="assets/timeline/new/4.png" class="front right">
                                <span>
                                  <img src="<?= strlen($timelinelist[$i+1]['timeline_thumbnail']) ? BASE_URI.'uploads/picture/thumb/'.$timelinelist[$i+1]['timeline_thumbnail'] : 'assets/timeline/new/4-a.png' ?>" class="front">
                                  <div class="transparent"></div>
                                </span>
                                <?php } else { ?>
                              <img src="assets/timeline/new/3.png" class="front">
                              <span>
                                <img src="<?= strlen($timelinelist[$i+1]['timeline_thumbnail']) ? BASE_URI.'uploads/picture/thumb/'.$timelinelist[$i+1]['timeline_thumbnail'] : 'assets/timeline/new/3-a.png' ?>" class="front">
                                <div class="transparent"></div>
                              </span>
                              <?php } ?>
                              <div class="dated"><?php echo $timelinelist[$i+1]['timeline_title']; ?>
                              </div>
                              <span class="popout">
                                <i class="fa fa-times" aria-hidden="true"></i>
                                <h1><?php echo htmlspecialchars_decode($timelinelist[$i+1]['timeline_title']); ?></h1><?php echo htmlspecialchars_decode($timelinelist[$i+1]['timeline_content']); ?>
                              </span>
                            </li> 
                            <?php } ?>
                            <?php $i=$i+1; } ?>
                            </ul>
                          </div>
                        </div>
                      </section>
                    </article>
                  </div>
                </div>
              </section>
            </article>
          </div>
        </div>
      </section>
      <?php include('include/footer.php'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('.timeline ul li .dated').mouseover(function(event){
      event.stopPropagation();
      //var addText = '_clean.png';
      //var imageSrc = $(this).parent().find(".front").attr('src');
      //var newString = imageSrc.slice(0,-4);
      //$(this).parent().find(".front").attr('src', newString + addText);
      $(this).parent().find($('span .transparent')).hide();

      $(this).on("click",function(){
        $(this).parent().find($(".popout")).show();
        $(".timeline ul li .dated").not($(this)).parent().find($(".popout")).hide();
      });

      $(this).css('opacity',0);
    }).mouseout(function(event){
      // var addText = '.png';
      // var imageSrc = $(this).parent().find(".front").attr('src');
      // var newString = imageSrc.slice(0,-10);
      // $(this).parent().find(".front").attr('src', newString + addText);
      $(this).parent().find($('span .transparent')).show();
      $(this).css('opacity',1);
    });

    $(".timeline ul li .popout i").on("click",function(){
      $(this).parent().hide();
    });
  });
</script>
  
</body>
</html>
