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


class HTMLElementPlaceholder extends TextPlaceholder
{
    protected $tag;
    protected $id;
    protected $attributes;

    /**
     * SpanPlaceholder constructor.
     * @param string $tag
     * @param string $id
     * @param array $attributes
     */
    public function __construct(string $tag, string $id, array $attributes = [])
    {
        parent::__construct($id);
        $this->id = $id;
        $this->attributes = $attributes;
        $this->tag = $tag;
    }

    protected function applyAttributes(&$out_value = NULL): array {
        $attr = [];
        foreach($this->attributes as $key => $value) {
            $attr[] = sprintf("%s=\"%s\"", htmlspecialchars($key), htmlspecialchars($value));
        }
        $attr[] = sprintf("id=\"%s\"", htmlspecialchars($this->id));
        if(is_array($this->value)) {
            foreach($this->value as $key => $value) {
                if($key == 'value') {
                    $out_value = $value;
                    continue;
                }
                $attr[] = sprintf("%s=\"%s\"", htmlspecialchars($key), htmlspecialchars($value));
            }
        } else
            $out_value = $this->value;
        return $attr;
    }

    public function toString(): string
    {
        $attr = $this->applyAttributes($value);
        $attr = join(" ", $attr);
        return "<$this->tag $attr>" . htmlspecialchars($value) . "</$this->tag>";
    }
}