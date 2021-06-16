<?php /*
Template Name: TrackVia
*/ ?>
<?php get_header(); ?>

<!-- Row for main content area -->
  <div id="content" class="row">
  <div style="padding-top: 1rem;" class="request-info-msg"><p class="success" style="margin: 0 1rem 1rem; padding: 1rem; border: 1px solid green; color: black;">Thanks for submitting your request for information. We will be in touch soon!</p></div>
  <div class="small-12 large-8 columns" role="main">
  
  <?php /* Start loop */ ?>
  <?php while (have_posts()) : the_post(); ?>
    <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
      <header>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php // reverie_entry_meta(); ?>
      </header>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>

</article>
  <?php endwhile; // End the loop ?>

  </div>
  <?php get_sidebar(); ?>
  </div>

  <script type="text/javascript">
    function GetUrlValue(VarSearch){
      var SearchString = window.location.search.substring(1);
      var VariableArray = SearchString.split('&');
      for(var i = 0; i < VariableArray.length; i++){
          var KeyValuePair = VariableArray[i].split('=');
          if(KeyValuePair[0] == VarSearch){
              return KeyValuePair[1];
          }
      }
    }
    if ( GetUrlValue('success') ){
      jQuery('.request-info-msg').slideDown();
    }

  </script>
    
<?php get_footer(); ?>