<?php get_header( 'secondary' ) ?>
<?php //include( get_template_directory() . "/page-components/searchbar-secondary.php"); ?>
<?php
$t = get_the_terms( 19, 'product-categories' );

$p = get_queried_object();

$o = get_field_objects();


if (have_posts()) : while (have_posts()) : the_post();

?>
<section class="product-information">
    <div class="row">
        <div class="columns small-12 medium-12 pt-small">
            <span class="product-information__trail"><a href="/">Home</a> > <a href="/products">Products</a> > <a href="<?=get_term_link( $t[0], 'product-categories' )?>"><?=htmlentities($t[0]->name)?></a> > <?=$p->post_title?> </span>
        </div>
    </div>
    <div class="row pb-small">
        <div class="columns small-12 medium-4  pt-small pb-medium">
            <div class="columns small-12 white-background">
                <h1 class="product-information__title pt-small"><?=$t[0]->name?></h1>
                <p class="product-infomation__description"><?=nl2br(htmlentities($t[0]->description))?></p>
                <a class="button" href="<?=get_permalink(46);?>?product=<?=addslashes(urlencode($p->post_title))?>">Enquire</a>        
            </div>
        </div>
        <div class="columns small-12 medium-8 product-information__type pt-small pb-medium">
            <div class="columns small-12 white-background ">
                <span class="product-information__type__title pt-small"><? the_title();?></span>
                <? the_content();?>
            </div>
<?php
if (  is_array( $o['downloads']['value']  )   ):
?>
            <div class="columns small-12 pt-medium pb-medium mb-small mt-small product-information__downloads white-background">
                <div class="row collapse">
                    <div class="columns small-12 product-information__downloads-title pb-medium bt-border-light">
                        <span class="no-margin">Downloads</span>
                    </div>
                </div>
<?php
    foreach( $o['downloads']['value'] AS $_download ):
?>
                <div class="row collapse">
                    <div class="columns pt-small pb-small small-12 medium-10 bt-border-light">
                        <p class="no-margin product-information__downloads-item"><?=$_download['download_heading']?></p>
                    </div>
                    <div class="columns small-12 medium-2 product-information__downloads-link  pt-small pb-small lft-border-light bt-border-light text-center">
                        <p class="no-margin">
                            <a href="<?=$_download['download_file']['url']?>" target="_blank" >Download</a>
                        </p>
                    </div>
                </div>
<?php
    endforeach;
?>           
            </div>
<?
endif;
?>
<?php
if (  is_array( $o['gallery']['value']  )   ):
?>
            <div class="columns small-12 product-information__gallery mb-small pt-small pb-medium white-background">
            
                <span class="product-information__gallery__title pb-medium">Gallery</span>
                <div class="row">
<?php
foreach( $o['gallery']['value'] AS $_image ):

	echo slb_activate( '<div class="product-information__gallery__listing columns small-12 medium-3 text-center pb-small">
                        <a class="gallery_image" href="' . $_image['url'] . '"><img class="listing__image" src="' . $_image['sizes']['thumbnail']. '" alt="outdoor-deck"></a>
                    </div>' );
?>
                    
<?php
endforeach;
?>
                 
                </div>
            </div>
<?
endif;
?>
<?php
if (  is_array( $o['technical_specifications']['value'] )   ):
?>
            <div class="columns small-12 pt-medium pb-medium product-information__technical-spec">
                <div class="row">
                    <div class="columns small-12 medium-12">
                        <div class="row collapse">
                            <div class="columns small-12 medium-12">
                                <h3 class="product-information__technical-spec__title">Technical Specifications</h3>
                            </div>
                        </div>
<?php
foreach( $o['technical_specifications']['value'] AS $_spec ):
?>
                        <div class="row collapse">
                            <div class="columns small-12 medium-2">
                                <p class="pt-small pb-small border-right product-information__technical-spec__part"><?=$_spec['technical_parameter_name']?></p>
                            </div>
                            <div class="columns small-12 medium-10">
                                <p class="pt-small pb-small pl-small "><?=$_spec['technical_parameter_value']?></p>
                            </div>
                        </div>
<?php
endforeach;
?>                      
                    </div>
                </div>
            </div>
<?php
endif;
?>
        </div>
    </div>
</section>
<?php

endwhile;
endif;
?>
<?php get_footer( 'secondary' ); ?>
