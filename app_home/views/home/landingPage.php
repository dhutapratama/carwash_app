<!DOCTYPE html>
<html lang="<?php echo lang('snb'); ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="initial-scale=1.0,maximum-scale=2.0,width=device-width" name="viewport">
    
    <title><?php echo lang('snb_site_title'); ?></title>

    <meta name="google-site-verification" content="<?php echo google_verify(); ?>">
    <meta name="google" content="notranslate">
    <meta name="detectify-verification" content="<?php echo detectify_verify(); ?>">
    <meta name="description" content="<?php echo lang('snb_seo_description'); ?>">
    <meta name="keywords" content="<?php echo lang('snb_seo_keyword'); ?>">

    <link href="<?php echo base_url(); ?>" rel="canonical">

    <meta property="og:image" name="image" content="<?php echo static_url('images/stocknbar-big.png'); ?>">
    <meta property="og:site_name" content="<?php echo lang('snb_site_name'); ?>">
    <meta property="og:title" content="<?php echo lang('snb_title'); ?>">
    <meta property="og:description" content="<?php echo lang('snb_seo_description'); ?>">
    <meta property="og:url" content="<?php echo site_url(); ?>">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@dhutap">
    <meta name="twitter:creator" content="@dhutap"/>
    <meta name="twitter:title" content="<?php echo lang('snb_title'); ?>">
    <meta name="twitter:description" content="<?php echo lang('snb_seo_description'); ?>">
    <meta name="twitter:image:src" content="<?php echo static_url('images/stocknbar-big.png'); ?>">

    <link rel="shortcut icon" href="<?php echo static_url('images/favicon.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php echo static_url('images/icons/Icon.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo static_url('images/icons/Icon-72.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo static_url('images/icons/Icon@2x.png'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo static_url('images/icons/Icon-72@2x.png'); ?>">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo static_url('3rdparty/normalize-3.0.2/normalize.css'); ?>">
    <link rel="stylesheet" href="<?php echo static_url('css/stocknbar-1st.css'); ?>">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script type="text/javascript">alert("ie dobol");</script>
      <![endif]-->
  </head>
  <body>
    <div class="container snb-home">
      <div class="text-center">
        <img src="<?php echo static_url('images/stocknbar-big.png'); ?>" class="snb-logo" alt="Stock N' Bar big logo"><span class="snb-text-logo" id="snb-text-logo"></span>
      </div>
      <div class="row">

        <div class="col-md-8 col-md-offset-2">

          <h3 class="snb-title-mvp" id="snb-slogan"><?php echo lang('snb_slogan'); ?></h3>
          <div class="snb-concept">
            <p class="snb-lead" id="snb-concept-1" style="display:none;"><?php echo lang('snb_concept_1'); ?></p>
            <p class="snb-lead" id="snb-concept-2" style="display:none;"><?php echo lang('snb_concept_2'); ?></p>
            <p class="snb-lead" id="snb-concept-3" style="display:none;"><?php echo lang('snb_concept_3'); ?></p>
            <p class="snb-lead" id="snb-concept-4" style="display:none;"><?php echo lang('snb_concept_4'); ?></p>
            <div class="snb-lead text-center" id="snb-concept-5" style="display:none;">
              <a href="<?php echo base_url('concept') ?>" class="btn btn-success btn-lg snb-link-h1"><?php echo lang('snb_concept_5'); ?></a>
            </div>
          </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
          <p class="snb-registration-message text-center" id="snb-registration-message"><?php
            if ($this->session->userdata('invitation_status') == 'registered') {
              echo lang('snb_you_are_registered');
            }
          ?></p>
          <?php
          if ($this->session->userdata('invitation_status') == '') { ?>
          <form id="snb-form">
            <div class="snb-checkbox text-center">
              <?php echo lang('snb_you_are'); ?>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="invitation_type" id="invitation_type" value="startup" checked>
                  <?php echo lang('snb_startup'); ?>
                </label>
              </div>
              <div class="radio-inline">
                <label>
                  <input type="radio" name="invitation_type" id="invitation_type" value="investor">
                  <?php echo lang('snb_investor'); ?>
                </label>
              </div>
            </div>
            <div class="form-group col-md-8">
              <input type="email" class="form-control" id="email" name="email" placeholder="your_email@address.com" required>
            </div>
            <button type="submit" class="btn btn-info col-md-3 col-xs-12"><?php echo lang('snb_register'); ?></button>
          </form>

          <?php } ?>
        </div>

        <div class="col-md-offset-2">
        </div>

        <div class="col-md-8 col-md-offset-2">
          <p class="snb-warning text-center" id="snb-warning"></p>
        </div>

        <div class="col-md-offset-2"></div>

        <div class="col-md-8 col-md-offset-2">
          <div class="snb-qty-subscriber">
            <p class="snb-footer text-center"><?php echo lang('snb_total_registered'); ?></p>
          </div>
        </div>

        <div class="col-md-4 col-xs-6 col-md-offset-2">

            <div class="snb-quantity text-center" id="snb-total-startups"><?php echo $total_startups; ?></div>
            <div class="snb-signup-type text-center"><?php echo lang('snb_startups'); ?></div>

        </div>
        
        <div class="col-md-offset-2"></div>

        <div class="col-md-4 col-xs-6">

            <div class="snb-quantity text-center" id="snb-total-investors"><?php echo $total_investors; ?></div>
            <div class="snb-signup-type text-center"><?php echo lang('snb_investors'); ?></div>

        </div>

        <div class="col-md-offset-2"></div>

        <div class="col-md-8 col-md-offset-2 snb-page-footer">
          <p class="text-center"><?php echo lang('snb_footer'); ?></p>
          <p class="snb-link text-center"><a href="<?php echo site_url('language/ID') ?>">Bahasa Indonesia</a> - <a href="<?php echo site_url('language/EN') ?>">English</a> - <a href="<?php echo site_url('language/FR') ?>">Le Français</a></p>
        </div>
        <div class="col-md-offset-2"></div>
      </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="<?php echo static_url('3rdparty/shuffleLetters/js/jquery.shuffleLetters.js'); ?>"></script>
    <script src="<?php echo static_url('js/1st-landing-page.js'); ?>"></script>
<?php if ($_SERVER['HTTP_HOST'] == 'stocknbar.com' OR $_SERVER['HTTP_HOST'] == 'www.stocknbar.com') { ?>
    <script src="//load.sumome.com/" data-sumo-site-id="70f35fe334c40b56634b3c5d3abe188a4cf5d2a71f6f6456f0defe1a3c091143" async="async"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-66886995-1', 'auto');
      ga('send', 'pageview');

    </script>
<?php } ?>
  </Body>
</html>