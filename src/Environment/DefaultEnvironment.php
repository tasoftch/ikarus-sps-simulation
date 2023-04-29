<?php

namespace Ikarus\SPS\Simulation\Environment;

use Ikarus\SPS\Simulation\Render\SimulationRenderInterface;

class DefaultEnvironment implements EnvironmentInterface
{
	/** @var SimulationRenderInterface */
	private $simulation_render;

	private $constructor_arguments = [];
	private $values = [];

	/**
	 * @inheritDoc
	 */
	public function getConstructorArguments(): array
	{
		return $this->constructor_arguments;
	}

	/**
	 * @inheritDoc
	 */
	public function get(string $fvName, $default = NULL)
	{
		return $this->values[$fvName] ?? $default;
	}

	/**
	 * @inheritDoc
	 */
	public function getSimulationRender(): SimulationRenderInterface
	{
		return $this->simulation_render;
	}

	/**
	 * @inheritDoc
	 */
	public function setSimulationRender(SimulationRenderInterface $render)
	{
		$this->simulation_render = $render;
	}
}