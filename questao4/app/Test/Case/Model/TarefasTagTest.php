<?php
App::uses('TarefasTag', 'Model');

/**
 * TarefasTag Test Case
 */
class TarefasTagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tarefas_tag',
		'app.tarefa',
		'app.tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TarefasTag = ClassRegistry::init('TarefasTag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TarefasTag);

		parent::tearDown();
	}

}
