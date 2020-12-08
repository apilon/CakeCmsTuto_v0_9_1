<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ObecCitiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ObecCitiesTable Test Case
 */
class ObecCitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ObecCitiesTable
     */
    public $ObecCities;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ObecCities',
        'app.KrajRegions',
        'app.OkresCounties',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ObecCities') ? [] : ['className' => ObecCitiesTable::class];
        $this->ObecCities = TableRegistry::getTableLocator()->get('ObecCities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ObecCities);

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
