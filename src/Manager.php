<?php

namespace AD\Menu;

class Manager implements \Phalcon\DI\InjectionAwareInterface {

	protected $menus = array();

	protected $di;

	public function getDI()
	{
		return $this->di;
	}

	public function getMenu($key)
	{
		$menu = $this->menus[$key];
		$menu->setDI($this->di);
		$menu->initialize();

		return $menu;
	}

	public function setDI(\Phalcon\DiInterface $di)
	{
		$this->di = $di;
	}

	public function setMenu($key, Menu $menu)
	{
		$this->menus[$key] = $menu;
	}

	public function __get($key)
	{
		return $this->getMenu($key);
	}

	public function __set($key, $value)
	{
		return $this->setMenu($key, $value);
	}

}
