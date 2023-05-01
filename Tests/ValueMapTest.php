<?php


use Ikarus\SPS\Simulation\Render\LegacyTableRender;
use Ikarus\SPS\Simulation\Render\ValueMap\StaticValueMap;
use PHPUnit\Framework\TestCase;

class ValueMapTest extends TestCase
{
	public function testPlainMap() {
		$r = new LegacyTableRender();
		$r->addValueMap( new StaticValueMap('test', 'SIM.ventil.strom') );

		$this->assertEquals("SIM.ventil.strom", $r->mapValue("test"));
	}
}
