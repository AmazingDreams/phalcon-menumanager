<?php

namespace AD\Menu;

abstract class Menu implements \Phalcon\DI\InjectionAwareInterface {

	protected $di;

	private $items = array();

	abstract function initialize();

	public function addItem(\AD\Menu\Items\Item $item)
	{
		$this->items[] = $item;
	}

	public function findItem($name)
	{
		foreach($this->items as $item)
		{
			if($item->getName() == $name)
				return $item;
		}

		return FALSE;
	}

	public function getDI()
	{
		return $this->di;
	}

	public function getItems()
	{
		return $this->items;
	}

	public function render($name = NULL)
	{
		if($name === NULL)
		{
			ob_start();

			foreach($this->items as $item)
			{
				echo $this->render($item->getName());
			}

			return ob_get_clean();
		}

		$item = $this->findItem($name);
		$item->setDI($this->di);

		ob_start();
		echo $item->render();
		return ob_get_clean();
	}

	public function setDI($di)
	{
		$this->di = $di;
	}

}
