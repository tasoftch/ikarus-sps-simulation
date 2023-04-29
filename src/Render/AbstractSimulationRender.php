<?php

namespace Ikarus\SPS\Simulation\Render;

use Ikarus\SPS\Simulation\Render\DynValue\SimulationDynamicValueRenderInterface;

abstract class AbstractSimulationRender implements SimulationRenderInterface
{
	/** @var SimulationDynamicValueRenderInterface|null */
	protected $dynamicValueRender;

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
}