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

namespace Ikarus\SPS\Simulation\Render;


use Skyline\Render\Template\TemplateInterface;

interface SimulationRenderInterface
{
    /**
     * Returns a template to be rendered in the simulation's graphics area
     *
     * The template may use any placeholder classes to mark dynamic values.
     *
     * @return TemplateInterface|string|callable
     */
    public function getTemplate();

    /**
     * If the simulation graphics input view supports dynamic values, they can be addressed by a dynamic value render.
     *
     * Rendering the template with a dynamic value render will ask it for actual values for each placeholder used in
     * the template.
     *
     * @return SimulationDynamicValueRenderInterface|null
     */
    public function getDynamicValueRender(): ?SimulationDynamicValueRenderInterface;
}