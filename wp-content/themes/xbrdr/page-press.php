<?php get_header(); ?>

<div class="container-fluid wider-page" id="page">
  <?php
    rps_print_secondary_navigation();
    rps_print_breadcrumbs();
  ?>
  <div class="tab-pane active" id="press">
    <div class="row-fluid">
      <div class="span12">
        <h1>Press</h1>
      </div>
    </div>
    <div class="row-fluid">
      <div class="span3 well">
        <?php dynamic_sidebar('rps-press-widget'); ?>
      </div>

      <div class="span9" id="news-column">
      <?php
        $args = array('post_type' => 'post');
        $query = new WP_Query($args);
        while ($query->have_posts()): $query->the_post();
        ?>
        <article>
          <div class="news-item">
            <header>
              <h1 class="news-item-header"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <time datetime="<?php the_time('Y-m-d'); ?>"><strong><?php the_time('j F, Y'); ?></strong></time>
            </header>
            <?php $options = array('link' => true, 'words' => 60) ?>
            <?php rps_nicer_excerpt($options); ?>
          </div>
        </article>
      <?php endwhile; wp_reset_query(); ?>
      </div>
      <?php get_footer(); ?>
