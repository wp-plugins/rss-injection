<?php
abstract class w3v_Controller_Action_Control extends w3v_Controller_Action_Abstract {
	
	protected function selected_action() {
		return $this->selected_action_page ();
	}
	
	public function __construct($application) {
		$this->set_type ( self::WP_CONTROL );
		parent::__construct ( $application );
	}
	
	public function controller() {
		$args = func_get_args ();
		$page = call_user_func_array ( array ('parent', 'controller' ), $args );
		$this->view->_e ( $page );
	}
	
	public function setup() {
		add_action ( 'init', array ($this, 'init' ) );
		add_action ( 'generate_rewrite_rules', array ($this, 'generate_rewrite_rules' ) );
		add_filter ( 'query_vars', array ($this, 'query_vars' ) );
		add_filter ( 'template_redirect', array ($this, 'template_redirect' ) );
	}
	
	public function template_redirect() {
		global $wp_query;
		if ($wp_query->get ( 'view' )) {
			$control = $this->get_controller ();
			$class = new $control ( $this->application () );
			$class->controller ();
			die ();
		}
	}
	public function query_vars($qvars) {
		$qvars [] = 'view';
		return $qvars;
	}
	
	public function init() {
		global $wp_rewrite;
		// uncomment for debugging
		//$wp_rewrite->flush_rules ();
		$option = $this->get_page () . '_controls';
		$registered = get_option ( $option );
		$class = $this->get_page ();
		if ($registered !== $class) {
			$wp_rewrite->flush_rules ();
		}
	}
	private function get_page() {
		$class = get_class ( $this );
		$class = explode ( 'Controller', $class );
		$class = $class [0];
		$class = str_replace ( 'CSV', '.csv', $class );
		$class = str_replace ( 'TXT', '.txt', $class );
		return $class;
	}
	public function get_controller() {
		global $wp_query;
		$split = explode ( '/', $wp_query->get ( 'view' ) );
		$control = $split [0] . 'Controller';
		$control = str_replace ( '.csv', 'CSV', $control );
		$control = str_replace ( '.txt', 'TXT', $control );
		return $control;
	}
	public function generate_rewrite_rules($wp_rewrite) {
		$option = $this->get_page () . '_controls';
		$class = $this->get_page ();
		$new_rules = array ();
		$new_rules [$class] = 'index.php?view=' . $class;
		$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
		update_option ( $option, $class );
	}
}
