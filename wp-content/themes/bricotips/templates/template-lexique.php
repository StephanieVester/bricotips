<?php

/**
 * Template Name: Lexique Template
 * Template Post Type: page
 *
 * @package OpenCLassroom
 * @subpackage Bricotips
 * @since Bricotips 1.0
 */

$lexique = array(
    "Abattant" => "Châssis de fenêtre s’ouvrant horizontalement.",
    "Apprêt" => "Couche de peinture ou de papier peint posé sur un mur pour en améliorer l’aspect final.",
    "Béton" => "Agrégat de sable, de ciment et d’eau. Armé, il est coulé sur armature métallique. Cellulaire, il
    comporte des milliers de bulles qui lui confèrent une très bonne isolation et solidité.",
    "Chaume" => "Matériau de couverture fait de paille de seigle, de roseau, etc.",
    "Drain" => "Dispositif enterré destiné à capter les eaux souterraines.",
    "Entrait" => "Pièce de charpente horizontale joignant les arbalétriers.",
    "Greffer" => "Remplacer la partie endommagée d’une pièce de bois par un matériau sain.",
    "Lambourde" => "Poutre fixée le long d’un mur pour recevoir des solives sur lesquelles sont clouées les lames d’un
    parquet.",
    "Mortaise" => "Entaille faite dans une pièce de bois pour recevoir le tenon d’une autre pièce.",
);

get_header();
?>

<main id="lexique">

    <h1>Lexique du bricolage</h1>
    <section>
        <?php
        foreach ($lexique as $key => $def) {
            get_template_part('templates/parts/lexique-def', false, array('key' => $key, 'value' => $def));
        }
        ?>
    </section>

</main><!-- #site-content -->
<script>
    const mots = document.querySelectorAll("#lexique .mot");
    mots.forEach(mot => {
        mot.addEventListener("click", (e) => {
            if (!mot.classList.contains("open")) {
                mots.forEach(m => {
                    m.classList.remove("open");
                })
                mot.classList.add("open");
            } else mot.classList.remove("open");
        })
    })
</script>

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php
get_footer();
