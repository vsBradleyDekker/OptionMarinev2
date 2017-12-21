<?php get_header( 'secondary' ) ?>
<?php
$o = get_field_objects();
if (have_posts()) : while (have_posts()) : the_post();
?>
<section class="contact-info pt-large pb-large">
    <div class="row align-justify">
        <div class=" white-background columns small-12 medium-3">
            <div class="row contact-info__title pad-ltr-small">
                <h2> <?php the_title()?></h2>
            </div>
            <div class="row contact-info__subtitle pad-ltr-small">
                
            </div>
            <div class="row contact-info__list">
                <ul>
                    <li>
                        <a href="tel:<?=$o['phone_number']['value']?>">
                            <i class="fa fa-phone" aria-hidden="true"></i> <?=$o['phone_number']['value']?></a>
                    </li>
                    <li>
                        <a href="mailto:<?=$o['email_address']['value']?>">
                            <i class="fa fa-envelope" aria-hidden="true"></i> <?=$o['email_address']['value']?></a>
                    </li>
                    <li>
                        <a href="https://www.google.com/maps/search/?api=1&query=<?=urlencode( $o['location_address']['value'] )?>" target="_blank">
                            <i class="fa fa-map-marker" aria-hidden="true"></i> <?=$o['location_address']['value']?></a>
                    </li>
                </ul>
            </div>
            <div class="row contact-info__caption">
                <p class="contact-info__caption-title"><?=$o['social_media_title']['value']?></p>
            </div>
            <div class="row contact-info__social-list pt-small">
                <ul>
<?php
if ($o['facebook_url']['value']) :
?>
                    <li>
                        <a href="<?=$o['facebook_url']['value']?>" target="_blank">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                    </li>
<?php
endif;
if ($o['instagram_url']['value']) :
?>
                    <li>
                        <a href="<?=$o['instagram_url']['value']?>" target="_blank">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </li>
<?php
endif;
if ($o['twitter_url']['value']) :
?>
                    <li>
                        <a href="<?=$o['twitter_url']['value']?>" target="_blank">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </li>
<?php
endif;
if ($o['googleplus_url']['value']) :
?>
                    <li>
                        <a href="<?=$o['googleplus_url']['value']?>" target="_blank">
                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                        </a>
                    </li>
<?php
endif;
if ($o['linkedin_url']['value']) :
?>
                    <li>
                        <a href="<?=$o['linkedin_url']['value']?>" target="_blank">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                    </li>
<?php
endif;
if ($o['youtube_url']['value']) :
?>
                    <li>
                        <a href="<?=$o['youtube_url']['value']?>" target="_blank">
                            <i class="fa fa-youtube" aria-hidden="true"></i>
                        </a>
                    </li>
<?php
endif;

?>
                </ul>
            </div>
            <div class="row contact-info__map pt-small">
                <div id="map"></div>
            </div>
        </div>
        <div class="columns contact-form pb-small small-12 medium-9 white-background">
            <div class="row pad-ltr-small">
				<div class="columns small-12">
				<h1 class="product-category__title"><?php the_title();?></h1>
					<?php the_content()?>
				</div>
            </div>
        </div>
    </div>
</section>
<?php
endwhile;
endif;
?>
<?php get_footer( 'secondary' ); ?>
