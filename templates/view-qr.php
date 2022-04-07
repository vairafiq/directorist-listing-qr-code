<?php
// prevent direct access to the file
defined('ABSPATH') || die('No direct script access allowed!');
?>
<div class="directorist-single-info directorist-single-info-email">

	<div class="directorist-single-info__label">
		<span class="directorist-single-info__label-icon"><?php directorist_icon( $field_data['icon'] );?></span>
		<span class="directorist-single-info__label--text"><?php echo esc_html( $field_data['label'] ); ?></span>
	</div>
	
	<div class="directorist-single-info__value">
        <?php
            directorist_qrCodeGenerator( $field_data['qr_width'], $field_data['qr_height'], $field_data['value'] );
        ?>
    </div>
	
</div>