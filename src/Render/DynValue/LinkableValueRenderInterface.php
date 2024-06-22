<?php

namespace Ikarus\SPS\Simulation\Render\DynValue;

interface LinkableValueRenderInterface
{
	/**
	 * @return array
	 */
	public function getValues(): array;
}