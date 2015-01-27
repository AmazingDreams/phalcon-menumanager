<?php

namespace AD\Menu\Items;

class Text extends Base {

	public function render()
	{
		ob_start();
		echo '<li>';
		echo '<span>'.$this->uiString.'</span>';
		echo '</li>';

		return ob_get_clean();
	}

}
