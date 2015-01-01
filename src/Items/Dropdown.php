<?php

namespace AD\Menu\Items;

class Dropdown extends Base {

	protected $children;

	public function __construct($name, $uiString, array $options = array(), array $children = array())
	{
		parent::__construct($name, $uiString, $options);

		$this->children = $children;
	}

	public function addChild(Base $child)
	{
		$this->children[] = $child;
	}

	public function render()
	{
		ob_start();

		echo '<ul class="dropdown-menu" role="menu">';

		foreach($this->children as $child)
			echo $child
				->setDI($this->di)
				->render();

		echo '</ul>';

		return ob_get_clean();
	}
}
