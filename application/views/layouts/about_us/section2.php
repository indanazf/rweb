<?php foreach($our_works as $row){?>
<div class="banner banner-2" id="works">
  <div class="container" style="position: relative;">
    
    <div class="banner-overlay banner-overlay-2 wow animated zoomIn">
      <img src="<?= base_url('uploads/'.$row->IMG) ?>" style="min-width: 700px;max-width: 800px;">
    </div>
    <div class="col-md-7 u-pad">&nbsp;</div>
    <div class="col-md-5 u-pad">

      <div class="banner-2__content wow animated fadeInRight" data-wow-delay="0.2s"> 
        <div class="banner-2__content__title"><?=$row->SUBJECT?></div>
        <!-- <div class="banner-2__content__desc"><?=$row->CONTENT?></div> -->
        <div class="banner-2__content__desc"><?=$row->CONTENT?></div> 
        <div class="button__readmore-white" id="banner-2__content__readmore" onclick="banner2_readmore()">Read More</div>
        <div class="button__close-white" id="banner-2__content__close" onclick="banner2_close()"></div>
      </div>
      <div class="clear"></div>
      <div class="banner-2-2__content">
        <a href="<?php echo site_url('our_works/past_going_projects') ?>">
        <div class="banner-2-2__content__item  wow animated fadeInUp" data-wow-delay="0.4s">
          <div class="banner-2-2__content__item__circle banner-2-2__content__item__circle__item-1">
            
          </div>
          <div class="banner-2-2__content__item__desc wow animated zoomIn" >
            Our Past & On-Going Project
          </div>
        </div>
        </a>
        <a href="<?php echo site_url('our_works/project_highlights') ?>">
        <div class="banner-2-2__content__item wow animated fadeInUp" data-wow-delay="0.6s">
          <div class="banner-2-2__content__item__circle banner-2-2__content__item__circle__item-2">
          </div>
          <div class="banner-2-2__content__item__desc">
            Project Highlights
          </div>
        </div>
        </a>
        <a href="<?php echo site_url('our_works/partners') ?>">
        <div class="banner-2-2__content__item wow animated fadeInUp" data-wow-delay="0.8s">
          <div class="banner-2-2__content__item__circle banner-2-2__content__item__circle__item-3">
          </div>
          <div class="banner-2-2__content__item__desc">
            Our Partners
          </div>
        </div>
        </a>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</div>
<?php }?>

   