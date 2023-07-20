<?php

add_action('wp_enqueue_scripts', 'theme_admin_enqueue_styles');

function theme_admin_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
    wp_enqueue_style('bloc-image-titre-widget', get_stylesheet_directory_uri() . '/css/widgets/bloc-image-titre-widget.css', array(), filemtime(get_stylesheet_directory() . '/css/widgets/bloc-image-titre-widget.css'));
    wp_enqueue_style('banniere-titre-shortcode', get_stylesheet_directory_uri() . '/css/shortcodes/banniere-titre.css', array(), filemtime(get_stylesheet_directory() . '/css/shortcodes/banniere-titre.css'));
}

/* WIDGETS */

require_once(__DIR__ . '/widgets/BlocImageTitreWidget.php');

function register_widgets()
{
    register_widget('bloc_image_titre_widget');
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

/* HOOK FILTERS */

// change le titre des articles de la catégorie outils
function the_title_filter($title)
{
    if (is_single() && in_category('outils')) {
        return 'Outil: ' . $title;
    }
    return $title;
}

add_filter('the_title', 'the_title_filter');

// change le titre des pages archives par "liste des "+ nom de la catégorie
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = 'Liste des ' . strtolower(single_cat_title('', false));
    }
    return $title;
});

// Change le lien vers la catégorie "Outils"
function the_category_filter($categories)
{
    return str_replace("Outils", "Tous les outils", $categories);
}

add_filter('the_category', 'the_category_filter');

// ajoute une ligne et le titre "description" avant d'afficher le contenu d'un article dans la catégorie "outils" uniquement
function the_content_filter($content)
{
    if (is_single() && in_category('outils')) {
        return '<hr><h2>Description</h2>' . $content;
    }
    return $content;
}

add_filter('the_content', 'the_content_filter');

// ajoute un lien a la fin de l'excerpt pour accéder a la page article 
function the_excerpt_filter($content)
{
    if (is_archive()) {
        return $content . '<div class="more-excerpt"><a href="' . get_the_permalink() . '">En savoir plus sur l\'outil</a></div>';
    }
    return $content;
}

add_filter('the_excerpt', 'the_excerpt_filter');

/* HOOK ACTIONS */

function loop_end_action()
{
    // syntaxe if différente
    if (is_archive()) :
    ?>
        <p>
            <?php
            echo do_shortcode('[banniere-titre src="http://localhost/bricotips/wp-content/uploads/2023/07/workTips.jpeg" titre="Bricotips"]')
            ?>
        </p>
    <?php
    endif;
}
add_action('loop_end', 'loop_end_action');

$shown = false; // déclare un booleen pour déterminer si le texte a été vu
function bricotips_intro_section_action()
{
    global $shown; // utilise la variable $shown dans la fonction
    if (is_archive() && in_category('outils') && !$shown) {
    ?>
        <p class="intro">
            Vous trouverez dans cette page une liste de tous les outils référencés par Bricotips.
            Cette liste n'est pas exhaustive mais sera enrichie au fur et à mesure du temps.
        </p>
<?php
        $shown = true; // passe a vu = true
    }
}
add_action('bricotips_intro_section', 'bricotips_intro_section_action');
