<?php
/*
Template Name: Contact Page
*/

?>
<?php get_header( 'secondary' ) ?>
<?php

$o = get_field_objects();


if (have_posts()) : while (have_posts()) : the_post();
?>

<section class="contact-info pt-large pb-large">
    <div class="row align-justify">
        <div class=" white-background columns small-12 medium-6">
            <div class="row contact-info__title pad-ltr-small">
                <h1> <?php the_title()?></h1>
            </div>
            <div class="row contact-info__subtitle pad-ltr-small">
                <?php the_content()?>
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
                <div id="map" data-longitude="<?=$o['google_map_longitude']['value']?>" data-latitude="<?=$o['google_map_latitude']['value']?>"></div>
            </div>
        </div>
        <div class="columns contact-form pb-small small-12 medium-5 white-background">
            <div class="row pad-ltr-small">
                <span class="contact-form__title"><?=$o['contact_form_instructions']['value']?></span>
            </div>
            <div class="row contact-form__form">
                <div class="columns small-12 medium-12" id="formContainer" style="position: relative">
                    <?php
			echo $o['contact_form_code']['value'];
		    ?>
		    
                    <?php /*
                    <form id="myForm" method="post" action="<?=get_permalink()?>" data-abide>
                        <input type="hidden" name="product" value="<?=htmlentities( @$_GET['product'] )?>"/>
      			<input type="hidden" name="action" value="__CONTACT__"/>
                        <input type="text" name="fullname" placeholder="Full Name*" required="required"/>
                        <input type="text" name="phone" placeholder="Phone Number*" required="required"/>
                        <input type="email" name="email" placeholder="Email Address*" required="required"/>
                        <textarea placeholder="Message*" name="message" cols="30" rows="10" required="required"><?=( isset($_GET['product']) )?'re: ' . htmlentities( $_GET['product'] ) : '' ?></textarea>
                        <div class="g-recaptcha" data-sitekey="6LfzojwUAAAAACb6NioY2xFTob1f2wm_HRWLffZN"></div>
                        <button type="submit">SUBMIT</button>
                    </form> */?>
		  
                    <div style="clear: both; display: block"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcLrxc8hXGgGgt2nbCELdbkJNeXQDD1yE&callback=initMap">
</script>-->
<?php

endwhile;
endif;
?>
<?php get_footer( 'secondary' ); ?>
