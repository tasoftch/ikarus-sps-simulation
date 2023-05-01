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


use Ikarus\SPS\Simulation\Render\DynValue\SimulationDynamicValueRenderInterface;
use Ikarus\SPS\Simulation\Render\DynValue\StaticDynamicValueRender;

class LegacyTableRender extends AbstractSimulationRender
{
	private $headers = [];
	private $rows = [];
	private $rowIndex = -1;

    public function __construct()
	{
        $this->dynamicValueRender = new StaticDynamicValueRender();
	}

	public function getTemplate()
    {
        return function() {
			?>
			<table class="table table-hover table-striped table-sm">
				<thead>
				<tr id="kontakte-headers">
                    <?php
                    foreach($this->headers as $header)
                        echo "<th>$header</th>";
                    ?>
				</tr>
				</thead>
				<tbody id="kontakte">
                <?php
                $id_c = 1;
                foreach($this->rows as $cells) {
                    echo "<tr>";
                    foreach($cells as $cell) {
                        $anID = "f" . ($id_c++);
                        list($value, $dynID, $class, $dynClass) = $cell;

                        $attr = [];
                        if($dynID) {
							$attr["id"] = $anID;
                            $this->dynamicValueRender->setValue("$anID.value", $dynID);
						}

                        if($class)
                            $attr["class"][] = $class;

                        if($dynClass) {
							$this->dynamicValueRender->setValue("$anID.class", $dynClass);
                        }

                        echo "<td";
                        if($attr['class'])
                            $attr["class"] = join(" ", $attr["class"]);

                        if($attr) {
                            foreach($attr as $key => &$val)
								$val = sprintf("%s=\"%s\"", htmlspecialchars($key), htmlspecialchars($val));
							echo " ", join(" ", $attr);
						}
                        echo ">";
                        echo ($value);
                        echo "</td>";
                    }
                    echo "</tr>";
                }
                ?>
				</tbody>
			</table>
			<?php
		};
    }

	public function setColumnHeaders(array $headers)
	{
		$this->headers = $headers;
		return $this;
	}

	public function addRow()
	{
		$this->rowIndex++;
		$this->rows[] = [];
		return $this;
	}

	public function addCell(string $value, string $dynamicID = NULL, string $class = NULL, string $dynamicClassID = NULL)
	{
		$this->rows[$this->rowIndex][] = [
			$value,
			$dynamicID,
			$class,
			$dynamicClassID
		];
		return $this;
	}
}