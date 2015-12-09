<?php
App::uses('Tarefa', 'Model');

/**
 * Tarefa Test Case
 */
class TarefaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tarefa',
		'app.tag',
		'app.tarefas_tag'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tarefa = ClassRegistry::init('Tarefa');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tarefa);

		parent::tearDown();
	}

}
