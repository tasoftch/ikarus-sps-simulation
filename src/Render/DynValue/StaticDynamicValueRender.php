<?php

namespace Ikarus\SPS\Simulation\Render\DynValue;

class StaticDynamicValueRender extends AbstractDynamicValueRender
{
	protected $values = [];

	public function __construct(iterable $values = [])
	{
		parent::__construct();
		foreach($values as $key  => $value)
			$this->values[$key] = $value;
	}

	public function getValue(string $name)
	{
		if(is_callable($v = $this->values[$name] ?? NULL)) {
			return $v();
		}
		return $v;
	}

	public function setValue(string $name, $value)
	{
		$this->values[$name] = $value;
	}
}