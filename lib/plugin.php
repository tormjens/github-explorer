<?php

/**
 * Main plugin class
 */
class Github_Explorer_Plugin {

	/**
	 * Holds the page instance
	 * @var Github_Explorer_Page
	 */
	public $page;

	/**
	 * Construct plugin
	 */
	public function __construct()
	{
		$this->loadModules();
	}

	/**
	 * Loads up all the different modules
	 * @return void
	 */
	protected function loadModules()
	{
		$this->page = new Github_Explorer_Page();
	}

	/**
	 * Creates a plugin instance statically
	 * @return Github_Explorer_Plugin
	 */
	public static function instance()
	{
		return new static;
	}

}
