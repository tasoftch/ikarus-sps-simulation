<?php

namespace Ikarus\SPS\Simulation\Render;

use Ikarus\SPS\Simulation\Render\DynValue\SimulationDynamicValueRenderInterface;
use Ikarus\SPS\Simulation\Render\ValueMap\ValueMapInterface;

abstract class AbstractSimulationRender implements SimulationRenderInterface
{
	/** @var SimulationDynamicValueRenderInterface|null */
	protected $dynamicValueRender;

	/** @var ValueMapInterface[] */
	protected $valueMap = [];

	/**
	 * @return SimulationDynamicValueRenderInterface|null
	 */
	public function getDynamicValueRender(): ?SimulationDynamicValueRenderInterface
	{
		return $this->dynamicValueRender;
	}

	/**
	 * @param SimulationDynamicValueRenderInterface|null $dynamicValueRender
	 * @return static
	 */
	public function setDynamicValueRender(?SimulationDynamicValueRenderInterface $dynamicValueRender)
	{
		$this->dynamicValueRender = $dynamicValueRender;
		return $this;
	}

	public function addValueMap(ValueMapInterface $map) {
		$this->valueMap[ $map->getName() ] = $map;
	}

	public function mapValue($value, $desired = NULL) {
		if(NULL === $desired)
			$desired = $value;
		if(isset($this->valueMap[$desired]))
			return $this->valueMap[$desired]->mapValue($value, $desired);
		return NULL;
	}

	public function getMappings(): array {
		$mappings = [];
		foreach($this->valueMap as $map) {
			$mappings[ $map->getName() ] = $map->mapValue($map->getName(), $map->getName());
		}
		return $mappings;
	}
}