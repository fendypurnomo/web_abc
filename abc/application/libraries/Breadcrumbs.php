<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/**
		* Breadcrumbs Class
		*
		* This class manages the breadcrumb object
		*
		* @package		Breadcrumb
		* @version		1.0
		* @author			Buti <buti@nobuti.com>
		* @copyright	Copyright (c) 2012, Buti
		* @link				https://github.com/nobuti/codeigniter-breadcrumb
	*/
	class Breadcrumbs {

		/* Breadcrumbs stack */
		private $breadcrumbs = array();

		/**
			* Constructor
			*
			* @access	public
		*/
		public function __construct()
		{
			$this->ci =& get_instance();
			$this->ci->load->config('breadcrumbs');
			$this->tag_open = $this->ci->config->item('tag_open');
			$this->tag_close = $this->ci->config->item('tag_close');
			$this->crumb_open = $this->ci->config->item('crumb_open');
			$this->crumb_close = $this->ci->config->item('crumb_close');
			$this->crumb_last_open = $this->ci->config->item('crumb_last_open');
			log_message('debug', "Breadcrumbs Class Initialized");
		}

		/**
			* Append crumb to stack
			*
			* @access	public
			* @param	string $page
			* @param	string $href
			* @return	void
		*/
		function push($page, $href)
		{
			if (!$page OR !$href) return;
			$href = site_url($href);
			$this->breadcrumbs[$href] = array('page' => $page, 'href' => $href);
		}

		/**
			* Prepend crumb to stack
			*
			* @access	public
			* @param	string $page
			* @param	string $href
			* @return	void
		*/
		function unshift($page, $href)
		{
			if (!$page OR !$href) return;
			$href = site_url($href);
			array_unshift($this->breadcrumbs, array('page' => $page, 'href' => $href));
		}

		/**
			* Generate breadcrumb
			*
			* @access	public
			* @return	string
		*/
		function show()
		{
			if ($this->breadcrumbs)
			{
				$output = $this->tag_open;
				foreach ($this->breadcrumbs as $key => $crumb)
				{
					$keys = array_keys($this->breadcrumbs);
					if (end($keys) == $key)
					{
						$output .= $this->crumb_last_open . '' . $crumb['page'] . '' . $this->crumb_close;
					} else {
						$output .= $this->crumb_open.'<a class="text-decoration-none" href="' . $crumb['href'] . '">' . $crumb['page'] . '</a> '.$this->crumb_close;
					}
				}
				return $output . $this->tag_close . PHP_EOL;
			}

			return '';
		}
	}
