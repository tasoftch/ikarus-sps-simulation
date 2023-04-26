<?php
/*
 * Copyright (c) 2023 TASoft Applications, Th. Abplanalp <info@tasoft.ch>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace Ikarus\SPS\Simulation\Plugin;


use Ikarus\SPS\Simulation\Environment\EnvironmentInterface;

interface SimulationPluginInterface
{
    /**
     * Only plugins that implement this interface can be launched in the Ikarus SPS simulator.
     * Asking the plugin's class by passing an upset environment lets the decision up to the plugin's class.
     * If this method returns false, the simulation is cancelled.
     * Otherwise the simulation Ikarus SPS instance gets prepared to run
     *
     * @param EnvironmentInterface $environment
     * @return bool
     */
    public static function isEnvironmentValid(EnvironmentInterface $environment): bool;

    /**
     * After the simulation Ikarus SPS engine has started, the plugin gets notified by passing the environment
     * before to it to designate, that the current run loop is in simulation mode.
     *
     * @param EnvironmentInterface $environment
     * @return void
     */
    public function enableSimulation(EnvironmentInterface $environment);

    /**
     * @param string $name
     * @param $value
     * @return bool
     */
    public function setArgument(string $name, $value): bool;
}