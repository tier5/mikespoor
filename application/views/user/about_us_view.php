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
                                  <img src="<?php echo BASE_URI.'uploads/'.$aboutinfo['cms_aimage1']; ?>" alt="team member image" height="220" width="285"/>
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
                                  <img src="<?php echo BASE_URI.'uploads/'.$aboutinfo['cms_aimage2']; ?>" alt="team member image" height="220" width="285"/>
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
                                  <img src="<?php echo BASE_URI.'uploads/'.$aboutinfo['cms_aimage3']; ?>" alt="team member image" height="220" width="285"/>
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
                                  <img src="<?php echo BASE_URI.'uploads/'.$aboutinfo['cms_aimage4']; ?>" alt="team member image" height="220" width="285"/>
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
                              <img src="assets/timeline/timeline1.png">
                              <div class="dated"><?php echo htmlspecialchars_decode($timelinelist[0]['timeline_title']); ?>
                                <span class="popout">
                                  <h1><?php echo htmlspecialchars_decode($timelinelist[0]['timeline_title']); ?></h1><?php echo htmlspecialchars_decode($timelinelist[0]['timeline_content']); ?>
                                </span>
                              </div>
                            </li>
                            <?php for ($i=1 ; $i<=sizeof($timelinelist); $i++){?>
                            <?php if(isset($timelinelist[$i])){ ?>
                            <li>
                            <?php if(sizeof($timelinelist)-1==$i)  { ?>
                              <img src="assets/timeline/timeline5.png">
                              <?php } else { ?>
                              <img src="assets/timeline/timeline2.png">
                              <?php } ?>
                              <div class="dated"><?php echo $timelinelist[$i]['timeline_title']; ?>
                                <span class="popout">
                                  <h1><?php echo htmlspecialchars_decode($timelinelist[$i]['timeline_title']); ?></h1><?php echo htmlspecialchars_decode($timelinelist[$i]['timeline_content']); ?>
                                </span>
                              </div>
                            </li>
                            <?php } ?>
                            <?php if(isset($timelinelist[$i+1])){ ?>
                            <li> 
                              <?php if(sizeof($timelinelist)-1==$i+1) {?>
                                 <img src="assets/timeline/timeline6.png">
                                <?php } else { ?>
                              <img src="assets/timeline/timeline3.png">
                              <?php } ?>
                              <div class="dated"><?php echo $timelinelist[$i+1]['timeline_title']; ?>
                                <span class="popout">
                                  <h1><?php echo htmlspecialchars_decode($timelinelist[$i+1]['timeline_title']); ?></h1><?php echo htmlspecialchars_decode($timelinelist[$i+1]['timeline_content']); ?>
                                </span>
                              </div>
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

    </body>
</html>
