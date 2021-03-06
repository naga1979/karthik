<?php
global $porto_settings, $post, $porto_portfolio_view, $porto_portfolio_thumb, $porto_portfolio_thumb_bg, $porto_portfolio_thumb_image, $porto_portfolio_ajax_load, $porto_portfolio_ajax_modal;

$portfolio_view = ($porto_portfolio_view && $porto_portfolio_view != 'classic') ? $porto_portfolio_view : $porto_settings['portfolio-related-style'];
$portfolio_thumb = $porto_portfolio_thumb ? $porto_portfolio_thumb : $porto_settings['portfolio-related-thumb'];
$portfolio_thumb_bg = $porto_portfolio_thumb_bg ? $porto_portfolio_thumb_bg : $porto_settings['portfolio-related-thumb-bg'];
$portfolio_thumb_image = $porto_portfolio_thumb_image ? $porto_portfolio_thumb_image : $porto_settings['portfolio-related-thumb-image'];
$portfolio_show_link = $porto_settings['portfolio-related-link'];
$portfolio_show_zoom = $porto_settings['portfolio-zoom'];
$portfolio_ajax = false;
$portfolio_ajax_modal = false;

if ($porto_portfolio_ajax_load == 'yes') $portfolio_ajax = true;
else if ($porto_portfolio_ajax_load == 'no') $portfolio_ajax = false;

if ($porto_portfolio_ajax_modal == 'yes') $portfolio_ajax_modal = true;
else if ($porto_portfolio_ajax_modal == 'no') $portfolio_ajax_modal = false;

$featured_images = porto_get_featured_images();
$portfolio_link = get_post_meta($post->ID, 'portfolio_link', true);
$show_external_link = $porto_settings['portfolio-external-link'];

$count = count($featured_images);

$classes = array();
if ($portfolio_view == 'full')
    $classes[] = 'thumb-info-no-borders';
if ($portfolio_thumb_bg)
    $classes[] = 'thumb-info-' . $portfolio_thumb_bg;

switch ($portfolio_thumb) {
    case 'centered-info': $classes[] = 'thumb-info-centered-info'; break;
    case 'bottom-info': $classes[] = 'thumb-info-bottom-info'; break;
    case 'bottom-info-dark': $classes[] = 'thumb-info-bottom-info thumb-info-bottom-info-dark'; break;
    case 'hide-info-hover': $classes[] = 'thumb-info-centered-info thumb-info-hide-info-hover'; break;
}

if ($portfolio_thumb_image)
    $classes[] = 'thumb-info-' . $portfolio_thumb_image;

$class = implode(' ', $classes);

$ajax_attr = '';
if (!($show_external_link && $portfolio_link) && $portfolio_ajax) {
    $portfolio_show_zoom = false;
    if ($portfolio_ajax_modal)
        $ajax_attr = ' data-ajax-on-modal';
    else
        $ajax_attr = ' data-ajax-on-page';
}

$cat_list = '';
$terms = get_the_terms( $post->ID, 'portfolio_cat' );
if ( !is_wp_error( $terms ) && !empty($terms) ) {
    $links = array();
    foreach ( $terms as $term ) {
        $links[] = $term->name;
    }
    $cat_list = join( ', ', $links );
}

if ($count) :
    $attachment_id = $featured_images[0]['attachment_id'];
    $attachment = porto_get_attachment($attachment_id);
    $attachment_related = porto_get_attachment($attachment_id, 'related-portfolio');
    if ($attachment && $attachment_related) :
        ?>
        <div class="portfolio-item <?php echo $portfolio_view == 'outimage' ? 'align-center' : $portfolio_view ?>">
            <a class="text-decoration-none" href="<?php if ($show_external_link && $portfolio_link) echo $portfolio_link; else the_permalink() ?>"<?php echo $ajax_attr ?>>
                <span class="thumb-info <?php echo $class ?>">
                    <span class="thumb-info-wrapper">
                        <img class="img-responsive<?php echo $portfolio_view == 'outimage' ? ' tf-none' : '' ?>" width="<?php echo $attachment_related['width'] ?>" height="<?php echo $attachment_related['height'] ?>" src="<?php echo $attachment_related['src'] ?>" alt="<?php echo $attachment_related['alt'] ?>" />
                        <?php if ($portfolio_view != 'outimage') : ?>
                            <span class="thumb-info-title">
                                <span class="thumb-info-inner"><?php the_title(); ?></span>
                                <?php
                                if (in_array('cats', $porto_settings['portfolio-metas']) && $cat_list) : ?>
                                    <span class="thumb-info-type"><?php echo $cat_list ?></span>
                                <?php endif; ?>
                            </span>
                            <?php if ($portfolio_show_link) : ?>
                            <span class="thumb-info-action">
                                <span class="thumb-info-action-icon"><i class="fa <?php echo $ajax_attr ? 'fa-plus-square' : 'fa-link' ?>"></i></span>
                            </span>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if ($portfolio_show_zoom) : ?>
                            <span class="zoom" data-src="<?php echo $attachment['src'] ?>" data-title="<?php echo $attachment['caption'] ?>"><i class="fa fa-search"></i></span>
                        <?php endif; ?>
                    </span>
                </span>
                <?php if ($portfolio_view == 'outimage') : ?>
                    <h4 class="m-t-md m-b-none"><?php the_title(); ?></h4>
                    <?php
                    if (in_array('cats', $porto_settings['portfolio-metas']) && $cat_list) : ?>
                        <p class="m-b-sm color-body"><?php echo $cat_list ?></p>
                    <?php endif;
                endif; ?>
            </a>
        </div>
    <?php
    endif;
endif;