<?php
/*
Template Name: Products
*/

?>
<?php get_header( 'secondary' ) ?>
<?php //include( get_template_directory() . "/page-components/searchbar.php"); ?>
<section class="products-section">
    <div class="row">
        <div class="products-section__heading columns small-12 medium-12 text-center pt-medium pb-medium">
            <h1 class="products-section__heading-title">Products</h1>
        </div>
    </div>
    <div class="row">
<?php
$t = get_taxonomies();


$terms = get_terms( array(
    'taxonomy' => 'product-categories',
    'hide_empty' => false,
)  );


foreach( $terms AS $term ):

	$_img = get_option('z_taxonomy_image'.$term->term_id ); 

	//var_dump( $_img );
?>
        <div class="products-section__listing columns small-12 medium-3 text-center pb-small">
            <div class="wrapper">
                <div class="hover">
                    <div class="border">
                        <div class="pt-large">
                            <span><?=htmlentities($term->name)?></span>
                        </div>
                        <div class="pt-medium pb-large">
                            <a  href="<?=get_term_link( $term )?>">View</a>
                        </div>
                    </div>
                </div>
                <img class="listing__image" src="<?=$_img?>" alt="outdoor-deck">
                <span class="products-section__listing__genre">
                    <a href="<?=get_term_link( $term )?>"><?=htmlentities($term->name)?></a>
                </span>
            </div>
        </div>
<?php
endforeach;

?>

    </div>
</section>
<?php get_footer( 'secondary' ); ?>
