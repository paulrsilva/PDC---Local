<?php
/**
 * config.php
 *
 * Author: pixelcave
 *
 * Configuration file. It contains variables used in the template as well as the primary navigation array from which the navigation is created
 *
 */
 $this->load->helper('url');

/* Template variables */
$template = array(
    'name'          => 'PDC',
    'version'       => '1.0',
    'author'        => 'Urbicell Tecnologias',
    'robots'        => 'noindex, nofollow',
    'title'         => 'PDC - Portal do Candidato',
    'description'   => 'O PDC é um portal interativo desenvolvido pela URBICELL Tecnologias',
    // true                     enable page preloader
    // false                    disable page preloader
    'page_preloader'=> false,
    // true                     enable main menu auto scrolling when opening a submenu
    // false                    disable main menu auto scrolling when opening a submenu
    'menu_scroll'   => true,
    // 'navbar-default'         for a light header
    // 'navbar-inverse'         for a dark header
    'header_navbar' => 'navbar-default',
    // ''                       empty for a static layout
    // 'navbar-fixed-top'       for a top fixed header / fixed sidebars
    // 'navbar-fixed-bottom'    for a bottom fixed header / fixed sidebars
    'header'        => '',
    // ''                                               for a full main and alternative sidebar hidden by default (> 991px)
    // 'sidebar-visible-lg'                             for a full main sidebar visible by default (> 991px)
    // 'sidebar-partial'                                for a partial main sidebar which opens on mouse hover, hidden by default (> 991px)
    // 'sidebar-partial sidebar-visible-lg'             for a partial main sidebar which opens on mouse hover, visible by default (> 991px)
    // 'sidebar-alt-visible-lg'                         for a full alternative sidebar visible by default (> 991px)
    // 'sidebar-alt-partial'                            for a partial alternative sidebar which opens on mouse hover, hidden by default (> 991px)
    // 'sidebar-alt-partial sidebar-alt-visible-lg'     for a partial alternative sidebar which opens on mouse hover, visible by default (> 991px)
    // 'sidebar-partial sidebar-alt-partial'            for both sidebars partial which open on mouse hover, hidden by default (> 991px)
    // 'sidebar-no-animations'                          add this as extra for disabling sidebar animations on large screens (> 991px) - Better performance with heavy pages!
    'sidebar'       => 'sidebar-partial sidebar-visible-lg sidebar-no-animations',
    // ''                       empty for a static footer
    // 'footer-fixed'           for a fixed footer
    'footer'       => '',
    // ''                       empty for default style
    // 'style-alt'              for an alternative main style (affects main page background as well as blocks style)
    'main_style'    => '',
    // 'night', 'amethyst', 'modern', 'autumn', 'flatie', 'spring', 'fancy', 'fire' or '' leave empty for the Default Blue theme
    'theme'         => '',
    // ''                       for default content in header
    // 'horizontal-menu'        for a horizontal menu in header
    // This option is just used for feature demostration and you can remove it if you like. You can keep or alter header's content in page_head.php
    'header_content'=> '',
    'active_page'   => basename($_SERVER['PHP_SELF'])
);

/* Primary navigation array (the primary navigation will be created automatically based on this array, up to 3 levels deep) */
$primary_nav = array(
    array(
        'name'  => 'Dashboard',
        'url'   => 'index.php',
        'icon'  => 'gi gi-stopwatch'
    ),
    array(
        'name'  => 'Gestão de Gabinete',
        'opt'   => '<a href="javascript:void(0)" data-toggle="tooltip" title="Configurações"><i class="gi gi-settings"></i></a>' . 
        '<a href="javascript:void(0)" data-toggle="tooltip" title="Administração de Gabinete"><i class="gi gi-book"></i></a>',
        'url'   => 'header'
    ),
    array(
        'name'  => 'CRM Gabinete',
        'url'   => '#',
        'icon'  => 'gi gi-display'
    ),
    array(
        'name'  => 'Agenda',
        'url'   => '#',
        'icon'  => 'gi gi-calendar'
    ),
    array(
        'name'  => 'Projetos',
        'url'   => '#',
        'icon'  => 'gi gi-tags'
    ),
    array(
        'name'  => 'Central Administrativa',
        'opt'   => '<a href="javascript:void(0)" data-toggle="tooltip" title="Configurações"><i class="gi gi-settings"></i></a>' .
                   '<a href="javascript:void(0)" data-toggle="tooltip" title="Dicas para Configuração de Campanha!"><i class="gi gi-lightbulb"></i></a>',
        'url'   => 'header',
    ),
    array(
        'name'  => 'Estatísticas',
        'url'   => 'page_widgets_stats.php',
        'icon'  => 'gi gi-charts'
    ),
    array(
        'name'  => 'Redes Sociais',
        'url'   => 'page_widgets_social.php',
        'icon'  => 'gi gi-share_alt'
    ),
    array(
        'name'  => 'Mídia',
        'url'   => 'page_widgets_media.php',
        'icon'  => 'gi gi-film'
    ),
    array(
        'name'  => 'Links',
        'url'   => 'page_widgets_links.php',
        'icon'  => 'gi gi-link'
    ),
    array(
        'name'  => 'Central do Candidato',
        'opt'   => '<a href="javascript:void(0)" data-toggle="tooltip" title="Configurações"><i class="gi gi-settings"></i></a>' . 
        '<a href="javascript:void(0)" data-toggle="tooltip" title="Central de Adm. do Candidadto"><i class="gi gi-group"></i></a>',
        'url'   => 'header'
    ),
    array(
        'name'  => 'Cadastro',
        'icon'  => 'gi gi-database_plus',
        'sub'   => array(
            array(
                'name'  => 'Áreas Geográficas',
                'url'   => '#'
            ),
            array(
                'name'  => 'Equipe',
                'url'   => 'http://localhost/PDC/ci/dashboard/gerenciarEquipe'
            ),
            array(
                'name'  => 'Plataforma',
                'url'   => '#'
            ),
            array(
                'name'  => 'Redes Sociais',
                'url'   => '#'
            ),
            array(
                'name'  => 'Palavras Chave',
                'url'   => '#'
            ),
            array(
                'name'  => '#hashtags',
                'url'   => '#'
            ),
            array(
                'name'  => 'Gerentes/Usuários',
                'url'   => '#'
            ),
            array(
                'name'  => 'Comitês',
                'url'   => '#'
            ),
            
            array(
                'name'  => 'Financeiro',
                'sub'   => array(
                    array(
                        'name'  => 'Dados Bancários',
                        'url'   => '#'
                    ),
                    array(
                        'name'  => 'Recursos',
                        'url'   => '#'
                    ),
                    array(
                        'name'  => 'Assinatura Digital',
                        'url'   => '#'
                    )
                )
                )    
        )
    ),
    
    array (
        'name' => 'Consulta',
        'icon' => 'gi gi-search',
        'sub'   => array(
            array(
                'name'  => 'Áreas Geográficas',
                'url'   => '#'
            ),
            array(
                'name'  => 'Tendências',
                'url'   => '#'
            ),
            array(
                'name'  => 'Eleitores',
                'url'   => '#'
            ),
            array(
                'name'  => 'Equipe',
                'url'   => '#'
            ),
            array(
                'name'  => 'Financeiro',
                'sub'   => array(
                    array(
                        'name'  => 'Fluxo de Caixa',
                        'url'   => '#'
                    ),
                    array(
                        'name'  => 'Doações',
                        'url'   => '#',
                         'icon'  => 'gi gi-tags'
                    ),
                    array(
                        'name'  => 'Precisão de Gastos',
                        'url'   => '#'
                    )
                )
            ),
            array(
                'name'  => 'Comitês',
                'url'   => '#'
            ),
            array(
                'name'  => 'Campanhas Sociais',
                'url'   => '#'
            )
        )
        
    ),
    
    array(
        'name'  => 'Pesquisas',
        'icon'  => 'gi gi-notes_2',
        'sub'   => array(
            array(
                'name'  => 'Gerar Pesquisa',
                'url'   => 'page_forms_general.php'
            ),
            array(
                'name'  => 'Relatórios de Pesquisas',
                'url'   => 'page_forms_components.php'
            )
        )
    ),
    array(
        'name'  => 'Campanha',
        'icon'  => 'gi gi-table',
        'sub'   => array(
            array(
                'name'  => 'Ações',
                'url'   => '#'
            ),
            array(
                'name'  => 'Agenda',
                'url'   => '#'
            ),
            array(
                'name'  => 'Equipe',
                'url'   => '#'
            ),
            array(
                'name'  => 'Metas',
                'url'   => '#'
            ),
            array(
                'name'  => 'Mobilização',
                'url'   => '#'
            ),
            array(
                'name'  => 'Idéias',
                'url'   => '#'
            )
        )
    ),
    array(
        'name'  => 'Doações de Campanha',
        'url'   => '#',
        'icon'  => 'gi gi-coins'
    ),
    array(
        'name'  => 'Geomarketing',
        'icon'  => 'gi gi-eye_open',
        'url' => '#'
    )
);