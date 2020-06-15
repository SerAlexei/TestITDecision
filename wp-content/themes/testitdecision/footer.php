<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TestITDecision
 */
$logo_adress = carbon_get_theme_option('logo_adress');
$title_adress = carbon_get_theme_option('title_adress');
$adress = carbon_get_theme_option('adress');
$logo_tels = carbon_get_theme_option('logo_tels');
$title_tel = carbon_get_theme_option('title_tel');
$tels = carbon_get_theme_option('tels');
$logo_time = carbon_get_theme_option('logo_time');
$title_time = carbon_get_theme_option('title_time');
$time_work = carbon_get_theme_option('time_work');
$logo_email = carbon_get_theme_option('logo_email');
$title_email = carbon_get_theme_option('title_email');
$e_mail = carbon_get_theme_option('e-mail');
?>

	<footer id="colophon" class="site-footer">
        <p class="block_title"><?php echo get_field('contacts_title') ?></p>
        <div class="site-info container">
            <div class="contact_card">
                <img src="<?php echo $logo_adress ?>" alt="<?php echo $logo_adress ?>">
                <p class="contact_title"><?php echo $title_adress?></p>
                <p class="contact_text"><?php echo $adress?></p>
            </div>
            <div class="contact_card">
                <img src="<?php echo $logo_tels ?>" alt="<?php echo $logo_tels ?>">
                <p class="contact_title"><?php echo $title_tel?></p>
                <div class="tels_block">
                    <?php
                    foreach ( $tels as $tel) { ?>
                        <a class="contact_text" href="tel:<?php echo str_replace(" ","",$tel['tel'])?>" class="">
                            <?php echo $tel['tel'] ?>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="contact_card">
                <img src="<?php echo $logo_time ?>" alt="<?php echo $logo_time ?>">
                <p class="contact_title"><?php echo $title_time?></p>
                <p class="contact_text"><?php echo $time_work?></p>
            </div>
            <div class="contact_card">
                <img src="<?php echo $logo_email ?>" alt="<?php echo $logo_email ?>">
                <p class="contact_title"><?php echo $title_email?></p>
                <a href="mailto:<?php echo $e_mail ?>" class=""><?php echo $e_mail?></a>
            </div>
		</div><!-- .site-info -->
        <div class="copyright">
            <div class="container">
                <span>© 2019 Строительная компания</span>
                <span>Сделано в IT Decision</span>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
