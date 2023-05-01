<?php

namespace Ikarus\SPS\Simulation\Render\ValueMap;

interface ValueMapInterface
{
	/**
	 * @return string
	 */
	public function getName(): string;

	/**
	 * Maps a memory register value from a plugin into a desired value in the simulation
	 *
	 * @param $valueName
	 * @param $desiredName
	 * @return scalar
	 */
	public function mapValue($valueName, $desiredName);
}