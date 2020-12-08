<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OkresCounty Entity
 *
 * @property int $id
 * @property int $kraj_region_id
 * @property string $kod
 * @property string $nazev
 *
 * @property \App\Model\Entity\KrajRegion $kraj_region
 * @property \App\Model\Entity\ObecCity[] $obec_cities
 */
class OkresCounty extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'kraj_region_id' => true,
        'kod' => true,
        'nazev' => true,
        'kraj_region' => true,
        'obec_cities' => true,
    ];
}
