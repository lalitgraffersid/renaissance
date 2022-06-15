<?php

$modules            = pp_get_modules();
$extensions         = pp_get_extensions();
$enabled_modules    = pp_get_enabled_modules();
$enabled_extensions = pp_get_enabled_extensions();
?>

<table class="form-table">
	<tr valign="top">
		<th scope="row" valign="top">
			<?php esc_html_e('Enable/Disable Extensions', 'powerpack'); ?>
		</th>
		<td>
			<?php
			foreach ( $extensions as $extension_name => $extension_title ) :
				$extension_enabled = false;

				if ( is_array( $enabled_extensions ) && ( in_array( $extension_name, $enabled_extensions ) ) || isset( $enabled_extensions[ $extension_name ] ) ) {
					$extension_enabled = true;
				}
				if ( ! is_array( $enabled_extensions ) && 'disabled' != $enabled_extensions ) {
					$extension_enabled = true;
				}
				?>
			<p>
				<label for="<?php echo $extension_name; ?>">
					<input
						id="<?php echo $extension_name; ?>"
						name="pp_enabled_extensions[]"
						type="checkbox"
						value="<?php echo $extension_name; ?>"
						<?php echo $extension_enabled ? ' checked="checked"' : '' ?>
					/>
						<?php echo $extension_title; ?>
				</label>
			</p>
			<?php endforeach; ?>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row" valign="top">
			<?php esc_html_e('Enable/Disable Widgets', 'powerpack'); ?>
		</th>
		<td>
				<button type="button" class="button toggle-all-widgets"><?php _e( 'Toggle All', 'powerpack' ); ?></button>
			<?php
			foreach ( $modules as $module_name => $module_title ) :
				if ( ! is_array( $enabled_modules ) && 'disabled' != $enabled_modules ) {
					$module_enabled = true;
				} elseif ( ! is_array( $enabled_modules ) && 'disabled' === $enabled_modules ) {
					$module_enabled = false;
				} else {
					$module_enabled = in_array( $module_name, $enabled_modules ) || isset( $enabled_modules[ $module_name ] );
				}
			?>
			<p>
				<label for="<?php echo $module_name; ?>">
					<input
						id="<?php echo $module_name; ?>"
						name="pp_enabled_modules[]"
						type="checkbox"
						value="<?php echo $module_name; ?>"
						<?php echo $module_enabled ? ' checked="checked"' : '' ?>
					/>
						<?php echo $module_title; ?>
				</label>
			</p>
			<?php endforeach; ?>
		</td>
	</tr>
</table>

<?php wp_nonce_field('pp-modules-settings', 'pp-modules-settings-nonce'); ?>
<?php submit_button(); ?>

<script>
(function($) {
	if ( $('input[name="pp_enabled_modules[]"]:checked').length > 0 ) {
		$('.toggle-all-widgets').addClass('checked');
	}
	$('.toggle-all-widgets').on('click', function() {
		if ( $(this).hasClass('checked') ) {
			$('input[name="pp_enabled_modules[]"]').removeAttr('checked');
			$(this).removeClass('checked');
		} else {
			$('input[name="pp_enabled_modules[]"]').attr('checked', 'checked');
			$(this).addClass('checked');
		}
	});
})(jQuery);
</script>