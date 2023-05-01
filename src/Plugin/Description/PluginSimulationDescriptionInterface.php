<?php

namespace Ikarus\SPS\Simulation\Plugin\Description;

use Ikarus\SPS\Register\MemoryRegisterInterface;
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
	 * Returns all argument names that are changeable during the simulation
	 *
	 * @return array|null
	 * @see SimulationPluginInterface::changeArgument()
	 */
	public function getChangeableArgumentNames(): ?array;

	/**
	 * This method is called while simulation from the Ikarus SPS engine.
	 *
	 * It should map the requests from the simulation into the memory register to let the plugin act of it.
	 *
	 * @param $data
	 * @param MemoryRegisterInterface $memoryRegister
	 */
	public function mapRequest($data, MemoryRegisterInterface $memoryRegister);
}