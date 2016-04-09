<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SmslistTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SmslistTable Test Case
 */
class SmslistTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SmslistTable
     */
    public $Smslist;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.smslist'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Smslist') ? [] : ['className' => 'App\Model\Table\SmslistTable'];
        $this->Smslist = TableRegistry::get('Smslist', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Smslist);

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
