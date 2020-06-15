<?php
/*
 * Template Name: Шаблон страницы "Главной страницы"
 * Template Post Type: page
 *
 * @package test
 */
?>
<?php
get_header();
?>


    <section id="first_section">
        <img src="<?php echo get_field("top_img") ?>" alt="<?php echo get_field("top_img") ?>">
        <div class="text_block">
            <h1><?php echo get_field('big_text') ?></h1>
            <p><?php echo get_field('small_text') ?></p>
        </div>
        <div class="numbers container">
            <?php
            $rows = get_field('numbers');
            if ($rows) {
                ?>
                <?php foreach ($rows as $row) {
                    ?>
                    <div class="number">
                        <?php $number = $row['number'];
                        $text = $row['text'];
                        ?>
                        <?php if (!empty($number) && !empty($text)): ?>
                            <p class="number_number"><?php echo $number ?></p>
                            <p class="number_text"><?php echo $text ?></p>
                        <?php endif; ?>
                    </div>
                <?php } ?>

            <?php } ?>
        </div>
    </section>
    <section id="project_block" class="container">
        <p class="block_title"><?php echo get_field('title_great_project') ?></p>
        <div class="project_block">
            <?php $posts_project = get_posts(array(
                'numberposts' => -1,
                'category' => 0,
                'orderby' => 'date',
                'order' => 'ASC',
                'include' => array(),
                'exclude' => array(),
                'meta_key' => '',
                'meta_value' => '',
                'post_type' => 'great_project',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ));
            foreach ($posts_project as $post):
                setup_postdata($post);
                $title_project = get_the_title($post->ID); ?>
                <div class="project_card">
                    <img src="<?php echo get_field('img') ?>" alt="<?php echo get_field('img') ?>">
                    <div class="orange_line"></div>
                    <p class="project_title"><?php echo $title_project ?></p>
                    <p class="project_desc"><?php echo get_field('desc') ?></p>
                </div>
            <?php endforeach;
            wp_reset_postdata(); ?>
        </div>
    </section>
    <section id="orange_block">
        <div class="container orange_block">
            <div class="orange_text">
                <p class="first_text"><?php echo get_field('first_text') ?></p>
                <p class="second_text"><?php echo get_field('second_text') ?></p>
            </div>
            <button><img src="<?php echo get_field('button_icon') ?>"
                         alt="<?php echo get_field('button_icon') ?>"><?php echo get_field('button_text') ?></button>
        </div>
    </section>
    <section id="what_doing_block">
        <p class="block_title"><?php echo get_field('what_doing') ?></p>
        <div class="container what_doing_block">
            <?php
            $rows = get_field('what_doing_img_title');
            if ($rows) {
                foreach ($rows as $row) {
                    ?>
                    <div class="what_doing_card">
                        <?php $image = $row['img'];
                        $title = $row['title'];
                        if (!empty($image)): ?>
                            <img src="<?php echo $image; ?>" alt="<?php echo $image; ?>"/>
                            <p><?php echo $title ?></p>
                        <?php endif; ?>
                    </div>
                <?php }
            } ?>
        </div>
    </section>
    <section id="img_block">
        <?php
        $rows = get_field('images_over_answers');
        if ($rows) {
            foreach ($rows as $row) {
                $image = $row['img'];
                if (!empty($image)): ?>
                    <img src="<?php echo $image; ?>" alt="<?php echo $image; ?>"/>
                <?php endif; ?>
            <?php }
        } ?>
    </section>
    <section id="answer_block">
        <p class="block_title"><?php echo get_field('title_answer') ?></p>
        <div class="accordion container" id="accordionExample">
            <?php $posts_project = get_posts(array(
                'numberposts' => -1,
                'category' => 0,
                'orderby' => 'date',
                'order' => 'ASC',
                'include' => array(),
                'exclude' => array(),
                'meta_key' => '',
                'meta_value' => '',
                'post_type' => 'answer',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ));
            $answer_count = 0;
            foreach ($posts_project as $post):
                setup_postdata($post);
                $title_answer = get_the_title($post->ID);
                $answer_count++;
                if ($answer_count === 1) {
                    $show_class = 'show';
                    $triangle_right = 'triangle-right';
                    $clicked = 'clicked';
                } else {
                    $show_class = '';
                    $triangle_right = '';
                    $clicked = '';
                }
                ?>
                <div class="card">
                    <div class="card-header <?php echo $show_class ?>" id="heading<?php echo $answer_count ?>">
                        <div id="triangle-up" class="<?php echo $triangle_right ?>"></div>
                        <button class="btn btn-link <?php echo $clicked ?>" type="button" data-toggle="collapse"
                                data-target="#collapse<?php echo $answer_count ?>" aria-expanded="true"
                                aria-controls="collapse<?php echo $answer_count ?>">
                            <?php echo $title_answer ?>
                        </button>
                    </div>
                    <div id="collapse<?php echo $answer_count ?>" class="collapse <?php echo $show_class ?> answer_text"
                         aria-labelledby="heading<?php echo $answer_count ?>" data-parent="#accordionExample">
                        <div class="card-body">
                            <?php echo get_field('answer') ?>
                        </div>
                    </div>
                </div>
            <?php endforeach;
            wp_reset_postdata(); ?>
        </div>
    </section>
    <section id="partners_block">
        <p class="block_title"><?php echo get_field('partners_title') ?></p>
        <div class="partners container">
            <?php
            $rows = get_field('partners_img');
            if ($rows) {
                foreach ($rows as $row) {
                    $image = $row['img'];
                    if (!empty($image)): ?>
                        <img src="<?php echo $image; ?>" alt="<?php echo $image; ?>"/>
                    <?php endif; ?>
                <?php }
            } ?>
        </div>
    </section>
    <section id="reviews_block">
        <p class="block_title"><?php echo get_field('reviews_title') ?></p>
        <div class="reviews_block container">
            <?php $posts_project = get_posts(array(
                'numberposts' => -1,
                'category' => 0,
                'orderby' => 'date',
                'order' => 'ASC',
                'include' => array(),
                'exclude' => array(),
                'meta_key' => '',
                'meta_value' => '',
                'post_type' => 'reviews',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ));
            $answer_count = 0;
            foreach ($posts_project as $post):
                setup_postdata($post);
                ?>
            <div class="reviews">
                <div class="reviews_card">
                    <svg width="34" height="28" viewBox="0 0 34 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.208 27.736C0.208 24.728 0.272 21.176 0.4 17.08C0.592 11.256 1.52 7.032 3.184 4.408C4.848 1.784 7.792 0.471998 12.016 0.471998L13.168 5.368C10.864 5.432 9.296 6.2 8.464 7.672C7.696 9.08 7.312 11.192 7.312 14.008H14.032V27.736H0.208ZM19.888 27.736C19.888 24.728 19.952 21.176 20.08 17.08C20.272 11.256 21.2 7.032 22.864 4.408C24.528 1.784 27.472 0.471998 31.696 0.471998L32.848 5.368C30.544 5.432 28.976 6.2 28.144 7.672C27.376 9.08 26.992 11.192 26.992 14.008H33.712V27.736H19.888Z" fill="#EE913B"/>
                    </svg>
                    <p><?php echo get_field('reviews_text')?></p>
                </div>
                <div class="reviews_author">
                    <span><?php echo  get_field('review_author')?>, </span>
                    <span><?php echo  get_field('review_фuthor_сompany')?></span>
                </div>
            </div>
            <?php endforeach;
            wp_reset_postdata(); ?>
        </div>
    </section>
    <section id="orange_block">
        <div class="container orange_block">
            <div class="orange_text">
                <p class="first_text"><?php echo get_field('want_to_work_first') ?></p>
                <p class="second_text"><?php echo get_field('want_to_work_second') ?></p>
            </div>
            <button><img src="<?php echo get_field('button_icon') ?>"
                         alt="<?php echo get_field('button_icon') ?>"><?php echo get_field('button_text') ?></button>
        </div>
    </section>

<?php
get_footer();
