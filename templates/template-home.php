<?php 
/*
Template Name: Home Page
Template Post Type: page
*/

    get_header(); ?>
    <main class="main">
        <!-- BEGGIN HERO SECTION -->
        <section class="hero">
            <div class="container">
                <div class="row hero__wrapper">
                    <div class="col-lg-6 col-12 hero__wrapper--left">
                        <?php if ($title = get_field('hero_title')): ?>
                            <h1><?php echo $title?></h1>
                        <?php endif; ?>
                        <?php if ($description = get_field('hero_description')): ?>
                            <p><?php echo $description; ?></p>
                        <?php endif; ?>
                        <?php if ($link = get_field('hero_link')): ?>
                    
                        <?php 
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="button-reserve" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                     
                    </div>
                    <?php if ($image = get_field('hero_image')): ?>
                    <div class="col-lg-6 col-12 hero__wrapper--right order-first order-md-last">
                        <?php $size = 'large';
                            echo wp_get_attachment_image( $image, $size ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- END HERO SECTION -->

        <!-- BEGGIN POPULAR-DISHES SECTION -->
        <?php
        if($plates = get_field('plates_group')): ?>
            <section class="popular-dishes">
                <div class="popular-dishes__wrapper wrapper">
                    <?php foreach( $plates as $post ):
                        setup_postdata($post); ?>
                            <div class="wrapper__item item">
                                <?php if(has_post_thumbnail()): ?>
                                    <?php echo get_the_post_thumbnail( get_the_ID(), 'large', array('class'=>'item__image')); ?>
                                <?php endif; ?>
                                <div class="item__info">
                                    <?php if ($title = get_the_title()): ?>
                                        <h3><?php echo $title; ?></h3>
                                    <?php endif; ?>
                                    <?php if ($description = get_the_excerpt()): ?>
                                        <p><?php echo $description; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                    <?php endforeach; ?> 
                <?php wp_reset_postdata(); ?>
                </div>
            </section>
        <?php endif; ?>
        <!-- END POPULAR-DISHES SECTION -->
        
         <!-- BEGGIN ABOUT SECTION -->
        <section class="about" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-12 about-wrapper">
                        <?php if ($title = get_field('about_title')): ?>
                        <h2 class="about-wrapper__title"><?php echo $title; ?></h2>
                        <?php endif;
                        if ($description = get_field('about_description')): ?>
                            <?php echo $description; ?>
                        <?php endif;
                        if( $link = get_field('about_link')): ?>
                        <?php
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a class="button-reserve" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
         <!-- END ABOUT SECTION -->

        <!-- BEGGIN GALLERY SECTION -->
        <?php 
        if ($images =  get_field('gallery_item')) :?>
        <section class="gallery">
            <?php $size = 'full';  ?>
            <ul class="gallery__list list">
                <?php foreach( $images as $image_id ): ?>
                    <li class="list__item">
                        <?php echo wp_get_attachment_image( $image_id, $size ); ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <?php endif; ?>
        <!-- END GALLERY SECTION -->

        <!-- BEGGIN WORKING HOURS SECTION -->
        <section class="working-hours" id="working-hours">
            <div class="container">
                <div class="row working-hours__wrapper wrapper">
                    <div class="col-md-6 col-12 wrapper__info info">
                        <?php if ($title = get_field('working_title')): ?>
                            <h2 class="info__title"><?php echo $title; ?></h2>
                        <?php endif;
                        if ($text = get_field('working_description')): ?>
                            <?php echo $text; ?>
                        <?php endif;
                        if( have_rows('working_hours') ): ?>
                            <div class="info__work-time work-time">
                                <?php while( have_rows('working_hours') ) : the_row();
                                $days = get_sub_field('days');
                                $time = get_sub_field('time'); ?>
                                    <p class="work-time__time"><?php echo $days; ?><span><?php echo $time; ?></span></p>
                                <?php endwhile; ?>
                            </div>
                        <?php endif;
                        if ($link = get_field('working_link')):                         
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="button-reserve" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>
                    <?php if ($image = get_field('working_image')): ?>
                    <div class="col-md-6 col-12">
                        <?php
                        $size = 'full'; // (thumbnail, medium, large, full or custom size)
                        echo wp_get_attachment_image( $image, $size ); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <!-- END WORKING HOURS SECTION -->

        <!-- BEGGIN BENEFITS SECTION -->
        <?php if( have_rows('benefits_box') ): ?>
            <section class="benefits">
                <?php if ($image = get_field('benefits_banner')): 
                    echo wp_get_attachment_image( $image, 'full' );
                endif; ?>
                <div class="container">
                    <div class="row benefits__wrapper wrapper"> 
                        <?php while( have_rows('benefits_box') ) : the_row(); ?>
                            <div class="col-lg-3 col-md-6 col-12 wrapper__box box">
                                <?php if ($image = get_sub_field('icon')) : 
                                    echo wp_get_attachment_image( $image, 'thumbnail' );
                                endif; ?>
                                <?php if ($title = get_sub_field('title')): ?>
                                    <p class="box__title"><?php echo $title; ?></p>
                                <?php endif; ?>
                                <?php if ($description = get_sub_field('description')): ?>
                                    <p class="box__text"><?php echo $description; ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- END BENEFITS SECTION -->

        <!-- BEGGIN FAQ SECTION -->
        <?php if ($faq = get_field('faq_group')): ?>
            <section class="faq" id="faq">
                <div class="container">
                    <div class="row">
                        <div class="col-12 faq-wrapper">
                            <?php if ($title = get_field('faq_title')): ?>
                                <h2 class="faq-wrapper__title"><?php echo $title; ?></h2>
                            <?php endif; ?>
                            <?php if ($description = get_field('faq_description')): ?>
                                <p><?php echo $description; ?></p>
                            <?php endif; ?>
                            <div class="accordion" id="faq-accordion">
                                <?php foreach( $faq as $post ):
                                    setup_postdata($post); ?>
                                <div class="accordion-item">
                                    <?php if ($title = get_the_title()): ?>
                                    <h2 class="accordion-header" id="heading<?php the_ID(); ?>">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php the_ID(); ?>" aria-expanded="false" aria-controls="collapse<?php the_ID(); ?>">
                                            <?php echo $title; ?>
                                        </button>
                                    </h2>
                                    <?php endif; ?>
                                    <?php if ($answer = get_the_content()): ?>
                                        <div id="collapse<?php the_ID(); ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php the_ID(); ?>" data-bs-parent="#faq-accordion">
                                            <div class="accordion-body">
                                                <strong><?php echo $answer; ?></strong> 
                                            </div>
                                        </div> 
                                    <?php endif; ?>
                                </div>
                                <?php endforeach;
                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <!-- END FAQ SECTION -->

        <!-- BEGGIN TESTIMONIALS SECTION -->
        <?php if($testimonials = get_field('testimonials_group')): ?>
            <section class="testimonials" id="testimonials">
                <div class="container">
                    <div class="row">
                        <div class="col-12 testimonials-wrapper">
                            <?php if ($title = get_field('testimonials_title')): ?>
                                <h2 class="testimonials-wrapper__title"><?php echo $title; ?></h2>
                            <?php endif; ?>
                            <?php if ($description = get_field('testimonials_description')): ?>
                                <p class="testimonials-wrapper__text"><?php echo $description; ?></p>
                            <?php endif; ?>
                            <ul class="testimonials-wrapper__list list testimonials-slider">
                                <?php foreach( $testimonials as $post ): 
                                    setup_postdata($post); ?>
                                    <li class="list__box">
                                        <?php if ($testimonial = get_the_content()): ?>
                                            <p class="box__testimonial"><?php echo $testimonial; ?></p>
                                        <?php endif; ?>
                                        <div class="box__info-author">
                                            <?php if(has_post_thumbnail()): ?>
                                                <?php echo get_the_post_thumbnail( get_the_ID(), 'thumbnail', array('class'=>'info-author__image')); ?>
                                            <?php endif; ?>
                                            <?php if ($author = get_the_title()): ?>
                                                <p class="info-author__name"><?php echo $author; ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <div class="slider-nav">
                                <span class="slick-prev"></span>
                                <span class="dots"></span>
                                <span class="slick-next"></span>
                            </div>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
         <!-- END TESTIMONIALS SECTION -->

        <!-- BEGGIN CONTACT SECTION -->
        <section class="contact" id="contact">
            <div class="container">
                <div class="row contact-wrapper">
                    <div class="col-lg-7 col-12 contact-wrapper__map">
                        <?php if ($map = get_field('contact_map')): ?>
                            <?php echo $map; ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-5 col-12 contact-wrapper__form">
                        <?php if ($title = get_field('contact_title')): ?>
                            <h2><?php echo $title; ?></h2>
                        <?php endif; ?>
                        <?php if ($form_id = get_field('contact_form')): 
                            echo do_shortcode('[gravityform id="' . $form_id . '" title="false" description="false" ajax="true" theme="orbital"]');
                        endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- END CONTACT SECTION -->
    </main>
<?php get_footer();?>
