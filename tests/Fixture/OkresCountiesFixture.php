<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OkresCountiesFixture
 */
class OkresCountiesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'ID okres_countyu', 'autoIncrement' => true, 'precision' => null],
        'kraj_region_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => 'kraj_region', 'precision' => null, 'autoIncrement' => null],
        'kod' => ['type' => 'string', 'length' => 9, 'null' => false, 'default' => null, 'collate' => 'utf8_czech_ci', 'comment' => 'Kód okres_countyu', 'precision' => null, 'fixed' => null],
        'nazev' => ['type' => 'string', 'length' => 80, 'null' => false, 'default' => null, 'collate' => 'utf8_czech_ci', 'comment' => 'Název okres_countyu', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'kraj_region_id' => ['type' => 'index', 'columns' => ['kraj_region_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'okres_county_ibfk_1' => ['type' => 'foreign', 'columns' => ['kraj_region_id'], 'references' => ['kraj_regions', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'kod' => 'Lorem i',
                'nazev' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
