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

use Ikarus\SPS\Simulation\Render\Placeholder\HTMLElementPlaceholder;
use Ikarus\SPS\Simulation\Render\Placeholder\HTMLPlaceholder;
use Ikarus\SPS\Simulation\Render\Placeholder\TextPlaceholder;
use PHPUnit\Framework\TestCase;

class PlaceholderTest extends TestCase
{
    public function testHTMLPlaceholder() {
        $p = new HTMLPlaceholder('tt');

        $this->assertEmpty((string)$p);

        $p->replace("Test");

        $this->assertEquals("Test", $p);

        $p->replace("<div>");

        $this->assertEquals("<div>", $p);

        $this->assertEquals("tt", $p->getName());
    }

    public function testTextPlaceholder() {
        $p = new TextPlaceholder('tt');

        $p->replace("Test 890");
        $this->assertEquals("Test 890", $p);

        $p->replace("<div>");

        $this->assertEquals("&lt;div&gt;", $p);
    }

    public function testSpanPlaceholder() {
        $p = new HTMLElementPlaceholder("span", 'test');

        $p->replace("Hallo");

        $this->assertEquals("<span id=\"test\">Hallo</span>", $p);

        $p->replace(['class' => 'cdn']);
        $this->assertEquals("<span id=\"test\" class=\"cdn\"></span>", $p);

        $p->replace(['class' => 'cdn', 'value' => 'Thomas<']);
        $this->assertEquals("<span id=\"test\" class=\"cdn\">Thomas&lt;</span>", $p);
    }
}
