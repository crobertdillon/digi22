<?php
namespace App\Test\TestCase\View\Helper;

use App\View\Helper\PhoneHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\PhoneHelper Test Case
 */
class PhoneHelperTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\View\Helper\PhoneHelper
     */
    public $Phone;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->Phone = new PhoneHelper($view);
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
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
