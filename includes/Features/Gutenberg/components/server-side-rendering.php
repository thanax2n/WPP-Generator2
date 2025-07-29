<?php

/**
 * Custom Gutenberg Block.
 * 
 * Server side rendering.
 */

defined('ABSPATH') || exit;

?>

<div class="wp-block-create-block-random-posts-list">

    <?php if (!empty($robots)) : ?>
        <div class="ai-robots-posts-grid">

            <?php foreach ($robots as $robot) : ?>
                <article class="ai-robot-post-card">

                    <div class="post-content">

                        <h3 class="post-title">
                            <a href="#" class="robot-title-link"><?php echo esc_html($robot->title); ?></a>
                        </h3>

                        <div class="post-meta">
                            <span class="robot-id">ID: <?php echo esc_html($robot->id); ?></span>
                        </div>

                        <?php if (!empty($robot->description)) : ?>
                            <div class="post-excerpt">
                                <p><?php echo esc_html(wp_trim_words($robot->description, 20, '...')); ?></p>
                            </div>
                        <?php endif; ?>

                    </div>

                </article>
            <?php endforeach; ?>

        </div>

    <?php else : ?>
        <div class="no-posts-message">
            <div class="no-posts-content">
                <div class="no-posts-icon">🤖</div>
                <h3><?php echo esc_html__('No AI Robots Found', 'wpp-generator-next'); ?></h3>
                <p><?php echo esc_html__('There are currently no AI robots published. Check back later for new additions!', 'wpp-generator-next'); ?></p>
            </div>
        </div>
    <?php endif; ?>

</div>