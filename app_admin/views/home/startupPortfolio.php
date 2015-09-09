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
    <link rel="stylesheet" href="<?php echo static_url('css/stocknbar.css'); ?>">
    <link rel="stylesheet" href="<?php echo static_url('3rdparty/nvd3-1.8.1/nv.d3.css'); ?>">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <script type="text/javascript">alert("ie dobol");</script>
      <![endif]-->
  </head>
  <body>

    <nav class="navbar navbar-inverse snb-navbar"> <!-- class: navbar-fixed-top -->
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed snb-nav-btn" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Menu</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand snb-logo" href="#">Stock N' Bar</a>
          <span class="text-center snb-mobile"><h2 class="snb-text-logo">Stock N' Bar</h2></span>
          
        </div>
        <div id="navbar" class="collapse navbar-collapse snb-nav-mobile">
          <ul class="nav navbar-nav uppercase">
            <li class=""><a href="<?php echo base_url(); ?>">For Startups</a></li> <!-- class active -->
            <li><a href="<?php echo base_url(); ?>">For Investors</a></li>
            <li><a href="<?php echo base_url(); ?>">For Public</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="lowercase"><a href="<?php echo base_url(); ?>">contact : partner@stocknbar.com</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="snb-home-header">
      <div class="snb-opaque"></div>
      <div class="container">
        <div class="snb-container">
          <h1>Mari lihat bagaimana sistem kami akan berjalan</h1>
          <p class="lead">Kami menciptakan database yang dirancang untuk menyimpan setiap data perkembangan startup, <br /> portfolio yang di rilis akan memberikan gambaran dan putusan dalam investasi</p>
        </div>
      </div><!-- /.container -->
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="snb-title">
            <h1>Portfolio Startup</h1>
            <p>dibawah ini adalah contoh bagaimana sebuah startup akan dipantau oleh investor</p>
          </div>
        </div>

        <div class="col-md-3 col-sm-3">
          <ul class="nav nav-pills nav-stacked snb-user-menu">
            <li><a href="<?php echo base_url(); ?>">Profil Portfolio</a></li>
            <li><a href="<?php echo base_url(); ?>">Para Founder</a></li>
            <li><a href="<?php echo base_url(); ?>">Board of Directors</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Graph <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>">Permodalan</a></li>
                <li><a href="<?php echo base_url(); ?>">Perkembangan</a></li>
                <li><a href="<?php echo base_url(); ?>">Revenue</a></li>                        
              </ul>
            </li>
            <li><a href="<?php echo base_url(); ?>">Investor</a></li>
            <li><a href="<?php echo base_url(); ?>">Saham</a></li>
            <li><a href="<?php echo base_url(); ?>">Status Ekuitas</a></li>
          </ul>

          <div class="panel panel-default">
            <div class="panel-heading">
              <b>Berikan Feedback</b>
            </div>

            <div class="panel-body">
              <form method="post" action="<?php echo base_url('concept/feedback');?>" role="form">
                <div class="input-group">
                  <label for="feedback-email">Email:</label>
                  <input type="email" name="feedback_email" id="feedback-email" class="form-control" placeholder="Email">
                </div>
                <div class="input-group">
                   <label for="feedback-jenis">Jenis:</label>
                  <input type="text" name="feedback_jenis" id="feedback-jenis" class="form-control" placeholder="Jenis : (UI / UX / BUG / etc.)">
                </div>
                <div class="input-group">
                   <label for="feedback-feedback">Feedback:</label>
                  <textarea id="feedback-feedback" name="feedback_feedback" class="form-control" placeholder="Ketik feedback / saran anda disini"></textarea>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Kirim Feedback</button>
              </form>
            </div>

            <div class="panel-footer">
              Kirimkan feedback sebanyak-banyaknya. Setiap Feedback yang memenuhi kriteria dan di implementasikan akan kami bayar Rp 5.000,- tunai.
            </div>
          </div>
        </div>

        <div class="col-md-9 col-sm-9">

          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Stock N' Bar : SNB
                <span class="snb-stock-value text-right">Rp 230 &middot; ( 3.30 <i class="glyphicon glyphicon-chevron-up snb-green"></i> ) </span>
              </h3>
            </div>

            <div class="panel-body">
              <div class="col-md-2 col-md-offset-0 col-sm-4 col-sm-offset-4 col-xs-3 col-xs-offset-4">
                <img src="<?php echo static_url('images/icons/Icon@2x.png'); ?>">
              </div>

              <div class="col-md-10 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <p>Deskripsi</p>
                      </div>
                      <div class="col-md-10 col-sm-10 col-xs-12">
                        <p>Reveal urban startups and bring to the next investment for the great bussiness.</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <p>Kaa Kunci</p>
                      </div>
                      <div class="col-md-10 col-sm-10 col-xs-12">
                        <p>Jakarta &middot; Indonesia &middot; Investasi Startup &middot; International Startup Exchange &middot; Desktop</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <p>Pendanaan</p>
                      </div>
                      <div class="col-md-10 col-sm-10 col-xs-12">

                        <div class="panel panel-default">
                          <div class="panel-body">
                            <div class="row">
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p>Seed Funding :</p>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p>Rp 5.000.000.000</p>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p><span class="snb-status-stopped">Stopped</span></p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p>Series A :</p>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p>Rp 20.000.000.000</p>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p><span class="snb-status-stopped">On Board</span></p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p>Series B :</p>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p>-</p>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p><span class="snb-status-stopped">Not Yet</span></p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p>Series C :</p>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p>-</p>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p><span class="snb-status-stopped">Not Yet</span></p>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p>Final Stage :</p>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p>-</p>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p><span class="">Not Yet</span></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p>IPO Shares :</p>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p>-</p>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-4">
                                <p><span class="">Not Yet</span></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-2 col-sm-2 col-xs-12">
                        <p>Website</p>
                      </div>
                      <div class="col-md-10 col-sm-10 col-xs-12">
                        <p><a href="http://stocknbar.com">http://stocknbar.com/</a></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="panel-footer">
              <div id="chart1" style="height:400px;">
                <svg> </svg>
              </div>

              <button onclick="chart.focusEnable(!chart.focusEnable()); chart.update();">FOKUS</button>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Grafik Pertumbuhan</h3>
            </div>

            <div class="panel-body">
              <div class="col-md-12">
                <div id="chart2" style="height:400px;">
                  <svg> </svg>
                </div>
              </div>
            </div>

            <div class="panel-footer">
              <button onclick="chart2.focusEnable(!chart2.focusEnable()); chart2.update();">FOKUS</button>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Laporan tahunan</h3>
            </div>

            <div class="panel-body">
              <div class="col-md-3">
                Laporan Tahunan
              </div>

              <div class="col-md-9">
                <ul>
                  <li><a href="<?php echo base_url(); ?>">Unduh 2013 Annual Report</a></li>
                  <li><a href="<?php echo base_url(); ?>">Unduh 2014 Annual Report</a></li>
                  <li><a href="<?php echo base_url(); ?>">Unduh 2015 Annual Report</a></li>
                </ul>
              </div>
            </div>

            <div class="panel-footer">
            </div>
          </div>

        </div>
      </div>
    </div><!-- /.container -->

    <div class="snb-footer">
      <div class="container">
        <div class="row snb-footer-body">
          <div class="col-md-12 text-center snb-footer-head">
            <h2>Juga ada di Stock N' Bar</h2>
          </div>
          <div class="col-md-12 text-center snb-footer-navigation">
            <p>&copy; Stock N' Bar 2015</p>
          </div>
          <div class="col-md-12 text-center snb-footer-link">
            <a href="<?php echo base_url(); ?>" class="snb-flink">Layanan</a>
            <a href="<?php echo base_url(); ?>" class="snb-flink">Karir</a>
            <a href="<?php echo base_url(); ?>" class="snb-flink" rel="">Twitter</a>
            <a href="<?php echo base_url(); ?>" class="snb-flink" rel="">Facebook</a>
            <span class='snb-flink'>&middot;</span>
            <a href="<?php echo base_url(); ?>" class="snb-flink">API</a>
            <span class='snb-flink'>&middot;</span>
            <a href="<?php echo base_url(); ?>" class="snb-flink">Persetujuan</a>
            <a href="<?php echo base_url(); ?>" class="snb-flink">Resiko</a>
          </div>
        </div>
      </div><!-- /.container -->
    </div>

    <?php if ($message) { ?>
    <div class="modal fade" id="feedback-dialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Terima Kasih</h4>
          </div>
          <div class="modal-body">
            <p><?php echo $message; ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Oke</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <?php } ?>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.2/d3.min.js" charset="utf-8"></script>
    <script src="<?php echo static_url('3rdparty/nvd3-1.8.1/nv.d3.min.js'); ?>"></script>
    <script src="<?php echo static_url('js/index.js'); ?>"></script>

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