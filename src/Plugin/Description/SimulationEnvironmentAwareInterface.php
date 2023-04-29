<?php

namespace Ikarus\SPS\Simulation\Plugin\Description;

use Ikarus\SPS\Simulation\Environment\EnvironmentInterface;

interface SimulationEnvironmentAwareInterface extends PluginSimulationDescriptionInterface
{
	/**
	 * If the plugin's description implements this interface, it will be able to create the environment instance by
	 * itself.
	 *
	 * @param array $formValues
	 * @return EnvironmentInterface|null
	 */
	public function getEnvironment(array $formValues): ?EnvironmentInterface;
}