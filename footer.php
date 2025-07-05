<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LesPtitnours
 */

?>

<footer class="footer text-center">
    <div>
        <?php
        printf(esc_html__('Theme: %1$s by %2$s.', 'lesptitnours'), 'lesptitnours', '<a href="https://github.com/GuillaumeCasbas">Guillaume Casbas</a>');
        ?>
    </div>
</footer>
</div>

<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>