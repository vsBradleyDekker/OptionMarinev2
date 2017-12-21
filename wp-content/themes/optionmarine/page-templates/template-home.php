<?php
/* Template Name: Homepage */
?>
<?php get_header(); ?>
    <div class="jumbotron" style="background-image: url(<?php the_field('banner_image'); ?>)">
        <div class="jumbotron__desktop-wrapper"
             style="background-image: url(<?php the_field('mobile_banner_image'); ?>)">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6">
                        <?php if (get_field('show_banner')) : ?>
                            <div class="jumbotron__content-box">
                                <div class="jumbotron__jumbo-bg"></div>
                                <div class="jumbotron__content">
                                    <h1 class="jumbotron__title">
                                        <?php the_field('banner_title'); ?>
                                    </h1>
                                    <p class="jumbotron__paragraph">
                                        <?php the_field('banner_text'); ?>
                                    </p>
                                    <?php if (get_field('banner_button_text') && get_field('banner_button_link')) : ?>
                                        <a class="jumbotron__btn btn btn-default btn-lg visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"
                                           href="<?php the_field('banner_button_link'); ?>">
                                            <?php the_field('banner_button_text'); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php if (have_rows('affilliates', 'option')): ?>
    <section class="affiliates gray-background pt-small pb-small ">
        <div class="container">
            <div class="row vertical-align-container">
                <div class="col-xs-12 col-sm-12 col-md-2">
                    <h2>Sponsors &amp; Associations</h2>
                </div>
                <?php while (have_rows('affilliates', 'option')) : the_row(); ?>
                    <div class="col-xs-6 col-sm-2 col-md-2 text-center">
                        <?php if (get_sub_field('ad_link')) : ?>
                            <a href="<?php the_sub_field('ad_link'); ?>" target="_blank">
                                <img class="" src="<?php the_sub_field('affilliate_logo'); ?>" alt="">
                            </a>
                        <?php else : ?>
                            <img class="" src="<?php the_sub_field('affilliate_logo'); ?>" alt="">
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php $thursdayNight = new WP_Query(
    array(
        'posts_per_page' => 1,
        'post_status' => 'future',
        'cat' => get_cat_ID('thursday'),
        'orderby' => 'date',
        'order' => 'ASC'
    )
); ?>
<?php if ($thursdayNight->have_posts()) : ?>
    <section class="pt-large pb-large">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 text-center">
                    <img class="homepage__feature-img"
                         src="<?php echo get_template_directory_uri(); ?>/library/images/group-runners.png"
                         alt="content-image"
                    />
                </div>
                <?php while ($thursdayNight->have_posts()) : $thursdayNight->the_post(); ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 info-tab text-center">
                        <h2 class="info-tab__main-title">Next Thursday Night Run</h2>
                        <div class="info-tab__box primary-border">
                            <span class="info-tab__box-grade">SNR</span>
                            <span class="info-tab__box-grade"><?php the_field('senior_run');?></span>
                        </div>
                        <div class="info-tab__box secondary-border">
                            <span class="info-tab__box-grade">INT</span>
                            <span class="info-tab__box-grade"><?php the_field('intermediate_run');?></span>
                        </div>
                        <div class="info-tab__box tertiary-border">
                            <span class="info-tab__box-grade">JNR</span>
                            <span class="info-tab__box-grade"><?php the_field('junior_run');?></span>
                        </div>
                        <h3 class="info-tab__event-title">
                            <?php the_title(); ?>
                        </h3>
                        <p class="info-tab__event-address"><?php the_field('full_address');?></p>
                        <?php
                        $location = get_field('location');
                        if (!empty($location)) : ?>
                            <a href="https://www.google.com/maps?saddr=Thursday+Night+Run&daddr=<?php echo $location['address']; ?>"
                               target="_blank"
                               class="btn btn-default btn-lg info-tab__button">Get
                                Directions</a>
                        <?php endif; ?>
                        <a href="<?php echo site_url(); ?>/thursday" class="btn btn-secondary btn-lg info-tab__button">View All</a>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
    </section>
<?php endif; ?>
<?php $latestEvent = new WP_Query(
    array(
        'posts_per_page' => 1,
        'post_status' => 'future',
        'cat' => get_cat_ID('events'),
        'orderby' => 'date',
        'order' => 'ASC'
    )); ?>
<?php if ($latestEvent->have_posts()) : ?>
    <section class="gray-background pt-large">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-push-6 col-md-6 text-center">
                    <img class="homepage__feature-img"
                         src="<?php echo get_template_directory_uri(); ?>/library/images/runners.png"
                         alt="content-image"
                    />
                </div>
                <?php while ($latestEvent->have_posts()) : $latestEvent->the_post(); ?>
                    <div class="col-xs-12 col-sm-12 col-md-pull-6 col-md-6 text-center">
                        <h3>Next Event</h3>
                        <h2>
                            <?php the_title(); ?>
                        </h2>
                        <p>
                            <?php the_excerpt(); ?>
                        </p>
                        <a href="<?php the_permalink() ?>" class="btn btn-default btn-lg">View details</a>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
    </section>
<?php endif; ?>


    <section class="container pt-large pb-large">
        <div class="row">
            <div class="col-md-6 blog">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 blog__header pb-medium text-center">
                        <h2><i class="blog__icon fa fa-calendar" aria-hidden="true"></i>News &amp; Results
                        </h2>
                    </div>
                </div>
                <?php $latestNews = new WP_Query(array('posts_per_page' => 3, 'cat' => get_cat_ID('news'))); ?>
                <?php if ($latestNews->have_posts()) : ?>
                    <?php while ($latestNews->have_posts()) : $latestNews->the_post(); ?>
                        <div class="col-xs-12 col-sm-12 col-md-12 blog__feed">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="blog__feed__image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('post-thumbnail'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="blog__feed__content">
                                <span class="blog__feed__content__date"><?php echo get_the_date('F jS, Y'); ?></span>
                                <h5>
                                    <?php the_title(); ?>
                                </h5>
                                <p>
                                    <?php echo excerpt(16); ?>
                                </p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <a class="btn btn-default btn-lg" href="<?php echo site_url(); ?>/news">View All</a>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 blog">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 blog__header pb-medium text-center">
                        <h2><i class="blog__icon fa fa-bullhorn" aria-hidden="true"></i>Upcoming Events</h2>
                    </div>
                </div>
                <?php $upcomingEvents = new WP_Query(array('posts_per_page' => 3, 'post_status' => 'future', 'cat' => get_cat_ID('events'))); ?>
                <?php if ($upcomingEvents->have_posts()) : ?>
                    <?php while ($upcomingEvents->have_posts()) : $upcomingEvents->the_post(); ?>
                        <div class="col-xs-12 col-sm-12 col-md-12 blog__feed">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="blog__feed__image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('post-thumbnail'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <div class="blog__feed__content">
                                <span class="blog__feed__content__date"><?php echo get_the_date('F jS, Y'); ?></span>
                                <h5>
                                    <?php the_title(); ?>
                                </h5>
                                <p>
                                    <?php echo excerpt(16); ?>
                                </p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <a class="btn btn-default btn-lg" href="<?php echo site_url(); ?>/events">View All</a>
                </div>
            </div>
        </div>
    </section>
<?php if (get_field('section_banner')) : ?>
    <div class="section__banner" style="background-image:url(<?php the_field('section_banner'); ?>);"></div>
<?php endif; ?>
    <section class="pt-large pb-large gray-background">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 text-center">
                    <h3>IN THE LONG RUN</h3>
                    <h2>History of the Traralgon Marathon</h2>
                    <p>Containing 145 pages and over 300 photographs depicting the 50 year history of the Traralgon
                        Marathon,
                        1967 - 2017. <br><br>Included are all the names of all finishes from 1968 to 2017</p> <a
                            href="https://www.trybooking.com/314020"
                            target="_blank">
                        <button class="btn btn-default btn-lg">Read More</button>
                    </a></div>
                <div class="col-xs-12 col-sm-12 col-md-6 text-center">
                    <h3>50 Years - 1967 to 2017</h3>
                    <h2>Traralgon Harriers 50th Years</h2>
                    <p>Soft copy or hard copy available showcasing 50 years of the Traralgon Harriers Athletic Club.
                        From
                        it's inception to the current day club, documented are all the races, the results and all the
                        people and personalities that make the Traralgon Harriers who they are.</p> <a
                            href="https://www.trybooking.com/316148"
                            target="_blank">
                        <button class="btn btn-default btn-lg">Read More</button>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--
    <section class="pt-large pb-large">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <h3>Saturday 21st October 2017</h3>
                    <h2>Traralgon Harriers 50th Year Celebratory Dinner</h2>
                    <p>Tickets available for the 50 Year Celebration of the Traralgon Harriers. Make sure you book your
                        tickets to what will
                        be a great night remembering the last 50 years.</p> <a href="https://www.trybooking.com/314006"
                                                                               target="_blank">
                        <button class="btn btn-default btn-lg">Book now</button>
                    </a></div>
            </div>
        </div>
        </div>
    </section>
    -->
<?php get_footer(); ?>