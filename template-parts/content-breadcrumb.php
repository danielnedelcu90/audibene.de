<?php
/**
 * Template part for displaying breadcrumb content in content_page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package audibene
 */
?>


 <section class="breadcrumb-section <?php displayClass(); ?>">
    <div class="breadcrumb-container">
        <div class="breadcrumb-wrapper">
	        <?php if (function_exists('audibene_breadcrumbs')) audibene_breadcrumbs(); ?>

        </div>
    </div>
</section>
