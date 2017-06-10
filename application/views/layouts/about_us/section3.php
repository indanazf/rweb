<?php foreach($our_impact as $row){?>
<div class="banner banner-3" id="impact">
  <div class="container container-own">
    <div class="col-md-3">
      <div class="banner-3__content-title"><?=$row->SUBJECT?></div>
      <div class="banner-3__content">
        <div class="banner-3__content__desc"><?=$row->CONTENT?></div>
        <div class="banner-3__content__button">...</div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="banner-3__content__infografis__frame">
        <?php foreach($our_impact_list as $r){?>
        <div class="banner-3__content__infografis">
          <div class="banner-3__content__infografis__img">
            <img src="<?= base_url('assets/images/'.$r->LINK) ?>">
          </div>  
          <div class="banner-3__content__infografis__content">
            <div class="banner-3__content__infografis__content__title"><?=$r->SUBJECT?></div>
            <div class="banner-3__content__infografis__content__value"><?=$r->CONTENT?></div>
          </div>
        </div>
        <?php }?>
        <br>
      </div>
    </div>
    <img src="<?= base_url('uploads/'.$row->IMG) ?>" class="banner-3__background">
    <a href="#"><div class="banner-3__detail-button"></div></a>
  </div>
</div>
<?php }?>
   