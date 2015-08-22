<?php

namespace AD\Menu\Items;

abstract class Base implements \Phalcon\DI\InjectionAwareInterface {

	protected $di;

	protected $name;

	protected $uiString;

	protected $options;

	abstract function render();

	public function __construct($name, $uiString, array $options = array())
	{
		$this->name     = $name;
		$this->uiString = $uiString;
		$this->options  = $options;
	}

	public function getDI()
	{
		return $this->di;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setDI(\Phalcon\DiInterface $di)
	{
		$this->di = $di;

		return $this;
	}

}
