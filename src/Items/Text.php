<?php

namespace AD\Menu\Items;

class Text extends Base {

	public function render()
	{
		ob_start();
		echo '<li>';
		echo '<p class="navbar-text">'.$this->uiString.'</p>';
		echo '</li>';

		return ob_get_clean();
	}

}
