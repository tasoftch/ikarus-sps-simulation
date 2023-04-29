<?php

namespace Ikarus\SPS\Simulation\Plugin\Description;

use Ikarus\SPS\Simulation\Environment\EnvironmentInterface;
use Ikarus\SPS\Simulation\Plugin\SimulationPluginInterface;

interface PluginSimulationDescriptionInterface
{
	/**
	 * Only plugins that description implements this interface can be launched in the Ikarus SPS simulator.
	 * Asking the plugin's description class by passing an upset environment lets the decision up to the plugin's class.
	 * If this method returns false, the simulation is cancelled.
	 * Otherwise, the simulation Ikarus SPS instance gets prepared to run
	 *
	 * @param EnvironmentInterface $environment
	 * @return bool
	 */
	public function prepareSimulation(EnvironmentInterface $environment): bool;

	/**
	 * Returns which arguments from the environment are not changeable during simulation.
	 * If this method returns NULL, all access pins are locked by default.
	 * If the real plugin's changeArgument returns false on setting an unlocked argument, the simulation will crash.
	 *
	 * @return array|null
	 * @see SimulationPluginInterface::changeArgument()
	 */
	public function getLockedArguments(): ?array;
}