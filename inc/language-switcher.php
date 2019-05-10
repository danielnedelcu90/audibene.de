<?php
/**
 * Implementation of language switcher functions
 */

$hreflang = get_blog_option( get_current_blog_id(), 'audibene_hreflang_iso_code', false );
$browser_lang = substr( $_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2 );
$language_detect_arr = array(
	'de-ch' => 'Souhaitez-vous consulter la version française de ce site ? <a href="https://www.audibene.ch/fr/" class="language-switcher-bar-redirect">Version française</a>',
    'fr-ch' => 'Möchten Sie die deutsche Version dieser Seite sehen? <a href="https://www.audibene.ch/" class="language-switcher-bar-redirect">Deutsche Version</a>'
);
?>
<?php if ( is_front_page() && array_key_exists( $hreflang, $language_detect_arr ) && substr( $hreflang, 0, 2 ) !== $browser_lang && !isset( $_COOKIE['language_switcher'] ) ) { ?>

<div class="language-switcher-bar">
    <div class="language-switcher-bar-close <?php echo 'hl-' . substr( $hreflang, 0, 2 ) . ' bl-' .$_SERVER['HTTP_ACCEPT_LANGUAGE']; ?>"></div>
    <p>
        <?php
            echo $language_detect_arr[$hreflang];
        ?>
    </p>
</div>

<?php } ?>