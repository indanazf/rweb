<?php foreach($our_works as $row){?>
<div class="container" id="works">
  <div class="u-mrgn-top--20">
    <div class="u-txt--20">Sahabat Cipta</div>
    <div class="">is an Indonesian social enterprise that focuses on community's economic and social empowerment.</div>
  </div>
  <div class="banner-2__content wow animated fadeInRight animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInRight;"> 
    <div class="banner-2__content__title"><?=$row->SUBJECT?></div>
    <div class="banner-2__content__desc"><p><?=$row->CONTENT?></p></div>
    <div class="button__readmore-white" id="banner-2__content__readmore" onclick="banner2_readmore()">Read More</div>
    <div class="button__close-white" id="banner-2__content__close" onclick="banner2_close()"></div>
  </div>
  <div class="banner-2-2__content">
    <!-- <a href="http://sahabatcipta.or.id/index.php/our_works/past_going_projects"> -->
    <a href="#" data-toggle="modal" data-target="#myModal-1">
      <div class="banner-2-2__content__item  wow animated fadeInUp animated" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">
        <div class="banner-2-2__content__item__circle banner-2-2__content__item__circle__item-1">
          
        </div>
        <div class="banner-2-2__content__item__desc wow animated zoomIn animated" style="visibility: visible; animation-name: zoomIn;">
          Our Past &amp; On-going Projects
        </div>
      </div>
    </a>
    <!-- <a href="http://sahabatcipta.or.id/index.php/our_works/project_highlights"> -->
    <a href="#" data-toggle="modal" data-target="#myModal-2">
      <div class="banner-2-2__content__item wow animated fadeInUp animated" data-wow-delay="0.6s" style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
        <div class="banner-2-2__content__item__circle banner-2-2__content__item__circle__item-2">
        </div>
        <div class="banner-2-2__content__item__desc">
          Project Highlights
        </div>
      </div>
    </a>
    <!-- <a href="http://sahabatcipta.or.id/index.php/our_works/partners"> -->
    <a href="#" data-toggle="modal" data-target="#myModal-3">
      <div class="banner-2-2__content__item wow animated fadeInUp animated" data-wow-delay="0.8s" style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;">
        <div class="banner-2-2__content__item__circle banner-2-2__content__item__circle__item-3">
        </div>
        <div class="banner-2-2__content__item__desc">
          Our Partners
        </div>
      </div>
    </a>
    <div class="clear"></div>
  </div>

  <div class="modal fade" id="myModal-1" role="dialog">
    <div class="modal-dialog new-modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          
          <?php $this->load->view('layouts/index/our_past'); ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal-2" role="dialog">
    <div class="modal-dialog new-modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          
          <?php $this->load->view('layouts/index/project_highlight'); ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal-3" role="dialog">
    <div class="modal-dialog new-modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          
          <?php $this->load->view('layouts/index/our_partners'); ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
</div>
<?php } ?>