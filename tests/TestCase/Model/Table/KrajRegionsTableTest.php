<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KrajRegionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KrajRegionsTable Test Case
 */
class KrajRegionsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\KrajRegionsTable
     */
    public $KrajRegions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.KrajRegions',
        'app.ObecCities',
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
        $config = TableRegistry::getTableLocator()->exists('KrajRegions') ? [] : ['className' => KrajRegionsTable::class];
        $this->KrajRegions = TableRegistry::getTableLocator()->get('KrajRegions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->KrajRegions);

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
