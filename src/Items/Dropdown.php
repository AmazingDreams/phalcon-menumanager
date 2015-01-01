<?php

namespace AD\Menu\Items;

class Dropdown extends Base {

	protected $children;

	public function __construct($name, $uiString, array $options = array(), array $children = array())
	{
		parent::__construct($name, $uiString, $options);

		$this->children = $children;
	}
}
