<?php
/*
Template Name: Products
*/

?>
<?php include( get_template_directory() . "/header-secondary.php"); ?>
<?php include( get_template_directory() . "/page-components/searchbar.php"); ?>
<section class="products-section">
    <div class="row">
        <div class="products-section__heading columns small-12 medium-12 text-center pt-medium pb-medium">
            <h2 class="products-section__heading-title">Products</h2>
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
<!--
        <div class="products-section__listing columns small-12 medium-3 text-center pb-small">
            <div class="wrapper">
                <div class="hover">
                    <div class="border">
                        <div class="pt-large">
                            <span>Applications</span>
                        </div>
                        <div class="pt-medium pb-large">
                            <a>View</a>
                        </div>
                    </div>
                </div>
                <img class="listing__image" src="<?=get_stylesheet_directory_uri()?>/library/images/sun-lounger.png" alt="sun-lounger">
                <span class="products-section__listing__genre">
                    <a href="#">Applications</a>
                </span>
            </div>
        </div>
        <div class="products-section__listing columns small-12 medium-3 text-center pb-small">
            <div class="wrapper">
                <div class="hover">
                    <div class="border">
                        <div class="pt-large">
                            <span>Fittings</span>
                        </div>
                        <div class="pt-medium pb-large">
                            <a>View</a>
                        </div>
                    </div>
                </div>
                <img class="listing__image" src="<?=get_stylesheet_directory_uri()?>/library/images/tents.jpg" alt="tents">
                <span class="products-section__listing__genre">
                    <a href="#">Fittings</a>
                </span>
            </div>
        </div>
        <div class="products-section__listing columns small-12 medium-3 text-center pb-small">
            <div class="wrapper">
                <div class="hover">
                    <div class="border">
                        <div class="pt-large">
                            <span>Zippers</span>
                        </div>
                        <div class="pt-medium pb-large">
                            <a href="../pages/product-category.php">View</a>
                        </div>
                    </div>
                </div>
                <img class="listing__image" src="<?=get_stylesheet_directory_uri()?>/library/images/indoor-dinning.jpg" alt="indoor-dinning">
                <span class="products-section__listing__genre">
                    <a href="../pages/product-category.php">Zippers</a>
                </span>
            </div>
        </div>
    </div>
    <div class="row pt-medium pb-medium">
        <div class="products-section__listing columns small-12 medium-3 text-center pb-small">
            <div class="wrapper">
                <div class="hover">
                    <div class="border">
                        <div class="pt-large">
                            <span>Togglers</span>
                        </div>
                        <div class="pt-medium pb-large">
                            <a>View</a>
                        </div>
                    </div>
                </div>
                <img class="listing__image" src="<?=get_stylesheet_directory_uri()?>/library/images/marine-image.jpg" alt="marine">
                <span class="products-section__listing__genre">
                    <a href="#">Togglers</a>
                </span>
            </div>
        </div>
        <div class="products-section__listing columns small-12 medium-3 text-center pb-small">
            <div class="wrapper">
                <div class="hover">
                    <div class="border">
                        <div class="pt-large">
                            <span>Fasteners</span>
                        </div>
                        <div class="pt-medium pb-large">
                            <a>View</a>
                        </div>
                    </div>
                </div>
                <img class="listing__image" src="<?=get_stylesheet_directory_uri()?>/library/images/outdoor-sun.jpg" alt="outdoor-sun">
                <span class="products-section__listing__genre">
                    <a href="#">Fasteners</a>
                </span>
            </div>
        </div>
  -->
    </div>
</section>
<?php include( get_template_directory() . "/footer-secondary.php"); ?>
