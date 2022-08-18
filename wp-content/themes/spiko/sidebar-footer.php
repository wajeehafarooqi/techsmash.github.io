<?php
/**
 * Footer Widget Area
 *
 * @package spiko
 */
?>
<div class="row footer-sidebar footer-typo">
    <?php
     $spiko_footer_widget=get_theme_mod('footer_widgets_section',3);
        switch ( $spiko_footer_widget )
        {   
          case 2:
          get_template_part('inc/footer-widget/layout-1');
          break;

          case 3:
          get_template_part('inc/footer-widget/layout-2');
          break;

          case 4:
          get_template_part('inc/footer-widget/layout-3');
          break;

        }
    ?>
</div>