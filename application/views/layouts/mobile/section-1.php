<script src="<?= base_url() ?>assets/js/function.js"></script>
<div id="aboutus">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php 
        $index__slider = 0;
        foreach($about_us as $row){
        ?>
        <li data-target="#carousel-example-generic" data-slide-to="<?= $index__slider?>" class="<?php if($index__slider==0){ ?>active<?php } ?>"></li>
        <?php 
        $index__slider++;
        } 
        ?>
        <?php foreach($team as $t){?>
        <li data-target="#carousel-example-generic" data-slide-to="<?= $index__slider?>" class="<?php if($index__slider==0){ ?>active<?php } ?>"></li>
        <?php 
        $index__slider++;
        } 
        ?>
        <?php foreach($executive as $e){?>
        <li data-target="#carousel-example-generic" data-slide-to="<?= $index__slider?>" class="<?php if($index__slider==0){ ?>active<?php } ?>"></li>
        <?php 
        $index__slider++;
        } 
        ?>
      </ol>
      <div class="carousel-inner" role="listbox">
        <?php 
        $index__slider = 1;
        foreach($about_us as $row){
        ?>
        <div class="item <?php if($index__slider==1){ ?>active<?php } ?>">
          <img src="<?= base_url('uploads/'.$row->IMG) ?>">
          <div class="container">
              <div class="u-mrgn-top--20 u-mrgn-bottom--20">
                <div class="u-txt--20"><?=$row->SUBJECT?></div>
                <div class=""><?=$row->CONTENT?></div>
              </div>
            </div>
        </div>
        <?php 
        $index__slider++;
        } 
        ?>
        <?php foreach($team as $t){?>
        <div class="item <?php if($index__slider==1){ ?>active<?php } ?>">
          <img src="<?= base_url('uploads/'.$t->IMG) ?>">
           <div class="container">
              <div class="u-mrgn-top--20 u-mrgn-bottom--20">
                <div class="u-txt--20"><?=$row->SUBJECT?></div>
                <div class=""><?=$row->CONTENT?></div>
              </div>
            </div>
        </div>
        <?php 
        $index__slider++;
        } 
        ?>
        <?php foreach($executive as $e){?>
        <div class="item <?php if($index__slider==1){ ?>active<?php } ?>">
          <img src="<?= base_url('uploads/'.$e->IMG) ?>">
           <div class="container">
              <div class="u-mrgn-top--20 u-mrgn-bottom--20">
                <div class="u-txt--20"><?=$row->SUBJECT?></div>
                <div class=""><?=$row->CONTENT?></div>
              </div>
            </div>
        </div>
        <?php 
        $index__slider++;
        } 
        ?>

      </div>
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <div class="fp-controlArrow fp-prev"></div>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <div class="fp-controlArrow fp-next"></div>
      </a>
    </div>
</div>