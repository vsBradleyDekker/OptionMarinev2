<?php
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
    }


function __fix__( $tag, $handle, $src )
{
	

	if( $handle == 'gmaps' )
	{
		$_script = str_replace( '&#038;', '&', $tag ); 

		return str_replace( '<script', '<script async defer', $_script );
	}

	return $tag;
	
}

function __enqueue_gmap__()
{

	$_o = get_queried_object();

	$_t = get_post_meta( $_o->ID, '_wp_page_template', true );

	$acf = get_field_objects();

	if( $_t == 'page-templates/contact.php' )
	{
		wp_enqueue_script( 'gmaps', 'https://maps.googleapis.com/maps/api/js?key=' . $acf['google_map_api_key']['value'] . '&callback=initMap', array( 'bones-js'), NULL, $in_footer=true );

		add_filter( 'script_loader_tag', '__fix__', 10, 3 );
	}	

}

add_action( 'wp', '__enqueue_gmap__' );


/*
This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  //require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'bones-thumb-600' => __('600px by 150px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/* 
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722
  
  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
  
  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function bones_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections 

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');
  
  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'bones_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!


/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function bones_fonts() {
  wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
}

add_action('wp_enqueue_scripts', 'bones_fonts');


//add extra fields to category edit form hook
add_action( 'product-categories_edit_form_fields', 'category_edit_form_fields');
add_action( 'product-categories_add_form_fields', 'category_add_form_fields');


//add extra fields to category edit form callback function
function category_add_form_fields( $tag ) {    //check for existing featured ID
    $t_id = $tag->term_id;
    $cat_meta = get_option( "category_$t_id");


?>
<div class="form-field term-description-wrap">
	<label for="Cat_meta_uses">Uses/Application</label>
	<textarea name="Cat_meta[uses]" id="Cat_meta_uses" rows="5" cols="40"><?php echo $cat_meta['uses'] ? htmlentities($cat_meta['uses']) : ''; ?></textarea>
	<p><?php _e('Uses & Application'); ?></p>
</div>

<?php
}


//add extra fields to category edit form callback function
function category_edit_form_fields( $tag ) {    //check for existing featured ID
    $t_id = $tag->term_id;
    $cat_meta = get_option( "category-extra-field-uses-$t_id");
    $cat_order = get_term_meta( $t_id, "cat-order" );
	

?>
<tr class="form-field term-description-wrap">
			<th scope="row"><label for="Cat_meta_uses">Uses/Application</label></th>
			<td><textarea name="Cat_meta[uses]" id="Cat_meta_uses" rows="5" cols="50" class="large-text"><?=htmlentities( $cat_meta )?></textarea>
			<p class="description"><?php _e('Uses & Application'); ?></p></td>
		</tr>
		<tr class="form-field term-description-wrap">
			<th scope="row"><label for="cat-order">Category Order</label></th>
			<td><input name="cat-order" id="cat-order" type="number" value="<?=get_term_meta( $t_id, "cat-order" )[0]?>" size="40" />
			<p class="description"><?php _e('Category Order'); ?></p></td>
		</tr>
<?php
}

add_action('edit_term','category_save_extra_fields');
add_action('create_term','category_save_extra_fields');
add_action('delete_term','category_delete_extra_fields');

function category_save_extra_fields($term_id){


	if(isset($_POST['Cat_meta']['uses']))
        	update_option('category-extra-field-uses-' . $term_id, $_POST['Cat_meta']['uses'], NULL);


	if (isset($_POST['cat-order'])) 
		update_term_meta( $term_id, 'cat-order', $_POST['cat-order']);

}

function category_delete_extra_fields($term_id){

	
        delete_option('category-extra-field-uses-' . $term_id );



}


add_filter('get_terms', 'custom_term_sort', 10, 3);


function custom_term_sort($terms, $taxonomies, $args)
{		
	// Controls behavior when get_terms is called at unusual times resulting in a terms array without objects
	$empty = false;
 
	// Create collector arrays
	$ordered_terms = array();
	$unordered_terms = array();
 
	// Add taxonomy order to terms
	foreach($terms as $term)
	{

		// Only set tax_order if value is an object
		if(is_object($term))
		{
			if($taxonomy_sort = get_term_meta($term->term_id, 'cat-order', true))
			{
				$term->cat_order = (int) $taxonomy_sort;
				$ordered_terms[] = $term;
			}
			else
			{
				$term->cat_order = (int) 0;
				$unordered_terms[] = $term;
			}
		}
		else
			$empty = true;
	}


	// Only sort by tax_order if there are items to sort, otherwise return the original array
	if(!$empty && count($ordered_terms) > 0){
		quickSort($ordered_terms);
	}else{
		return $terms;
	}
 
	// Combine the newly ordered items with the unordered items and return
	return array_merge($ordered_terms, $unordered_terms);	
}
 
function quickSort(&$input)
{
	$tmp = array();

	foreach( $input AS $a )
	{
		if( isset( $tmp[ $a->cat_order ] ) )
		{
			$tmp[] = $a;
		}
		else
		{
			$tmp[ $a->cat_order ] = $a;
		}

	}

	ksort( $tmp );
	$input = array_values ( $tmp );	

}

/*
if( $_POST['action'] == '__CONTACT__' )
{

	$_g_query = http_build_query( array( 'secret'=>'6LfzojwUAAAAAEoIokEUJNp3JlU_yAoRzWDAZlEy', 'response'=>$_POST['g-recaptcha-response'] )  );	

	$ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
	curl_setopt($ch, CURLOPT_POSTFIELDS,  $_g_query );
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

	$result = curl_exec($ch);

	$a_response = json_decode( $result, true );

	if( !$a_response['success'] )
	{
		die('0');
	}	

	$_msg = "
        <style>
          td, p { font-family: arial; color: #333 }
        </style>
	<table cellpadding=\"2\" cellspacing=\"0\">
          <tr>
            <td>Name</td>
            <td style=\"color:#999\"> {$_POST[fullname]} </td>
          </tr>";

	if( $_POST['product'] != '' ):

		$_msg .= "
	   <tr>
            <td>Product Enquiry</td>
            <td style=\"color:#999\"> {$_POST[product]} </td>
          </tr>";

	endif;

	$_msg .= "
          <tr>
            <td>Phone</td>
            <td style=\"color:#999\"> {$_POST[phone]} </td>
          </tr>
          <tr>
            <td>Email</td>
            <td style=\"color:#999\"> {$_POST[email]} </td>
          </tr> 
         </table>
         <p>" . nl2br(htmlentities($_POST[message])) . "</p> ";

	echo wp_mail( 'admin@optionmarine.com.au', 'New contact from optionmarine.com.au', $_msg, array( 'From: website@optionmarine.com.au', 'Reply-to: ' . $_POST[email], 'Content-type: text/html' ) );

	exit;
	
}
*/

/* DON'T DELETE THIS CLOSING TAG */ ?>
