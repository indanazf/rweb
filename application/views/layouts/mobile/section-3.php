<?php foreach($our_impact as $row){?>
<div class="container" id="impact">
  <div class="u-mrgn-top--20 u-mrgn-bottom--20">
    <div class="u-txt--20 u-txt-align--center u-mrgn-bottom--10"><?=$row->SUBJECT?></div>
    <div class="u-txt-align--center"><?=$row->CONTENT?></div>
  </div>
  
  <?php 
  $wow_delay = 0.2;
  foreach($our_impact_list as $r){?>
  <div class="banner-3__content__infografis  wow animated zoomIn animated u-mrgn-top--10" data-wow-delay="<?= $wow_delay ?>s">
    <div class="banner-3__content__infografis__img">
      <img src="<?= base_url('assets/images/'.$r->LINK) ?>">
    </div>  
    <div class="banner-3__content__infografis__content">
      <div class="banner-3__content__infografis__content__title"><?=$r->SUBJECT?></div>
        <div class="banner-3__content__infografis__content__value">
          <?php
              $data_number = intval(preg_replace('/[^0-9]+/', '', $r->CONTENT), 10);
              $data_number = number_format($data_number)."<br>";
              echo $data_number;
          ?></div>
      </div>
    </div>
  
  <?php 
  $wow_delay = $wow_delay + 0.2;
  }?>
</div>

  <div class="banner-3__circle-button">
    <a href="<?= base_url() ?>our_impact#firstPage/1">
    <div class="banner-3__circle-button__item  wow animated fadeInUp animated" data-wow-delay="0.4s" >
      <div class="banner-3__circle-button__item__circle banner-3__circle-button__item__circle__item-1">
        
      </div>
      <div class="banner-3__circle-button__item__desc wow animated zoomIn animated">
        Annual Report 2016-2017
      </div>
    </div>
    </a>
    <a href="<?= base_url() ?>our_impact#firstPage/2">
    <div class="banner-3__circle-button__item wow animated fadeInUp animated" data-wow-delay="0.6s" >
      <div class="banner-3__circle-button__item__circle banner-3__circle-button__item__circle__item-2">
      </div>
      <div class="banner-3__circle-button__item__desc">
        Success Stories
      </div>
    </div>
    </a>
    <a href="<?= base_url() ?>our_impact">
      <div class="banner-3__detail-button  wow fadeInUp animated" data-wow-delay="1.5s" >
        <div class="banner-3__detail-button__title">Scoreboard</div>
      </div>
    </a>
    <div class="clear"></div>
  </div>
</div>

<?php } ?>