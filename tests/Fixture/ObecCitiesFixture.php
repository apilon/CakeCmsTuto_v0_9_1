<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ObecCitiesFixture
 */
class ObecCitiesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'ID obce', 'autoIncrement' => true, 'precision' => null],
        'kraj_region_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'kraj_region', 'precision' => null, 'autoIncrement' => null],
        'okres_county_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'okres_county', 'precision' => null, 'autoIncrement' => null],
        'kod' => ['type' => 'string', 'length' => 11, 'null' => false, 'default' => null, 'collate' => 'utf8_czech_ci', 'comment' => 'Kód obce', 'precision' => null, 'fixed' => null],
        'nazev' => ['type' => 'string', 'length' => 80, 'null' => false, 'default' => null, 'collate' => 'utf8_czech_ci', 'comment' => 'Název obce', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'kraj_region_id' => ['type' => 'index', 'columns' => ['kraj_region_id'], 'length' => []],
            'okres_county_id' => ['type' => 'index', 'columns' => ['okres_county_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'obec_city_ibfk_1' => ['type' => 'foreign', 'columns' => ['kraj_region_id'], 'references' => ['kraj_regions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'obec_city_ibfk_2' => ['type' => 'foreign', 'columns' => ['okres_county_id'], 'references' => ['okres_counties', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_czech_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'kraj_region_id' => 1,
                'okres_county_id' => 1,
                'kod' => 'Lorem ips',
                'nazev' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
