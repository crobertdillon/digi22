<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SmsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SmsTable Test Case
 */
class SmsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SmsTable
     */
    public $Sms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sms'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sms') ? [] : ['className' => 'App\Model\Table\SmsTable'];
        $this->Sms = TableRegistry::get('Sms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sms);

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
