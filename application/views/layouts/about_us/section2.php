<?php foreach($our_works as $row){?>
<div class="banner banner-2" id="works">
  <div class="container" style="position: relative;">
    
    <div class="banner-overlay banner-overlay-2" >
      <img src="<?= base_url('uploads/'.$row->IMG) ?>" style="min-width: 700px;max-width: 800px;">
    </div>
    <div class="col-md-7 u-pad">&nbsp;</div>
    <div class="col-md-5 u-pad">

      <div class="banner-2__content">
        <div class="banner-2__content__title"><?=$row->SUBJECT?></div>
        <div class="banner-2__content__desc"><?=$row->CONTENT?></div>
        <div class="banner-2__content__button">...</div>
      </div>
      <div class="banner-2-2__content">
        <a href="<?php echo site_url('our_works/past_going_projects') ?>">
        <div class="banner-2-2__content__item">
          <div class="banner-2-2__content__item__circle">
            <img src="<?= base_url() ?>assets/images/banner-2-icon-1.png">
          </div>
          <div class="banner-2-2__content__item__desc">
            Our Past & On Going Project
          </div>
        </div>
        </a>
        <a href="<?php echo site_url('our_works/project_highlights') ?>">
        <div class="banner-2-2__content__item">
          <div class="banner-2-2__content__item__circle">
            <img src="<?= base_url() ?>assets/images/banner-2-icon-2.png">
          </div>
          <div class="banner-2-2__content__item__desc">
            Project Highlights
          </div>
        </div>
        </a>
        <a href="<?php echo site_url('our_works/partners') ?>">
        <div class="banner-2-2__content__item">
          <div class="banner-2-2__content__item__circle">
            <img src="<?= base_url() ?>assets/images/banner-2-icon-3.png">
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

   