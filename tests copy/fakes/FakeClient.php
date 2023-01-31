<?php

use ImaginaryMachines\UfoAi\Contracts\ClientContract;

/**
 * Fake client for testing
 */
class FakeClient implements ClientContract {

	public array $nextData = array();

	public bool $isConnected = true;

	public function isConnected(): bool {
		return $this->isConnected;
	}


	public function getKey(): string {
		return 'fake';
	}

	public function getUrl(): string {
		return 'fake';
	}


}
