<?php
/**
 * page_head.php
 *
 * Author: pixelcave
 *
 * Header and Sidebar of each page
 *
 */
$this->load->helper('url');
?>

<!-- Preloader -->
<!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
<!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in body element (HTML version) -->
<div class="preloader themed-background">
    <h1 class="push-top-bottom text-light text-center"><strong>PDC</strong> Admin</h1>
    <div class="inner">
        <h3 class="text-light visible-lt-ie9 visible-lt-ie10"><strong>Loading..</strong></h3>
        <div class="preloader-spinner hidden-lt-ie9 hidden-lt-ie10"></div>
    </div>
</div>
<!-- END Preloader -->

<!-- Page Container -->
<!-- In the PHP version you can set the following options from inc/config file -->
<!--
    Available #page-container classes:

    '' (None)                                       for a full main and alternative sidebar hidden by default (> 991px)

    'sidebar-visible-lg'                            for a full main sidebar visible by default (> 991px)
    'sidebar-partial'                               for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
    'sidebar-partial sidebar-visible-lg'            for a partial main sidebar which opens on mouse hover, visible by default (> 991px)

    'sidebar-alt-visible-lg'                        for a full alternative sidebar visible by default (> 991px)
    'sidebar-alt-partial'                           for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
    'sidebar-alt-partial sidebar-alt-visible-lg'    for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)

    'sidebar-partial sidebar-alt-partial'           for both sidebars partial which open on mouse hover, hidden by default (> 991px)

    'sidebar-no-animations'                         add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!

    'style-alt'                                     for an alternative main style (without it: the default style)
    'footer-fixed'                                  for a fixed footer (without it: a static footer)

    'disable-menu-autoscroll'                       add this to disable the main menu auto scrolling when opening a submenu

    'header-fixed-top'                              has to be added only if the class 'navbar-fixed-top' was added on header.navbar
    'header-fixed-bottom'                           has to be added only if the class 'navbar-fixed-bottom' was added on header.navbar
-->
<?php
    $page_classes = '';

    if ($template['header'] == 'navbar-fixed-top') {
        $page_classes = 'header-fixed-top';
    } else if ($template['header'] == 'navbar-fixed-bottom') {
        $page_classes = 'header-fixed-bottom';
    }

    if ($template['sidebar']) {
        $page_classes .= (($page_classes == '') ? '' : ' ') . $template['sidebar'];
    }

    if ($template['main_style'] == 'style-alt')  {
        $page_classes .= (($page_classes == '') ? '' : ' ') . 'style-alt';
    }

    if ($template['footer'] == 'footer-fixed')  {
        $page_classes .= (($page_classes == '') ? '' : ' ') . 'footer-fixed';
    }

    if (!$template['menu_scroll'])  {
        $page_classes .= (($page_classes == '') ? '' : ' ') . 'disable-menu-autoscroll';
    }
?>
<div id="page-container"<?php if ($page_classes) { echo ' class="' . $page_classes . '"'; } ?>>
    <!-- Alternative Sidebar -->
    <div id="sidebar-alt">
        <!-- Wrapper for scrolling functionality -->
        <div class="sidebar-scroll">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Chat -->
                <!-- Chat demo functionality initialized in js/app.js -> chatUi() -->
                <a href="page_ready_chat.php" class="sidebar-title">
                    <i class="gi gi-comments pull-right"></i> <strong>Mob.</strong>Campanha
                </a>
                <!-- Chat Users -->
                <ul class="chat-users clearfix">
                    <li>
                        <a href="javascript:void(0)" class="chat-user-online">
                            <span></span>
                            <img src="<?php echo base_url(); ?>images/placeholders/avatars/avatar12.jpg" alt="avatar" class="img-circle">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="chat-user-online">
                            <span></span>
                            <img src="<?php echo base_url(); ?>images/placeholders/avatars/avatar15.jpg" alt="avatar" class="img-circle">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="chat-user-online">
                            <span></span>
                            <img src="<?php echo base_url(); ?>images/placeholders/avatars/avatar10.jpg" alt="avatar" class="img-circle">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="chat-user-online">
                            <span></span>
                            <img src="<?php echo base_url(); ?>images/placeholders/avatars/avatar4.jpg" alt="avatar" class="img-circle">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="chat-user-away">
                            <span></span>
                            <img src="<?php echo base_url(); ?>images/placeholders/avatars/avatar7.jpg" alt="avatar" class="img-circle">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="chat-user-away">
                            <span></span>
                            <img src="<?php echo base_url(); ?>images/placeholders/avatars/avatar9.jpg" alt="avatar" class="img-circle">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="chat-user-busy">
                            <span></span>
                            <img src="<?php echo base_url(); ?>images/placeholders/avatars/avatar16.jpg" alt="avatar" class="img-circle">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span></span>
                            <img src="<?php echo base_url(); ?>images/placeholders/avatars/avatar1.jpg" alt="avatar" class="img-circle">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span></span>
                            <img src="<?php echo base_url(); ?>images/placeholders/avatars/avatar4.jpg" alt="avatar" class="img-circle">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span></span>
                            <img src="<?php echo base_url(); ?>images/placeholders/avatars/avatar3.jpg" alt="avatar" class="img-circle">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span></span>
                            <img src="<?php echo base_url(); ?>images/placeholders/avatars/avatar13.jpg" alt="avatar" class="img-circle">
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <span></span>
                            <img src="<?php echo base_url(); ?>images/placeholders/avatars/avatar5.jpg" alt="avatar" class="img-circle">
                        </a>
                    </li>
                </ul>
                <!-- END Chat Users -->

                <!-- Chat Talk -->
                <div class="chat-talk display-none">
                    <!-- Chat Info -->
                    <div class="chat-talk-info sidebar-section">
                        <img src="<?php echo base_url(); ?>images/placeholders/avatars/AvatarFGz.jpg" alt="avatar" class="img-circle pull-left">
                        <strong>Francisco Garcez</strong> 45145
                        <button id="chat-talk-close-btn" class="btn btn-xs btn-default pull-right">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    <!-- END Chat Info -->

                    <!-- Chat Messages -->
                    <ul class="chat-talk-messages">
                        <li class="text-center"><small>Ontem, 18:35</small></li>
                        <li class="chat-talk-msg animation-slideRight">Olá Francisco?</li>
                        <li class="chat-talk-msg animation-slideRight">Olá. O sistema está funcionando?</li>
                        <li class="text-center"><small>Hoje, 7:10</small></li>
                        <li class="chat-talk-msg chat-talk-msg-highlight themed-border animation-slideLeft">Parece que sim.!</li>
                    </ul>
                    <!-- END Chat Messages -->

                    <!-- Chat Input -->
                    <form action="index.php" method="post" id="sidebar-chat-form" class="chat-form">
                        <input type="text" id="sidebar-chat-message" name="sidebar-chat-message" class="form-control form-control-borderless" placeholder="Type a message..">
                    </form>
                    <!-- END Chat Input -->
                </div>
                <!--  END Chat Talk -->
                <!-- END Chat -->

                <!-- Activity -->
                <a href="javascript:void(0)" class="sidebar-title">
                    <i class="fa fa-globe pull-right"></i> <strong>Atividade</strong>UI
                </a>
                <div class="sidebar-section">
                    <div class="alert alert-danger alert-alt">
                        <small>Agora</small><br>
                        <i class="fa fa-thumbs-up fa-fw"></i> Atualize seus dados
                    </div>
                    <div class="alert alert-info alert-alt">
                        <small>2 horas atrás</small><br>
                        <i class="gi gi-coins fa-fw"></i> Nova Busca no Youtube!
                    </div>
                    <div class="alert alert-success alert-alt">
                        <small>3 horas atrás/small><br>
                        <i class="fa fa-plus fa-fw"></i> <a href="page_ready_user_profile.php"><strong><?php echo $nome ?></strong></a> Nova solicitação de amizade!<br>
                        <a href="javascript:void(0)" class="btn btn-xs btn-primary"><i class="fa fa-check"></i> Aceitar</a>
                        <a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Ignorar</a>
                    </div>
                    <div class="alert alert-warning alert-alt">
                        <small>2 dias atrás</small><br>
                        Notificação <br><strong>Blog.</strong> Fora do Ar<br>
                        <a href="page_ready_pricing_tables.php" class="btn btn-xs btn-primary"><i class="fa fa-arrow-up"></i> Avaliar</a>
                    </div>
                </div>
                <!-- END Activity -->

                <!-- Messages -->
                <a href="page_ready_inbox.php" class="sidebar-title">
                    <i class="fa fa-envelope pull-right"></i> <strong>Mensagens</strong>UI (5)
                </a>
                <div class="sidebar-section">
                    <div class="alert alert-alt">
                        Debra Stanley<small class="pull-right">Agora</small><br>
                        <a href="page_ready_inbox_message.php"><strong>Novo Seguidor</strong></a>
                    </div>
                    <div class="alert alert-alt">
                        Sarah Cole<small class="pull-right">2 min.</small><br>
                        <a href="page_ready_inbox_message.php"><strong>Sua assinatura foi atualizada</strong></a>
                    </div>
                    <div class="alert alert-alt">
                        Bryan Porter<small class="pull-right">10 min</small><br>
                        <a href="page_ready_inbox_message.php"><strong>Aumento de #hashtags</strong></a>
                    </div>
                    <div class="alert alert-alt">
                        Jose Duncan<small class="pull-right">30 min ago</small><br>
                        <a href="page_ready_inbox_message.php"><strong>Conta Ativada</strong></a>
                    </div>
                    <div class="alert alert-alt">
                        Henry Ellis<small class="pull-right">40 min ago</small><br>
                        <a href="page_ready_inbox_message.php"><strong>You reached 10.000 Followers!</strong></a>
                    </div>
                </div>
                <!-- END Messages -->
            </div>
            <!-- END Sidebar Content -->
        </div>
        <!-- END Wrapper for scrolling functionality -->
    </div>
    <!-- END Alternative Sidebar -->

    <!-- Main Sidebar -->
    <div id="sidebar">
        <!-- Wrapper for scrolling functionality -->
        <div class="sidebar-scroll">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Brand -->
                <a href="<?php echo base_url(); ?>" class="sidebar-brand">
                    <i class="gi gi-group"></i><strong>PDC</strong> Controle
                </a>
                <!-- END Brand -->

                <!-- User Info -->
                <div class="sidebar-section sidebar-user clearfix">
                    <div class="sidebar-user-avatar">
                        <a href="user_profile">
                            <img src="<?php echo base_url(); ?>images/placeholders/avatars/AvatarFGz.jpg" alt="avatar">
                        </a>
                    </div>
                    <div class="sidebar-user-name"><?php echo 'F.Garcez 45145' ?></div>
                    <div class="sidebar-user-links">
                        <a href="user_profile" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                        <a href="inbox" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                        <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.php in PHP version) -->
                        <a href="#modal-user-settings" data-toggle="modal" class="enable-tooltip" data-placement="bottom" title="Settings"><i class="gi gi-cogwheel"></i></a>
                        <a href="dashboard/logout" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                    </div>
                </div>
                <!-- END User Info -->

                <!-- Theme Colors -->
                <!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->
                <ul class="sidebar-section sidebar-themes clearfix">
                    <li class="active">
                        <a href="javascript:void(0)" class="themed-background-dark-default themed-border-default" data-theme="default" data-toggle="tooltip" title="Default Blue"></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-dark-night themed-border-night" data-theme="<?php echo base_url(); ?>css/themes/night.css" data-toggle="tooltip" title="Night"></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-dark-amethyst themed-border-amethyst" data-theme="<?php echo base_url(); ?>css/themes/amethyst.css" data-toggle="tooltip" title="Amethyst"></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-dark-modern themed-border-modern" data-theme="<?php echo base_url(); ?>css/themes/modern.css" data-toggle="tooltip" title="Modern"></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-dark-autumn themed-border-autumn" data-theme="<?php echo base_url(); ?>css/themes/autumn.css" data-toggle="tooltip" title="Autumn"></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-dark-flatie themed-border-flatie" data-theme="<?php echo base_url(); ?>css/themes/flatie.css" data-toggle="tooltip" title="Flatie"></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-dark-spring themed-border-spring" data-theme="<?php echo base_url(); ?>css/themes/spring.css" data-toggle="tooltip" title="Spring"></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-dark-fancy themed-border-fancy" data-theme="<?php echo base_url(); ?>css/themes/fancy.css" data-toggle="tooltip" title="Fancy"></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-dark-fire themed-border-fire" data-theme="<?php echo base_url(); ?>css/themes/fire.css" data-toggle="tooltip" title="Fire"></a>
                    </li>
                </ul>
                <!-- END Theme Colors -->

                <?php if ($primary_nav) { ?>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <?php foreach( $primary_nav as $key => $link ) {
                        $link_class = '';
                        $li_active  = '';
                        $menu_link  = '';

                        // Get 1st level link's vital info
                        $url        = (isset($link['url']) && $link['url']) ? $link['url'] : '#';
                        $active     = (isset($link['url']) && ($template['active_page'] == $link['url'])) ? ' active' : '';
                        $icon       = (isset($link['icon']) && $link['icon']) ? '<i class="' . $link['icon'] . ' sidebar-nav-icon"></i>' : '';

                        // Check if the link has a submenu
                        if (isset($link['sub']) && $link['sub']) {
                            // Since it has a submenu, we need to check if we have to add the class active
                            // to its parent li element (only if a 2nd or 3rd level link is active)
                            foreach ($link['sub'] as $sub_link) {
                                if (in_array($template['active_page'], $sub_link)) {
                                    $li_active = ' class="active"';
                                    break;
                                }

                                // 3rd level links
                                if (isset($sub_link['sub']) && $sub_link['sub']) {
                                    foreach ($sub_link['sub'] as $sub2_link) {
                                        if (in_array($template['active_page'], $sub2_link)) {
                                            $li_active = ' class="active"';
                                            break;
                                        }
                                    }
                                }
                            }

                            $menu_link = 'sidebar-nav-menu';
                        }

                        // Create the class attribute for our link
                        if ($menu_link || $active) {
                            $link_class = ' class="'. $menu_link . $active .'"';
                        }
                    ?>
                    <?php if ($url == 'header') { // if it is a header and not a link ?>
                    <li class="sidebar-header">
                        <?php if (isset($link['opt']) && $link['opt']) { // If the header has options set ?>
                        <span class="sidebar-header-options clearfix"><?php echo $link['opt']; ?></span>
                        <?php } ?>
                        <span class="sidebar-header-title"><?php echo $link['name']; ?></span>
                    </li>
                    <?php } else { // If it is a link ?>
                    <li<?php echo $li_active; ?>>
                        <a href="<?php echo $url; ?>"<?php echo $link_class; ?>><?php if (isset($link['sub']) && $link['sub']) { // if the link has a submenu ?><i class="fa fa-angle-left sidebar-nav-indicator"></i><?php } echo $icon . $link['name']; ?></a>
                        <?php if (isset($link['sub']) && $link['sub']) { // if the link has a submenu ?>
                        <ul>
                            <?php foreach ($link['sub'] as $sub_link) {
                                $link_class = '';
                                $li_active = '';
                                $submenu_link = '';

                                // Get 2nd level link's vital info
                                $url        = (isset($sub_link['url']) && $sub_link['url']) ? $sub_link['url'] : '#';
                                $active     = (isset($sub_link['url']) && ($template['active_page'] == $sub_link['url'])) ? ' active' : '';

                                // Check if the link has a submenu
                                if (isset($sub_link['sub']) && $sub_link['sub']) {
                                    // Since it has a submenu, we need to check if we have to add the class active
                                    // to its parent li element (only if a 3rd level link is active)
                                    foreach ($sub_link['sub'] as $sub2_link) {
                                        if (in_array($template['active_page'], $sub2_link)) {
                                            $li_active = ' class="active"';
                                            break;
                                        }
                                    }

                                    $submenu_link = 'sidebar-nav-submenu';
                                }

                                if ($submenu_link || $active) {
                                    $link_class = ' class="'. $submenu_link . $active .'"';
                                }
                            ?>
                            <li<?php echo $li_active; ?>>
                                <a href="<?php echo $url; ?>"<?php echo $link_class; ?>><?php if (isset($sub_link['sub']) && $sub_link['sub']) { ?><i class="fa fa-angle-left sidebar-nav-indicator"></i><?php } echo $sub_link['name']; ?></a>
                                <?php if (isset($sub_link['sub']) && $sub_link['sub']) { ?>
                                    <ul>
                                        <?php foreach ($sub_link['sub'] as $sub2_link) {
                                            // Get 3rd level link's vital info
                                            $url    = (isset($sub2_link['url']) && $sub2_link['url']) ? $sub2_link['url'] : '#';
                                            $active = (isset($sub2_link['url']) && ($template['active_page'] == $sub2_link['url'])) ? ' class="active"' : '';
                                        ?>
                                        <li>
                                            <a href="<?php echo $url; ?>"<?php echo $active ?>><?php echo $sub2_link['name']; ?></a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </li>
                    <?php } ?>
                    <?php } ?>
                </ul>
                <!-- END Sidebar Navigation -->
                <?php } ?>

                <!-- Sidebar Notifications -->
                <div class="sidebar-header">
                    <span class="sidebar-header-options clearfix">
                        <a href="javascript:void(0)" data-toggle="tooltip" title="Refresh"><i class="gi gi-refresh"></i></a>
                    </span>
                    <span class="sidebar-header-title">Atividade</span>
                </div>
                <div class="sidebar-section">
                    <div class="alert alert-success alert-alt">
                        <small>5 min ago</small><br>
                        <i class="fa fa-facebook-square"></i> Novas Curtidas (7)
                    </div>
                    <div class="alert alert-info alert-alt">
                        <small>10 min ago</small><br>
                        <i class="fa fa-arrow-up fa-fw"></i> Perfil Atualizado
                    </div>
                    <div class="alert alert-warning alert-alt">
                        <small>3 hours ago</small><br>
                        <i class="fa fa-exclamation fa-fw"></i> Notificação<br><strong>Página fora do Ar</strong> Blog
                    </div>
                    <div class="alert alert-danger alert-alt">
                        <small>Ontem</small><br>
                        <i class="fa fa-bug fa-fw"></i> <a href="https://www.youtube.com/watch?v=vtETq5Ii0xM)"><strong>Detratação Via Youtube</strong></a>
                    </div>
                </div>
                <!-- END Sidebar Notifications -->
            </div>
            <!-- END Sidebar Content -->
        </div>
        <!-- END Wrapper for scrolling functionality -->
    </div>
    <!-- END Main Sidebar -->

    <!-- Main Container -->
    <div id="main-container">
        <!-- Header -->
        <!-- In the PHP version you can set the following options from inc/config file -->
        <!--
            Available header.navbar classes:

            'navbar-default'            for the default light header
            'navbar-inverse'            for an alternative dark header

            'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

            'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
        -->
        <header class="navbar<?php if ($template['header_navbar']) { echo ' ' . $template['header_navbar']; } ?><?php if ($template['header']) { echo ' '. $template['header']; } ?>">
            <?php if ( $template['header_content'] == 'horizontal-menu' ) { // Horizontal Menu Header Content ?>
            <!-- Navbar Header -->
            <div class="navbar-header">
                <!-- Horizontal Menu Toggle + Alternative Sidebar Toggle Button, Visible only in small screens (< 768px) -->
                <ul class="nav navbar-nav-custom pull-right visible-xs">
                    <li>
                        <a href="javascript:void(0)" data-toggle="collapse" data-target="#horizontal-menu-collapse">Menu</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt');">
                            <i class="gi gi-share_alt"></i>
                            <span class="label label-primary label-indicator animation-floating">4</span>
                        </a>
                    </li>
                </ul>
                <!-- END Horizontal Menu Toggle + Alternative Sidebar Toggle Button -->

                <!-- Main Sidebar Toggle Button -->
                <ul class="nav navbar-nav-custom">
                    <li>
                        <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');">
                            <i class="fa fa-bars fa-fw"></i>
                        </a>
                    </li>
                </ul>
                <!-- END Main Sidebar Toggle Button -->
            </div>
            <!-- END Navbar Header -->

            <!-- Alternative Sidebar Toggle Button, Visible only in large screens (> 767px) -->
            <ul class="nav navbar-nav-custom pull-right hidden-xs">
                <li>
                    <!-- If you do not want the main sidebar to open when the alternative sidebar is closed, just remove the second parameter: App.sidebar('toggle-sidebar-alt'); -->
                    <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt', 'toggle-other');">
                        <i class="gi gi-share_alt"></i>
                        <span class="label label-primary label-indicator animation-floating">4</span>
                    </a>
                </li>
            </ul>
            <!-- END Alternative Sidebar Toggle Button -->

            <!-- Horizontal Menu + Search -->
            <div id="horizontal-menu-collapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="javascript:void(0)">Home</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Perfil</a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Configurações <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)"><i class="fa fa-asterisk fa-fw pull-right"></i> Geral</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-lock fa-fw pull-right"></i> Segurança</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-user fa-fw pull-right"></i> Conta</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-magnet fa-fw pull-right"></i> Equipe</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a href="javascript:void(0)" tabindex="-1"><i class="fa fa-chevron-right fa-fw pull-right"></i> Conf.Adicionais</a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)" tabindex="-1">Campanha</a></li>
                                    <li><a href="javascript:void(0)">Redes Sociais</a></li>
                                    <li><a href="javascript:void(0)">Páginas</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-submenu">
                                        <a href="javascript:void(0)" tabindex="-1"><i class="fa fa-chevron-right fa-fw pull-right"></i> Financeiro</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="javascript:void(0)">Inf. Bancárias</a></li>
                                            <li><a href="javascript:void(0)">Doações</a></li>
                                            <li><a href="javascript:void(0)">Just.TRE</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Contato <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="javascript:void(0)"><i class="fa fa-envelope-o fa-fw pull-right"></i> Via Email</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-phone fa-fw pull-right"></i> Por Telefone</a></li>
                        </ul>
                    </li>
                </ul>
                <form action="page_ready_search_results.php" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Procurar..">
                    </div>
                </form>
            </div>
            <!-- END Horizontal Menu + Search -->
            <?php } else { // Default Header Content  ?>
            <!-- Left Header Navigation -->
            <ul class="nav navbar-nav-custom">
                <!-- Main Sidebar Toggle Button -->
                <li>
                    <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');">
                        <i class="fa fa-bars fa-fw"></i>
                    </a>
                </li>
                <!-- END Main Sidebar Toggle Button -->

                <!-- Template Options -->
                <!-- Change Options functionality can be found in js/app.js - templateOptions() -->
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="gi gi-settings"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-custom dropdown-options">
                        <li class="dropdown-header text-center">Header Style</li>
                        <li>
                            <div class="btn-group btn-group-justified btn-group-sm">
                                <a href="javascript:void(0)" class="btn btn-primary" id="options-header-default">Light</a>
                                <a href="javascript:void(0)" class="btn btn-primary" id="options-header-inverse">Dark</a>
                            </div>
                        </li>
                        <li class="dropdown-header text-center">Page Style</li>
                        <li>
                            <div class="btn-group btn-group-justified btn-group-sm">
                                <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style">Default</a>
                                <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style-alt">Alternative</a>
                            </div>
                        </li>
                        <li class="dropdown-header text-center">Main Layout</li>
                        <li>
                            <button class="btn btn-sm btn-block btn-primary" id="options-header-top">Fixed Side/Header (Top)</button>
                            <button class="btn btn-sm btn-block btn-primary" id="options-header-bottom">Fixed Side/Header (Bottom)</button>
                        </li>
                        <li class="dropdown-header text-center">Footer</li>
                        <li>
                            <div class="btn-group btn-group-justified btn-group-sm">
                                <a href="javascript:void(0)" class="btn btn-primary" id="options-footer-static">Default</a>
                                <a href="javascript:void(0)" class="btn btn-primary" id="options-footer-fixed">Fixed</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- END Template Options -->
            </ul>
            <!-- END Left Header Navigation -->

            <!-- Search Form -->
            <form action="page_ready_search_results.php" method="post" class="navbar-form-custom" role="search">
                <div class="form-group">
                    <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Procurar..">
                </div>
            </form>
            <!-- END Search Form -->

            <!-- Right Header Navigation -->
            <ul class="nav navbar-nav-custom pull-right">
                <!-- Alternative Sidebar Toggle Button -->
                <li>
                    <!-- If you do not want the main sidebar to open when the alternative sidebar is closed, just remove the second parameter: App.sidebar('toggle-sidebar-alt'); -->
                    <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar-alt', 'toggle-other');">
                        <i class="gi gi-share_alt"></i>
                        <span class="label label-primary label-indicator animation-floating">4</span>
                    </a>
                </li>
                <!-- END Alternative Sidebar Toggle Button -->

                <!-- User Dropdown -->
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url(); ?>images/placeholders/avatars/AvatarFGz.jpg" alt="avatar"> <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                        <li class="dropdown-header text-center">Conta</li>
                        <li>
                            <a href="page_ready_timeline.php">
                                <i class="fa fa-clock-o fa-fw pull-right"></i>
                                <span class="badge pull-right">10</span>
                                Atualizações
                            </a>
                            <a href="page_ready_inbox.php">
                                <i class="fa fa-envelope-o fa-fw pull-right"></i>
                                <span class="badge pull-right">5</span>
                                Mensagens
                            </a>
                            <a href="page_ready_pricing_tables.php"><i class="fa fa-magnet fa-fw pull-right"></i>
                                <span class="badge pull-right">3</span>
                                Assinaturas
                            </a>
                            <a href="page_ready_faq.php"><i class="fa fa-question fa-fw pull-right"></i>
                                <span class="badge pull-right">11</span>
                                FAQ
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="index.php/dashboard/user_profile">
                                <i class="fa fa-user fa-fw pull-right"></i>
                                Perfil
                            </a>
                            <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.php in PHP version) -->
                            <a href="#modal-user-settings" data-toggle="modal">
                                <i class="fa fa-cog fa-fw pull-right"></i>
                                Configurações
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="page_ready_lock_screen.php"><i class="fa fa-lock fa-fw pull-right"></i> Lock Account</a>
                            <a href="login.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                        </li>
                        <li class="dropdown-header text-center">Atividade</li>
                        <li>
                            <div class="alert alert-success alert-alt">
                                <small>5 min atrás</small><br>
                                <i class="fa fa-thumbs-up fa-fw"></i> Vc recebeu nova doação ($10)
                            </div>
                            <div class="alert alert-info alert-alt">
                                <small>10 min atrás</small><br>
                                <i class="fa fa-arrow-up fa-fw"></i> Perfil Atualizado
                            </div>
                            <div class="alert alert-warning alert-alt">
                                <small>3 hours atrás</small><br>
                                <i class="fa fa-exclamation fa-fw"></i> Detratação <br><strong>Youtube</strong> Verificar
                            </div>
                            <div class="alert alert-danger alert-alt">
                                <small>Ontem</small><br>
                                <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)" class="alert-link">Blog fora do Ar</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- END User Dropdown -->
            </ul>
            <!-- END Right Header Navigation -->
            <?php } ?>
        </header>
        <!-- END Header -->
