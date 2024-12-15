<div id="contact-modal" class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        
        <!-- En-tête de la modale avec une image -->
        <div class="modal-header">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Contact-header.png" alt="Header" class="modal-header-img">
        </div>
        
        <!-- Formulaire de contact intégré avec Contact Form 7 -->
        <div class="modal-body">
            <!-- Shortcode de Contact Form 7 -->
            <?php echo do_shortcode('[contact-form-7 id="3bc2862" title="Formulaire de contact"]'); ?>
        </div>
    </div>
</div>
