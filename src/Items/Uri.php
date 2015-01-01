<?php

namespace AD\Menu\Items;

class Uri extends Base {

	protected $uri;

	public function __construct($name, $uri, $uiString, array $options = array())
	{
		parent::__construct($name, $uiString, $options);

		$this->uri = $uri;
	}

	public function render()
	{
		ob_start();
		echo '<li>';
		echo $this->di->get('tag')
			->linkTo(array_merge(array($this->uri, $this->uiString), $this->options));

		if( ! empty($this->children))
		{
			echo '<ul class="dropdown-menu" role="menu">';

			foreach($this->children as $child)
				echo $child
					->setDI($this->di)
					->render();

			echo '</ul>';
		}

		echo '</li>';

		return ob_get_clean();
	}

}
