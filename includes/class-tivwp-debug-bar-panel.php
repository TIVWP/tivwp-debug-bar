<?php

/**
 * Class TIVWP_Debug_Bar_Panel
 */
class TIVWP_Debug_Bar_Panel extends Debug_Bar_Panel {

	/**
	 * Output the collected data to the Debug Bar panel.
	 */
	public function render() {
		?>
		<h1><?php echo esc_html( $this->title() ); ?></h1>
		<hr />
		<?php

		echo implode( '<hr/>', TIVWP_Debug_Bar::getOutput() );
	}
}
