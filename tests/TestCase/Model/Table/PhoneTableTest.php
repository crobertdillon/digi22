<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhoneTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhoneTable Test Case
 */
class PhoneTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PhoneTable
     */
    public $Phone;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.phone'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Phone') ? [] : ['className' => 'App\Model\Table\PhoneTable'];
        $this->Phone = TableRegistry::get('Phone', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Phone);

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
