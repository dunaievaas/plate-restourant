<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <title><?php echo get_bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <header class="header">
       <div class="container">
            <div class="row nav-bar desctop-only">      
                <div class="col-5 nav-bar__menu">
                    <?php wp_nav_menu( [
                        'theme_location'  => 'left_menu', 
                        'container'       => false,
                        'menu_class'      => 'nav-bar__menu--left',
                        'menu_id'         => false,
                        'echo'            => true,
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 1,
                        ] );
                    ?>   
                </div>
                <div class="col-2"><?php echo get_custom_logo(); ?></div>
                <div class="col-5 nav-bar__menu">
                    <?php wp_nav_menu( [
                            'theme_location'  => 'right_menu', 
                            'container'       => false,
                            'menu_class'      => 'nav-bar__menu--right',
                            'menu_id'         => false,
                            'echo'            => true,
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth'           => 1,
                            ] );
                        ?> 
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <nav class="nav mobile-only">
                    <?php echo get_custom_logo(); ?>
                        <button class="menu-open-btn mobile-only">
                            <span class="menu-open-btn__line"></span>
                        </button>
                        <div class="mobile-menu">
                            <?php 
                            wp_nav_menu( [
                                'theme_location'  => 'left_menu', 
                                'container'       => false,
                                'menu_class'      => 'mobile-menu__menu--left',
                                'menu_id'         => false,
                                'echo'            => true,
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth'           => 1,
                                ] );
                            wp_nav_menu( [
                                'theme_location'  => 'right_menu', 
                                'container'       => false,
                                'menu_class'      => 'mobile-menu__menu--right',
                                'menu_id'         => false,
                                'echo'            => true,
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth'           => 1,
                                ] );
                            ?> 
                        </div>
                    </nav>
                </div>
            </div>
       </div>
    </header>
