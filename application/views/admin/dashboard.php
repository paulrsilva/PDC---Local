<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $nome = $this->session->nome;
    $sobrenome = $_SESSION['sobrenome']; //usando a forma php para recuperar dados da sessão
    $email = $this->session->email;

    $statusconexao = "conectado";

} else {
        $statusconexao = "Desconetado!!";

        header("location: ./login");
} ?>

<?php $this->load->helper('url'); ?>

<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Dashboard Header -->
    <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    <div class="content-header content-header-media">
        <div class="header-section">
            <div class="row">
                <!-- Main Title (hidden on small devices for the statistics to fit) -->
                <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                    <h1><?php echo $PeriodoDoDia ?> <strong><?php echo $this->session->nome; ?> </strong><br><small>Sistema de Controle Eleitoral</small></h1>
                </div>
                <!-- END Main Title -->

                <!-- Top Stats -->
                <div class="col-md-8 col-lg-6">
                    <div class="row text-center">
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                                R$<strong><?php echo $orcamento ?></strong><br>
                                <small><i class="fa fa-money"></i> Orçamento</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                                <strong><?php echo $avaliacoes ?></strong><br>
                                <small><i class="fa fa-heart-o"></i> Avaliações</small>
                            </h2>
                        </div>
                        <div class="col-xs-4 col-sm-3">
                            <h2 class="animation-hatch">
                                <strong><?php echo $avisos ?></strong><br>
                                <small><i class="fa fa-calendar-o"></i> Avisos</small>
                            </h2>
                        </div>
                        <!-- We hide the last stat to fit the other 3 on small devices -->
                        <div class="col-sm-3 hidden-xs">
                            <h2 class="animation-hatch">
                                <strong><?php echo $PrevisaoTempo ?>&deg; C</strong><br>
                                <small><i class="fa fa-map-marker"></i> <?php echo $localizacao ?></small>
                            </h2>
                        </div>
                    </div>
                </div>
                <!-- END Top Stats -->
                <br>
                <p>

            </div>
        </div>
        <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
        
        <img src="<?php echo base_url().$cabecalho; ?>" alt="header image" class="animation-pulseSlow">
        
        <!-- status da parte de baixo header- adicionar partido e coligações -->
        
        
        <!-- Fim status da parte de baixo -->
    </div>
    
    <!-- END Dashboard Header -->

    <!-- Mini Top Stats Row -->
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="page_ready_article.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                        <i class="fa fa-file-text"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        Nova <strong>Campanha</strong><br>
                        <small>Mídias Sociais</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="page_comp_charts.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                        <i class="gi gi-usd"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong> R$ 0,00%</strong><br>
                        <small>Gestão Financeira</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="page_ready_inbox.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                        <i class="gi gi-envelope"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        5 <strong>Mensagens</strong>
                        <small>Comitês de Campanha</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="page_comp_gallery.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                        <i class="gi gi-eye_open"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        +2 <strong>Relatórios</strong>
                        <small>Avaliação Geomarketing</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6">
            <!-- Widget -->
            <a href="page_comp_charts.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                        <i class="gi gi-wallet"></i>
                    </div>
                    <div class="pull-right">
                        <!-- Jquery Sparkline (initialized in js/pages/index.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                        <span id="mini-chart-sales"></span>
                    </div>
                    <h3 class="widget-content animation-pullDown visible-lg">
                        Registro <strong>Histórico</strong>
                        <small>Iniciativas - Resultados</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6">
            <!-- Widget -->
            <a href="page_widgets_stats.php" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                        <i class="gi gi-stats"></i>
                    </div>
                    <div class="pull-right">
                        <!-- Jquery Sparkline (initialized in js/pages/index.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                        <span id="mini-chart-brand"></span>
                    </div>
                    <h3 class="widget-content animation-pullDown visible-lg">
                        Evolução <strong>de Campanha</strong>
                        <small>Aumento de Citações/Áreas </small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
    </div>
    <!-- END Mini Top Stats Row -->

    <!-- Widgets Row -->
    <div class="row">
        <div class="col-md-6">
            <!-- Timeline Widget -->
            <div class="widget">
                <div class="widget-extra themed-background-dark">
                    <div class="widget-options">
                        <div class="btn-group btn-group-xs">
                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit Widget"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Quick Settings"><i class="fa fa-cog"></i></a>
                        </div>
                    </div>
                    <h3 class="widget-content-light">
                        Últimas <strong>Notícias</strong>
                        <small><a href="page_ready_timeline.php"><strong>Ver tudo</strong></a></small>
                    </h3>
                </div>
                <div class="widget-extra">
                    <!-- Timeline Content -->
                    <div class="timeline">
                        <ul class="timeline-list">
                            <li class="active">
                               <div class="timeline-icon"><i class="gi gi-airplane"></i></div>
                               <div class="timeline-time"><small>sistema</small></div>
                               <div class="timeline-content">
                                   <p class="push-bit"><a href="index.php/dashboard/teste2"><strong>Testes de Sistema</strong></a></p>
                                   

                                    <?php var_dump($Candidato); ?>
                                    <br>

                                    <br>
                                   
                                    <img src="<?php echo base_url().$Usuario[foto]; ?>" alt="avatar"> <i class="fa fa-angle-down"></i>
                                    <?php// echo base_url().$Candidato[foto]; ?>
                                    <br>
                                    <img src="<?php echo base_url().$Candidato[foto]; ?>" style="width:100px;height:100px" alt="avatar">
                                    <?php //var_dump($Candidato["dadosDB"]); ?>
                                    <br>
                                    <?php var_dump($cabecalho); ?>
                                    <br>
                                    <?php echo $CandidatoDB->ApelidoPolitico; ?>
                                    <br>
                                    <?php var_dump($CandidatoDB); ?>
 
                               </div>
                            </li>
                            <li class="active">
                                <div class="timeline-icon"><i class="gi gi-airplane"></i></div>
                                <div class="timeline-time"><small>Agora</small></div>
                                <div class="timeline-content">
                                    <p class="push-bit"><a href="index.php/dashboard/teste"><strong>Jordan Carter</strong></a></p>
                                    <p class="push-bit">The trip was an amazing and a life changing experience!!</p>
                                    <p class="push-bit"><a href="page_ready_article.php" class="btn btn-xs btn-primary"><i class="fa fa-file"></i> Read the article</a></p>
                                    <div class="row push">
                                        <div class="col-sm-6 col-md-4">
                                            <a href="images/placeholders/photos/photo1.jpg" data-toggle="lightbox-image">
                                                <img src="images/placeholders/photos/photo1.jpg" alt="image">
                                            </a>
                                        </div>
                                        <div class="col-sm-6 col-md-4">
                                            <a href="images/placeholders/photos/photo22.jpg" data-toggle="lightbox-image">
                                                <img src="images/placeholders/photos/photo22.jpg" alt="image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="active">
                                <div class="timeline-icon themed-background-fire themed-border-fire"><i class="fa fa-file-text"></i></div>
                                <div class="timeline-time"><small>5 min atrás</small></div>
                                <div class="timeline-content">
                                    <p class="push-bit"><a href="page_ready_user_profile.php"><strong>Administrator</strong></a></p>
                                    <strong>Free courses</strong> for all our customers at A1 Conference Room - 9:00 <strong>am</strong> tomorrow!
                                </div>
                            </li>
                            <li class="active">
                                <div class="timeline-icon"><i class="gi gi-drink"></i></div>
                                <div class="timeline-time"><small>3 hours ago</small></div>
                                <div class="timeline-content">
                                    <p class="push-bit"><a href="page_ready_user_profile.php"><strong>Ella Winter</strong></a></p>
                                    <p class="push-bit"><strong>Happy Hour!</strong> Free drinks at <a href="javascript:void(0)">Cafe-Bar</a> all day long!</p>
                                    <div id="gmap-timeline" class="gmap"></div>
                                </div>
                            </li>
                            <li class="active">
                                <div class="timeline-icon"><i class="fa fa-cutlery"></i></div>
                                <div class="timeline-time"><small>yesterday</small></div>
                                <div class="timeline-content">
                                    <p class="push-bit"><a href="page_ready_user_profile.php"><strong>Patricia Woods</strong></a></p>
                                    <p class="push-bit">Today I had the lunch of my life! It was delicious!</p>
                                    <div class="row push">
                                        <div class="col-sm-6 col-md-4">
                                            <a href="images/placeholders/photos/photo23.jpg" data-toggle="lightbox-image">
                                                <img src="images/placeholders/photos/photo23.jpg" alt="image">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="active">
                                <div class="timeline-icon themed-background-fire themed-border-fire"><i class="fa fa-smile-o"></i></div>
                                <div class="timeline-time"><small>2 days ago</small></div>
                                <div class="timeline-content">
                                    <p class="push-bit"><a href="page_ready_user_profile.php"><strong>Administrator</strong></a></p>
                                    To thank you all for your support we would like to let you know that you will receive free feature updates for life! You are awesome!
                                </div>
                            </li>
                            <li class="active">
                                <div class="timeline-icon"><i class="fa fa-pencil"></i></div>
                                <div class="timeline-time"><small>1 week ago</small></div>
                                <div class="timeline-content">
                                    <p class="push-bit"><a href="page_ready_user_profile.php"><strong>Nicole Ward</strong></a></p>
                                    <p class="push-bit">Consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate.</p>
                                    Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum.
                                </div>
                            </li>
                            <li class="text-center">
                                <a href="javascript:void(0)" class="btn btn-xs btn-default">View more..</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END Timeline Content -->
                </div>
            </div>
            <!-- END Timeline Widget -->
        </div>
        <div class="col-md-6">
            <!-- Your Plan Widget -->
            <div class="widget">
                <div class="widget-extra themed-background-dark">
                    <div class="widget-options">
                        <div class="btn-group btn-group-xs">
                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit Widget"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Quick Settings"><i class="fa fa-cog"></i></a>
                        </div>
                    </div>
                    <h3 class="widget-content-light">
                        Sistema de <strong>Gestão</strong>
                        <small><a href="page_ready_pricing_tables.php"><strong>Acessar</strong></a></small>
                    </h3>
                </div>
                <div class="widget-extra-full">
                    <div class="row text-center">
                        <div class="col-xs-6 col-lg-3">
                            <h3>
                                <strong>0</strong> <small>/50</small><br>
                                <small><i class="fa fa-folder-open-o"></i> Projetos</small>
                            </h3>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <h3>
                                <strong>25</strong> <small>/100GB</small><br>
                                <small><i class="fa fa-hdd-o"></i> Dados</small>
                            </h3>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <h3>
                                <strong>2</strong> <small>/10k</small><br>
                                <small><i class="fa fa-users"></i> Mob.</small>
                            </h3>
                        </div>
                        <div class="col-xs-6 col-lg-3">
                            <h3>
                                <strong>2</strong> <small>k</small><br>
                                <small><i class="fa fa-envelope-o"></i> Emails</small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Your Plan Widget -->

            <!-- Charts Widget -->
            <div class="widget">
                <div class="widget-advanced widget-advanced-alt">
                    <!-- Widget Header -->
                    <div class="widget-header text-center themed-background">
                        <h3 class="widget-content-light text-left pull-left animation-pullDown">
                            <strong>Intenção de Voto</strong> &amp; <strong> Citações</strong><br>
                            <small>último semestre</small>
                        </h3>
                        <!-- Flot Charts (initialized in js/pages/index.js), for more examples you can check out http://www.flotcharts.org/ -->
                        <div id="dash-widget-chart" class="chart"></div>
                    </div>
                    <!-- END Widget Header -->

                    <!-- Widget Main -->
                    <div class="widget-main">
                        <div class="row text-center">
                            <div class="col-xs-4">
                                <h3 class="animation-hatch"><strong>4.800</strong><br><small>Votos Potenciais</small></h3>
                            </div>
                            <div class="col-xs-4">
                                <h3 class="animation-hatch"><strong>5.500</strong><br><small>Votos Necessários</small></h3>
                            </div>
                            <div class="col-xs-4">
                                <h3 class="animation-hatch">R$ <strong>42.850</strong><br><small>Valor de Churnning</small></h3>
                            </div>
                        </div>
                    </div>
                    <!-- END Widget Main -->
                </div>
            </div>
            <!-- END Charts Widget -->

            <!-- Weather Widget -->
            <div class="widget">
                <div class="widget-advanced widget-advanced-alt">
                    <!-- Widget Header -->
                    <div class="widget-header text-left">
                        <!-- For best results use an image with at least 150 pixels in height (with the width relative to how big your widget will be!) - Here I'm using a 1200x150 pixels image -->
                        <img src="images/placeholders/headers/widget5_header.jpg" alt="background" class="widget-background animation-pulseSlow">
                        <h3 class="widget-content widget-content-image widget-content-light clearfix">
                            <span class="widget-icon pull-right">
                                <i class="fa fa-sun-o animation-pulse"></i>
                            </span>
                            Weather <strong>Station</strong><br>
                            <small><i class="fa fa-location-arrow"></i> The Mountain</small>
                        </h3>
                    </div>
                    <!-- END Widget Header -->

                    <!-- Widget Main -->
                    <div class="widget-main">
                        <div class="row text-center">
                            <div class="col-xs-6 col-lg-3">
                                <h3>
                                    <strong>10&deg;</strong> <small>C</small><br>
                                    <small>Sunny</small>
                                </h3>
                            </div>
                            <div class="col-xs-6 col-lg-3">
                                <h3>
                                    <strong>80</strong> <small>%</small><br>
                                    <small>Humidity</small>
                                </h3>
                            </div>
                            <div class="col-xs-6 col-lg-3">
                                <h3>
                                    <strong>60</strong> <small>km/h</small><br>
                                    <small>Wind</small>
                                </h3>
                            </div>
                            <div class="col-xs-6 col-lg-3">
                                <h3>
                                    <strong>5</strong> <small>km</small><br>
                                    <small>Visibility</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!-- END Widget Main -->
                </div>
            </div>
            <!-- END Weather Widget-->

            <!-- Advanced Gallery Widget -->
            <div class="widget">
                <div class="widget-advanced">
                    <!-- Widget Header -->
                    <div class="widget-header text-center themed-background-dark">
                        <h3 class="widget-content-light clearfix">
                            Awesome <strong>Gallery</strong><br>
                            <small>4 Photos</small>
                        </h3>
                    </div>
                    <!-- END Widget Header -->

                    <!-- Widget Main -->
                    <div class="widget-main">
                        <a href="page_comp_gallery.php" class="widget-image-container">
                            <span class="widget-icon themed-background"><i class="gi gi-picture"></i></span>
                        </a>
                        <div class="gallery gallery-widget" data-toggle="lightbox-gallery">
                            <div class="row">
                                <div class="col-xs-6 col-sm-3">
                                    <a href="images/placeholders/photos/photo15.jpg" class="gallery-link" title="Image Info">
                                        <img src="images/placeholders/photos/photo15.jpg" alt="image">
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <a href="images/placeholders/photos/photo5.jpg" class="gallery-link" title="Image Info">
                                        <img src="images/placeholders/photos/photo5.jpg" alt="image">
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <a href="images/placeholders/photos/photo6.jpg" class="gallery-link" title="Image Info">
                                        <img src="images/placeholders/photos/photo6.jpg" alt="image">
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <a href="images/placeholders/photos/photo13.jpg" class="gallery-link" title="Image Info">
                                        <img src="images/placeholders/photos/photo13.jpg" alt="image">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Widget Main -->
                </div>
            </div>
            <!-- END Advanced Gallery Widget -->
        </div>
    </div>
    <!-- END Widgets Row -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>

<!-- Remember to include excanvas for IE8 chart support -->
<!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

<?php include 'inc/template_scripts.php'; ?>

<!-- Google Maps API + Gmaps Plugin, must be loaded in the page you would like to use maps (Remove 'http:' if you have SSL) -->
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="js/helpers/gmaps.min.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/index.js"></script>
<script>$(function(){ Index.init(); });</script>

<?php include 'inc/template_end.php'; ?>