<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * KrajRegion Entity
 *
 * @property int $id
 * @property string $kod
 * @property string $nazev
 *
 * @property \App\Model\Entity\ObecCity[] $obec_cities
 * @property \App\Model\Entity\OkresCounty[] $okres_counties
 */
class KrajRegion extends Entity
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
        'kod' => true,
        'nazev' => true,
        'obec_cities' => true,
        'okres_counties' => true,
    ];
}
