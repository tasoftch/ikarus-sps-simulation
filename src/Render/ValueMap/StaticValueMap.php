<?php

namespace Ikarus\SPS\Simulation\Render\ValueMap;

class StaticValueMap implements ValueMapInterface
{
	private $name;

	private $mappedValueName;

	/**
	 * @param $name
	 * @param $mappedValueName
	 */
	public function __construct($name, $mappedValueName)
	{
		$this->name = $name;
		$this->mappedValueName = $mappedValueName;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function mapValue($valueName, $desiredName)
	{
		return $this->mappedValueName;
	}
}