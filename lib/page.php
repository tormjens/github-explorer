<?php

/**
 * Creates the admin interface
 */
class Github_Explorer_Page {

	/**
	 * Holds the data instance
	 * @var Github_Explorer_Data
	 */
	protected $data;

	/**
	 * Holds the plugin page hook
	 * @var string
	 */
	protected $plugin_page;

	/**
	 * Holds the theme page hook
	 * @var string
	 */
	protected $theme_page;

	/**
	 * Set up hooks and filters
	 */
	public function __construct()
	{
		$this->data = new Github_Explorer_Data();
		add_action('admin_menu', array($this, 'setupPage'));
		add_action('admin_enqueue_scripts', array($this, 'scripts'));
		add_action('admin_footer', array($this, 'templates'));
	}

	/**
	 * Loads admin scripts for the admin page
	 * @param  string $hook
	 * @return void
	 */
	public function scripts($hook)
	{
		if( $hook === $this->theme_page || $hook === $this->plugin_page ) {
			wp_enqueue_style( 'github-explorer/css', GITHUB_EXPLORER_URL . 'assets/dist/css/github-explorer.css' );
			wp_enqueue_script( 'github-explorer/js', GITHUB_EXPLORER_URL . 'assets/dist/js/github-explorer.js', array('jquery'), false, true );
		}

		if($hook === $this->theme_page) {
			wp_localize_script( 'github-explorer/js', 'GithubExplorer', array(
				'type' => 'theme',
				'title' => __('Searching for WordPress themes.', 'github-explorer'),
				'search' => __('Search Themes')
			) );
		}

		if($hook === $this->plugin_page) {
			wp_localize_script( 'github-explorer/js', 'GithubExplorer', array(
				'type' => 'plugin',
				'title' => __('Searching for WordPress plugins.', 'github-explorer'),
				'search' => __('Search Plugins')
			) );
		}
	}

	/**
	 * Add all templates
	 * @return void
	 */
	public function templates()
	{
		$this->includeTemplate('main');
	}

	/**
	 * Add a template to the footer
	 * @param  string $name
	 * @return void
	 */
	protected function includeTemplate($name)
	{
		echo '<script type="x/template" id="ge-template-'.$name.'">';
		$this->view('templates.'. $name);
		echo '</script>';
	}

	/**
	 * Sets up the admin page
	 * @return void
	 */
	public function setupPage()
	{
		$this->plugin_page = add_plugins_page( __('Github Explorer', 'github-explorer'), __('Github', 'github-explorer'), 'install_plugins', 'github-explorer-plugins', array($this, 'renderPage') );
		$this->theme_page = add_theme_page( __('Github Explorer', 'github-explorer'), __('Github', 'github-explorer'), 'install_plugins', 'github-explorer-themes', array($this, 'renderPage') );
	}

	/**
	 * Renders the admin page
	 * @return void
	 */
	public function renderPage()
	{
		include GITHUB_EXPLORER_DIR . 'views/plugin.php';
	}

	/**
	 * Create a url to a given route
	 * @param  string $route
	 * @return string
	 */
	public function urlTo($route)
	{
		return add_query_arg('ge_route', $route);
	}

	/**
	 * Route paths inside the page
	 * @return void
	 */
	public function router()
	{
		$route = isset($_GET['ge_route']) ? $_GET['ge_route'] : 'explore';
		if(method_exists($this, $route . 'Route')) {
			$this->{$route.'Route'}();
		} else {
			$this->exploreRoute();
		}
	}

	/**
	 * Route for the explore route
	 * @return void
	 */
	protected function exploreRoute()
	{
		$this->view('routes.explore');
	}

	/**
	 * Gets a view
	 * @param  string $view
	 * @return void
	 */
	protected function view($view)
	{
		$view = str_replace('.', '/', $view);
		include GITHUB_EXPLORER_DIR . 'views/' . $view . '.php';
	}

}
