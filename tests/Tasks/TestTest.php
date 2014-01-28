<?php
namespace Rocketeer\Tasks;

use Rocketeer\TestCases\RocketeerTestCase;

class TestTest extends RocketeerTestCase
{
	public function testCanRunTests()
	{
		$this->assertTaskHistory('Test', array(
			array(
				'cd '.$this->server.'/releases/20000000000000',
				exec('which phpunit'). ' --stop-on-failure ',
			),
		));
	}
}
