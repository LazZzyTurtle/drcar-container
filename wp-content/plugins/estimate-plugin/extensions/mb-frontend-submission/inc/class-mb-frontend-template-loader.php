<?php
/**
 * The template loader for frontend submission plugin.
 *
 * @package    Meta Box
 * @subpackage MB Frontend Form Submission
 */

/**
 * The template loader class.
 */
class MB_Frontend_Template_Loader extends Gamajo_Template_Loader {
	/**
	 * Prefix for filter names.
	 *
	 * @var string
	 */
	protected $filter_prefix = 'mb_frontend';

	/**
	 * Directory name where custom templates for this plugin should be found in the theme.
	 *
	 * @var string
	 */
	protected $theme_template_directory = 'mb-frontend-submission';

	/**
	 * Reference to the root directory path of this plugin.
	 * Can either be a defined constant, or a relative reference from where the subclass lives.
	 *
	 * @var string
	 */
	protected $plugin_directory = MB_FRONTEND_SUBMISSION_DIR;

	/**
	 * Directory name where templates are found in this plugin.
	 * Can either be a defined constant, or a relative reference from where the subclass lives.
	 * e.g. 'templates' or 'includes/templates', etc.
	 *
	 * @var string
	 */
	protected $plugin_template_directory = 'templates';
}
