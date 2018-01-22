<?php foreach($get_involved as $row){?>
<div class="" id="involved">
  <div class="u-mrgn-top--40">
    <img src="<?= base_url('uploads/'.$row->IMG) ?>" class="u-image">
  </div>
  <div class="u-mrgn-top--20 container u-mrgn-bottom--40">
    <div class="u-txt--20 u-mrgn-bottom--10 u-txt-align--center"><?=$row->SUBJECT?> </div>
    <div class=""><?=$row->CONTENT?> </div>
  </div>

  <div class="row row-no-side-margin">
    <div class="col-xs-8 u-pad--0">
      <a href="<?= base_url() ?>get_involved/join_us" style="text-decoration: none;">
        <div class="banner-4__join-us wow fadeIn animated" data-wow-delay="0.25s" style="visibility: visible; animation-delay: 0.25s; animation-name: fadeIn;">
          
        </div>
        <div class="banner-4__join-us__circle  wow fadeIn animated" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">Join Us</div>
      </a>
    </div>
    <div class="col-xs-4 u-pad--0">
      <a href="#contact_us">
        <div class="banner-4__contact-us wow animated fadeInUp animated" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
          <div class="banner-4__contact-us__frame wow animated fadeIn animated" data-wow-delay="1.5s" style="visibility: visible; animation-delay: 1.5s; animation-name: fadeIn;">
            <div class="banner-4__contact-us__icon">
            </div>
            <div class="banner-4__contact-us__title">
              Contact Us
            </div>
          </div>
        </div>
      </a>
      <a href="<?= base_url() ?>get_involved/faq">
        <div class="banner-4__faq wow animated fadeInUp animated" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s; animation-name: fadeInUp;">
          <div class="banner-4__faq__frame wow animated fadeIn animated" data-wow-delay="2s" style="visibility: visible; animation-delay: 2s; animation-name: fadeIn;">
            <div class="banner-4__faq__icon">
            </div>
            <div class="banner-4__faq__title">
              FAQ
            </div>
          </div>
        </div>
      </a>
    </div>
  </div>

</div>

<?php } ?>