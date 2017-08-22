<?php foreach($our_impact as $row){?>
<div class="banner banner-3" id="impact">
  <div class="container container-own">
    <div class="col-md-3  wow animated fadeInLeft">
      <div class="banner-3__content-title"><?=$row->SUBJECT?></div>
      <div class="banner-3__content">
        <div class="banner-3__content__desc"><?=$row->CONTENT?></div>
        <div class="button__readmore" id="banner-3__content__readmore" onclick="banner3_readmore()">Read More</div>
        <div class="button__close" id="banner-3__content__close" onclick="banner3_close()"></div>
      </div>
    </div>
    <div class="col-md-9">
      <div class="banner-3__content__infografis__frame">
        <?php 
        $wow_delay = 0.2;
        foreach($our_impact_list as $r){?>
        <div class="col-md-6">
        <div class="banner-3__content__infografis  wow animated zoomIn" data-wow-delay="<?= $wow_delay ?>s">
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
        </div>
        <?php 
        $wow_delay = $wow_delay + 0.2;
        }?>
        <br>
      </div>
    </div>
    <img style=" margin-top:10px;" src="<?= base_url('uploads/'.$row->IMG) ?>" class="banner-3__background  wow animated fadeInUp" data-wow-delay="1s">
    

    <div class="banner-3__circle-button">
      <a href="<?php echo site_url('our_impact#firstPage/1') ?>">
      <div class="banner-3__circle-button__item  wow animated fadeInUp" data-wow-delay="0.4s">
        <div class="banner-3__circle-button__item__circle banner-3__circle-button__item__circle__item-1">
          
        </div>
        <div class="banner-3__circle-button__item__desc wow animated zoomIn" >
          Annual Report 2016-2017
        </div>
      </div>
      </a>
      <a href="<?php echo site_url('our_impact#firstPage/2') ?>">
      <div class="banner-3__circle-button__item wow animated fadeInUp" data-wow-delay="0.6s">
        <div class="banner-3__circle-button__item__circle banner-3__circle-button__item__circle__item-2">
        </div>
        <div class="banner-3__circle-button__item__desc">
          Success Stories
        </div>
      </div>
      </a>
      <div class="clear"></div>
    </div>

      <a href="<?php echo site_url('our_impact') ?>">
      <div class="banner-3__detail-button  wow animated fadeInUp" data-wow-delay="1.5s">
        <div class="banner-3__detail-button__title">Scoreboard</div>
      </div>

      </a>
  </div>
</div>
<?php }?>
   