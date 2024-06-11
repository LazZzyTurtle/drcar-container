<?php
/**
 * The interface for interacting with object model.
 *
 * @package    Meta Box
 * @subpackage MB Frontend Submission
 */

/**
 * Object model interface.
 */
interface MB_Frontend_Object_Model {
	/**
	 * Render the object in the frontend.
	 */
	public function render();

	/**
	 * Save submitted data.
	 */
	public function save();
}
