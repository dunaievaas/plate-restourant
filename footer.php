    <footer class="footer">
        <div class="container">
            <div class="wrapper-top">
                <div class="row">
                    <div class="col-lg-5 col-12 wrapper-top__logo">
                        <?php echo get_custom_logo(); ?>
                    </div>
                    <div class="col-lg-7 col-12 wrapper-top__contact-info contact-info">
                        <div class="row">
                        <?php if( $link = get_field('adress', 'option')): ?>
                            <div class="col-md-4 col-12">
                                <div class="contact-info__adress adress">
                                    <?php if ($title = get_field('adress_title', 'option')): ?>
                                        <h3><?php echo $title; ?></h3>
                                    <?php endif; ?>
                                    <?php 
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <div class="adress__wrapper">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($phone = get_field('phone', 'option')): ?>
                            <div class="col-md-4 col-12">
                                <div class="contact-info__phone phone">
                                    <?php if ($title = get_field('contact_title', 'option')): ?>
                                        <h3><?php echo $title; ?></h3>
                                    <?php endif; ?>
                                    <div class="phone__wrapper">
                                        <i class="fa-solid fa-phone"></i>
                                        <p><a href="tel: <?php echo $phone; ?>"><?php echo $phone; ?></a></p>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if( have_rows('social_icons', 'option') ): ?>
                            <div class="col-md-4 col-12">
                                <?php if ($title = get_field('social_title', 'option')): ?>
                                    <h3 class="contact-info__social-title"><?php echo $title; ?></h3>
                                <?php endif; ?>
                                <ul class="contact-info__networks networks">
                                    <?php while( have_rows('social_icons', 'options') ) : the_row(); ?>
                                        <li class="networks__item">
                                            <?php if ($link = get_sub_field('social_link')): ?>
                                                <a href="<?php echo $link['url']; ?>">
                                                    <?php if ($network = get_sub_field('social_network')) : ?> 
                                                        <i class="fa-brands fa-<?php echo $network; ?>"></i>
                                                    <?php endif; ?>
                                                    <?php echo $link['title']; ?>
                                                </a>
                                            <?php endif; ?>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper-bottom">
                <div class="row">
                    <?php if ($copyrights = get_field('copyrights', 'option')): ?>
                        <div class="col-md-6 col-12">
                            <?php echo $copyrights; ?>
                        </div>
                    <?php endif; ?>
                    <div class="col-md-6 col-12 wrapper-bottom__menu menu">
                        <?php wp_nav_menu( [
                                'theme_location'  => 'footer_menu', 
                                'container'       => false,
                                'menu_class'      => 'menu__footer',
                                'menu_id'         => false,
                                'echo'            => true,
                                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                'depth'           => 1,
                                ] );
                            ?>   
                    </div>
                </div>
            </div>
        </div>
        <span class="to-top">
            <i class="fa-solid fa-chevron-up"></i>
            <span><?php _e('Zurück zum Anfang', 'plate-restourant'); ?></span>
        </span>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>
