<?php
namespace ImaginaryMachines\UfoAi\Tests;

use ImaginaryMachines\UfoAi\Client;

class ClientTest extends TestCase {


	/**
	 * Test that we can use the client to make a prompt request
	 *
	 * @group realApi
	 * @group edits
	 */
	public function test_prompt_edit_real() {
		if( ! defined('UFO_AI_WPAPI_KEY')|| empty(UFO_AI_WPAPI_KEY) ){
			$this->markTestSkipped('No API key found');
		}
		$plugin = $this->makePlugin();

		$client = $plugin->getClient();

		$input = 'There are fOre dogs';
		$instruction = 'Fix spelling';
		$response = $client->edit($input,$instruction);
		$this->assertIsArray($response);

		$this->assertCount(1,$response);
		$this->assertEquals('There are four dogs',
			substr($response[0],0, strlen('There are four dogs'))
		);

	}

	/**
	 * @return Client
	 */
	protected function getRealClient(){
		return $this->makePlugin()->getClient();
	}

	/**
	 * Test isConnected
	 *
	 * @group realApi
	 * @group now
	 */
	public function test_is_connected_real() {
		if( ! defined('UFO_AI_WPAPI_KEY')|| empty(UFO_AI_WPAPI_KEY) ){
			$this->markTestSkipped('No API key found');
		}
		$client = $this->getRealClient();
		$this->assertTrue($client->isConnected());

	}

}
