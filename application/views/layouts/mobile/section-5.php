<div class="" id="newsroom">
  <div class="row row-no-side-margin">
    <div class="col-xs-6 u-pad">
      <?php foreach($content_press as $row){?>
      <a href="<?= base_url() ?>newsroom/press_release">
        <div class="c-press-release u-image wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;">
          <img src="<?= base_url() ?>uploads/newsroom1.png">
        </div>
        <div class="banner-5__left  wow fadeIn animated" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s; animation-name: fadeIn;">
          <div class="banner-5__left__icon"></div>
          <div class="banner-5__left__title">Press Release</div>
        </div>
      </a>
      <?php } ?>
    </div>

    
    
    <div class="col-xs-6 u-pad">
      <?php foreach($content_news as $row){?>
      <a href="<?= base_url() ?>newsroom/news">
        <div class="c-press-release u-image wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;">
          <img src="<?= base_url() ?>uploads/newsroom2.png">
        </div>
        <div class="banner-5__right wow fadeIn animated" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s; animation-name: fadeIn;">
          <div class="banner-5__right__icon"></div>
          <div class="banner-5__right__title">SC in News</div>
        </div>
      </a>
      <?php } ?>
    </div>
  </div>

  <div id="contact_us">
  <div id="carousel-example-generic-2" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      
      <div class="item active">
        <div class="banner-6__item">
          <div class="banner-6__item__head"><img src="<?= base_url() ?>assets/images/facebook.png"></div>
          <div class="banner-6__item__body"><div class="fb-page" data-href="https://www.facebook.com/sahabatcipta" data-tabs="timeline" data-width="350px" data-height="300px" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/sahabatcipta" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/sahabatcipta">Sahabat Cipta</a></blockquote></div></div>
        </div>
      </div>

      <div class="item">
        <div class="banner-6__item" data-wow-delay="0.5s">
          <div class="banner-6__item__head"><img src="<?= base_url() ?>assets/images/twitter.png"></div>
          <div class="banner-6__item__body"><a class="twitter-timeline" data-width="350" data-height="300" data-theme="light" data-link-color="#2B7BB9" href="https://twitter.com/Sahabat_Cipta">Tweets by Sahabat_Cipta</a></div>
        </div>
      </div>

      <div class="item">
        <div class="banner-6__item" data-wow-delay="1s">
          <div class="banner-6__item__head"><img src="<?= base_url() ?>assets/images/youtube.png"></div>
          <div class="banner-6__item__body"></div>
        </div>
      </div>

      <div class="item">
        <div class="banner-6__item" data-wow-delay="1s">
          <div class="banner-6__item__head"><img src="<?= base_url() ?>assets/images/linkedin.png"></div>
          <div class="banner-6__item__body"></div>
        </div>
      </div>

    </div>
    <a class="left carousel-control" href="#carousel-example-generic-2" role="button" data-slide="prev">
      <div class="fp-controlArrow fp-prev"></div>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic-2" role="button" data-slide="next">
      <div class="fp-controlArrow fp-next"></div>
    </a>
  </div>
  </div>
</div>


<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.9";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>