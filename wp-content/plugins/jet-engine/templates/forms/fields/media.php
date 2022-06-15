<?php
/**
 * Media field template
 */
$this->add_attribute( 'name', $args['name'] . '_input' );
$this->add_attribute( 'type', 'file' );
$this->add_attribute( 'data-form_id', $this->form_id );
$this->add_attribute( 'data-field', $args['name'] );

if ( ! empty( $args['max_files'] ) ) {
	$this->add_attribute( 'data-max_files', absint( $args['max_files'] ) );
	$this->add_attribute( 'multiple', true );
}

if ( ! empty( $args['allowed_mimes'] ) ) {
	$this->add_attribute( 'accept', implode( ',', $args['allowed_mimes'] ) );
}

$max_size = Jet_Engine_Forms_File_Upload::instance()->get_max_size_for_field( $args );

$this->add_attribute( 'data-max_size', $max_size );

$required = $this->get_required_val( $args );

if ( $required ) {
	$required = 'required="required"';
}

?>
<div class="jet-engine-file-upload">
	<div class="jet-engine-file-upload__content">
		<?php echo Jet_Engine_Forms_File_Upload::instance()->get_loader(); ?>
		<div class="jet-engine-file-upload__files"><?php
			echo Jet_Engine_Forms_File_Upload::instance()->get_result_html( $args );
		?></div>
	</div>
	<div class="jet-engine-file-upload__fields">
		<input class="jet-engine-file-upload__value" type="hidden" name="<?php echo $args['name'] ?>" value="<?php echo htmlspecialchars( json_encode( Jet_Engine_Forms_File_Upload::instance()->get_result_value( $args ) ) ); ?>" <?php echo $required; ?>>
		<input class="jet-form__field file-field jet-engine-file-upload__input"<?php $this->render_attributes_string(); ?>>
	</div>
	<div class="jet-engine-file-upload__message"><small><?php _e( 'Maximum file size', 'jet-engine' );?>: <?php echo size_format( $max_size ); ?></small></div>
	<div class="jet-engine-file-upload__errors is-hidden"></div>
</div>