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

namespace Ikarus\SPS\Simulation\Render\Placeholder;


use Ikarus\SPS\Simulation\Render\DynValue\AbstractDynamicValueRender;

abstract class AbstractPlaceholder implements PlaceholderInterface
{
    protected $name;

    /**
     * AbstractPlaceholder constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }


    /**
     * Subclasses must implement this method to provide a proper workout while rendering the template.
     * A placeholder will globally ask to replace it on invocation.
     *
     * @return string
     */
    abstract protected function toString(): string;

    public function __toString(): string
    {
        $render = AbstractDynamicValueRender::getCurrentRender();
        if($render)
            $render->invokeReplacementForPlaceholder( $this );

        return $this->toString();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}