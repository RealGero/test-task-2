<?php get_header(); ?>

<main class="wp-block-group blog page-template-default">
    <div class="container">
        <h2><?php echo get_the_title(); ?></h2>

        <?php
        // Define the arguments for the 'Upcoming Events' query
        $args_upcoming_events = array(
            'category_name' => 'upcoming-events',
            'posts_per_page' => 3 
        );

        // Retrieve posts using WP_Query
        $upcoming_events_query = new WP_Query($args_upcoming_events);
        ?>

        <div class="upcoming-events">
            <h3>Upcoming events</h3>
            <div class="article-container">
            <?php 
            // Check if there are any 'Upcoming Events' posts found
            if ($upcoming_events_query->have_posts()) {
                // Loop through the 'Upcoming Events' posts
                while ($upcoming_events_query->have_posts()) {
                    $upcoming_events_query->the_post();
                    ?>
                    <div class="post-<?php echo the_ID(); ?> post-item">
                        <?php if(has_post_thumbnail()) {?>
                            <div class="thumbnail">
                            <?php $url = get_the_post_thumbnail_url( get_the_ID()); ?>
                                <img src="<?php echo $url; ?>" alt="">
                            </div>
                        <?php  }; ?>
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>">Read more</a>
                    </div>
                    <?php
                }?>
                </div>

            <?php 
                $category = get_category_by_slug($args_upcoming_events['category_name']);
                $category_link = get_category_link($category->term_id);
              
              ?>
                 <a class="category-link" href="<?php echo esc_url($category_link) ?>">Go to Upcoming Events Category</a>
             <?php

            wp_reset_postdata();
             
            } else {
                // No 'Upcoming Events' posts found
                echo 'No upcoming events found.';
            } ?>
        </div>

        <div class="health-and-fitness-posts">
            <h3>Health and Fitness </h3>
            <div class="article-container">
            <?php
            // Define the arguments for the 'Health and Fitness' query
            $args_health_fitness = array(
                'category_name' => 'health-and-fitness',
                'posts_per_page' => '4'
            );

            // Retrieve posts using WP_Query
            $health_fitness_query = new WP_Query($args_health_fitness);

            // Check if there are any 'Health and Fitness' posts found
            if ($health_fitness_query->have_posts()) {
                // Loop through the 'Health and Fitness' posts
                while ($health_fitness_query->have_posts()) {
                    $health_fitness_query->the_post();
                    ?>
                   <div>
                        <?php if(has_post_thumbnail()) {?>
                            <div class="thumbnail">
                                <?php $url = get_the_post_thumbnail_url( get_the_ID()); ?>
                                <img src="<?php echo $url; ?>" alt="">
                            </div>
                        <?php  }; ?>
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>">Read more</a>
                    </div>
                    <?php
                }

                $category = get_category_by_slug($args_health_fitness['category_name']);
                $category_link = get_category_link($category->term_id);
                ?>
                 <a class="category-link"  href="<?php echo esc_url($category_link) ?>">Go to Health and Fitness Category</a>
                <?php

                wp_reset_postdata();
                
            } else {
                // No 'Health and Fitness' posts found
                echo 'No health and fitness posts found.';
            }?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
