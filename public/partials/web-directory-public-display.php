<div id="website-directory" class="container">
  <div id="assets-tpl" data-root="<?php echo get_site_url(); ?>">

    <div id="mobile-menu" v-on:click="showMobileMenu = !showMobileMenu"><?php echo __('TAGS',''); ?></div>
    <div class="tile is-ancestor">
      <div class="tile is-parent is-light">
        <div class="tile">
          <div class="content">
            <div id="side-menu" v-bind:class="{ mobile: showMobileMenu }">
              <span id="mobile-closer" v-on:click="showMobileMenu = !showMobileMenu"><?php echo __('FERMER',''); ?></span>
              <div class="">

                <template v-for="term in terms">
                  <div class="field">
                    <a
                        v-bind:class="{ active: term.slug === currentTerm.slug }"
                        class="tag"
                        v-on:click="currentTerm = term"
                        :id="term.slug">
                      {{ term.name }} ({{ term.count }})
                    </a>
                  </div>
                </template>

              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="tile is-parent is-vertical is-10">
        <article class="tile is-child notification is-white">
          <div class="content">
            <p class="title">{{ currentTerm.name }}</p>
            <div class="content">



              <div id="list-grid" class="columns is-multiline">

                <div class="column is-half grid-item animated fadeInUp" v-for="post in assets_posts">
                  <div class="card assets-card">
                    <div class="card-content">
                      <div class="columns">
                        <div class="column is-2 only-desktop">
                          <img
                              :src=" post.link | clearBit"
                              :alt="post.title.rendered"
                              class="cie-logo"
                          />
                        </div>
                        <div class="column">
                          <header class="entry-header">
                            <h2 class="entry-title">{{ post.title.rendered }}</h2>
                            <a target="_blank" rel="no-follow" v-bind:href="post.link">
                              {{ post.link | hostName }}
                            </a>
                          </header>
                          <div v-html="post.content.rendered"></div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>

              </div>


            </div>
          </div>
        </article>
      </div>

    </div>





    <div id="list-grid" class="columns is-multiline">

	    <?php
	    $orga_terms = get_field('order_by_terms');

	    $args_terms = array(
		    'taxonomy' => 'type',
		    'hide_empty' => true,
	    );
	    $terms = get_terms($args_terms);

	    foreach($terms as $term) {

		    echo '<div class="column is-12 term-'.$term->slug.'">';
		    echo '<h2>' . $term->name . '</h2>';
		    echo '</div>';

		    //get acf options
		    $post_types     = ( get_field( 'post_type' ) ) ? get_field( 'post_type' ) : 'post';
		    $posts_per_page = ( get_field( 'posts_per_page' ) ) ? get_field( 'posts_per_page' ) : '10';
		    $order          = ( get_field( 'order' ) ) ? get_field( 'order' ) : '10';
		    $orderby        = ( get_field( 'orderby' ) ) ? get_field( 'orderby' ) : 'date';
		    $terms_arg      = isset( $term ) ? array(
			    'taxonomy' => 'type',
			    'field'    => 'slug',
			    'terms'    => $term->slug,
		    ) : '';
		    $arguments      = array(
			    //'category_name' => 'projets',
			    'post_type'           => $post_types,
			    'ignore_sticky_posts' => 0,
			    'posts_per_page'      => $posts_per_page,
			    'order'               => $order,
			    'orderby'             => $orderby,
			    'tax_query'           => array(
				    array(
					    'taxonomy' => 'type',
					    'field'    => 'slug',
					    'terms'    => $term->slug,
				    )
			    ),
		    );
		    $the_query      = new WP_Query( $arguments );
		    if ( $the_query->have_posts() ) {
			    while ( $the_query->have_posts() ) {
				    $the_query->the_post();
				    get_template_part( 'template-parts/post/content', 'grid' );
			    }
			    wp_reset_postdata();
		    }
	    }


	    ?>
    </div>


  </div>
</div>


