<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OkresCountiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OkresCountiesTable Test Case
 */
class OkresCountiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OkresCountiesTable
     */
    public $OkresCounties;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OkresCounties',
        'app.KrajRegions',
        'app.ObecCities',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OkresCounties') ? [] : ['className' => OkresCountiesTable::class];
        $this->OkresCounties = TableRegistry::getTableLocator()->get('OkresCounties', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OkresCounties);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
