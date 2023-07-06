<?php

add_action('wp_enqueue_scripts', 'theme_admin_enqueue_styles');

function theme_admin_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
    wp_enqueue_style('image-titre-widget', get_stylesheet_directory_uri() . '/css/widgets/image-titre-widget.css', array(), filemtime(get_stylesheet_directory() . '/css/widgets/image-titre-widget.css'));
    wp_enqueue_style('banniere-titre-shortcode', get_stylesheet_directory_uri() . '/css/shortcodes/banniere-titre.css', array(), filemtime(get_stylesheet_directory() . '/css/shortcodes/banniere-titre.css'));
}

/* widgets */
require_once(__DIR__ . '/widgets/ImageTitreWidget.php');

function register_widgets()
{
    register_widget('image_titre_widget');
}
add_action('widgets_init', 'register_widgets');

/* SHORTCODES */


// Je dis à wordpress que j'ajoute un shortcode 'banniere-titre'
add_shortcode('banniere-titre', 'banniere_titre_func');
// Je génère le html retourné par mon shortcode
function banniere_titre_func($atts)
{
    //Je récupère les attributs mis sur le shortcode
    $atts = shortcode_atts(array(
        'src' => '',
        'titre' => 'Titre'
    ), $atts, 'banniere-titre');

    //Je commence à récupéré le flux d'information
    ob_start();

    if ($atts['src'] != "") {
?>

        <div class="banniere-titre" style="background-image: url(<?= $atts['src'] ?>)">
            <h2 class="titre"><?= $atts['titre'] ?></h2>
        </div>

    <?php
    } else {
    ?>

        <div class="banniere-titre">
            <h2 class="titre"><?= $atts['titre'] ?></h2>
        </div>

<?php
    }

    //J'arrête de récupérer le flux d'information et le stock dans la fonction $output
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}
