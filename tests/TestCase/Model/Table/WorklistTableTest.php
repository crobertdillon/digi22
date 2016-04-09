<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WorklistTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WorklistTable Test Case
 */
class WorklistTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WorklistTable
     */
    public $Worklist;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.worklist'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Worklist') ? [] : ['className' => 'App\Model\Table\WorklistTable'];
        $this->Worklist = TableRegistry::get('Worklist', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Worklist);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
