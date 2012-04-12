<?php get_header(); ?>
<div id="contentboard">
<div class="container">
<div id="content">
<div class="inner">
<div class="inner2">
<?php if (have_posts()) : ?>
  <ul id="skip"> 
  <?php while (have_posts()) : the_post(); ?>    
    <li><a href="#post-<?php the_ID(); ?>"><?php the_title(); ?></a></li>    
  <?php endwhile; ?>
  </ul> 
<?php endif; rewind_posts(); ?>
<?php /* get_search_form(); */ ?>
<form role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>" autocomplete="off">
    <label class="screen-reader-text" for="s">Search </label>
    <input type="text" value="" name="s" id="s">
    <input type="submit" id="searchsubmit" value="Search">
</form>
POPULAR: 
<?php the_popular_tags(); ?>
<br/>
<br/>
<?php
    global $wp_query;
    $args = array_merge( $wp_query->query, array( 'post_type' => TAGOLOGY_POST_TYPE ) );
    query_posts( $args );
?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part( 'loop', 'index' ); ?>
  <?php endwhile; ?>  
  <div class="paginate">
    <?php if(function_exists('wp_paginate')) { wp_paginate(); } ?>
  </div>
<?php endif; ?>
</div>
</div>
</div>
</div>
</div>
<?php get_footer(); ?>
