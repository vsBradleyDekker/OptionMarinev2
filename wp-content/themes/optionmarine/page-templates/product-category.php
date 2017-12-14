<?php get_header( 'secondary' ) ?>
<?php //include( get_template_directory() . "/page-components/searchbar-secondary.php"); ?>
<?php

$t = get_queried_object();

$_uses = get_option( "category-extra-field-uses-" . $t->term_id );

?>
<section class="product_category">
    <div class="row">
        <div class="columns small-12 medium-12 pt-medium pb-medium">
            <span class="product_category-trail"><a href="/">Home</a> > <a href="/products">Products</a> > <?=$t->name?></span>
        </div>
    </div>
    <div class="row pt-medium pb-medium">
        <div class="columns small-12 medium-6">
            <div class="white-background pad-all-xs">
                <h4 class="product-category__title"><?=$t->name?></h4>
                <p class="product-category__description"><?=htmlentities( $t->description )?></p>
            </div>
        </div>
        <div class="columns small-12 medium-6">
            <div class="white-background pad-all-xs">
                <h3 class="product-category__uses">Application/Uses</h3>
		<p class="product-category__description"><?=htmlentities( $_uses )?></p>
            </div>
        </div>
    </div>
    <div class="row align-middle pb-medium">
        <div class="columns pb-medium small-12 medium-12 product-category__list">
            <div class="row">
                <div class="columns pt-medium small-12 medium-12">
                    <h3 class="product-category__list-title">Product Name</h3>
                </div>
            </div>
<?php
$q = new WP_Query( array( 'post_type' => 'products', get_query_var( 'taxonomy' ) => get_query_var( 'term' )  ) ); 

$_results = $q->get_posts();

foreach( $_results  AS $_result ) :

?>


            <div class="row collapse">
                <div class="columns small-12 medium-10">
                    <span class="product-list__name"><?=htmlentities( $_result->post_title )?></span>
                </div>
                <div class="columns small-12 medium-2 text-center">
                    <a href="<?=get_permalink( $_result )?>">View</a>
                </div>
            </div>
<?php

endforeach;
?>

        </div>
    </div>
</section>
<?php //include( get_template_directory() . "/footer-secondary.php"); ?>
<?php get_footer( 'secondary' ); ?>
