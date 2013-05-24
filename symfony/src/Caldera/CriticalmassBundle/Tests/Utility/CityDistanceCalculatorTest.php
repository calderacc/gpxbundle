<?php

namespace Caldera\CriticalmassBundle\Tests\Utility;

use Caldera\CriticalmassBundle\Utility as Utility;
use Caldera\CriticalmassBundle\Entity as Entity;

class CalculatorTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * Überprüft die Funktionalität der Entfernungsberechnung zwischen zwei
	 * Städten. Dazu werden die Städte Hamburg und Bremen angelegt und mit ihren
	 * Koordinaten ausgestattet, an den CityDistanceCalculator und das Ergebnis
	 * ausgewertet.
	 */
	public function testCalculateDistanceFromCityToCity()
	{
		$cdc = new Utility\CityDistanceCalculator();

		$hamburg = new Entity\City();
		$bremen = new Entity\City();

		$hamburg->setLatitude(53.550556);
		$hamburg->setLongitude(9.993333);

		$bremen->setLatitude(53.075878);
		$bremen->setLongitude(8.807311);

		$result = $cdc->calculateDistanceFromCityToCity($hamburg, $bremen);

		$this->assertEquals(1.2774847898, $result);
	}

	/**
	 * Dieser Testfall arbeitet wie testCalculateDistanceFromCityToCity(), lässt
	 * sich allerdings das Ergebnis in Kilometern zurückgeben.
	 */
	public function testCalculateKilometreDistanceFromCityToCity()
	{
		$cdc = new Utility\CityDistanceCalculator();

		$hamburg = new Entity\City();
		$bremen = new Entity\City();

		$hamburg->setLatitude(53.550556);
		$hamburg->setLongitude(9.993333);

		$bremen->setLatitude(53.075878);
		$bremen->setLongitude(8.807311);

		$result = $cdc->calculateKilometreDistanceFromCityToCity($hamburg, $bremen);

		$this->assertEquals(95.8113592349, $result);
	}
}