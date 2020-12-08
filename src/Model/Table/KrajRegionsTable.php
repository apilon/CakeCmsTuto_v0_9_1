<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * KrajRegions Model
 *
 * @property \App\Model\Table\ObecCitiesTable&\Cake\ORM\Association\HasMany $ObecCities
 * @property \App\Model\Table\OkresCountiesTable&\Cake\ORM\Association\HasMany $OkresCounties
 *
 * @method \App\Model\Entity\KrajRegion get($primaryKey, $options = [])
 * @method \App\Model\Entity\KrajRegion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\KrajRegion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\KrajRegion|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\KrajRegion saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\KrajRegion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\KrajRegion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\KrajRegion findOrCreate($search, callable $callback = null, $options = [])
 */
class KrajRegionsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('kraj_regions');
        $this->setDisplayField('nazev');
        $this->setPrimaryKey('id');

        $this->hasMany('ObecCities', [
            'foreignKey' => 'kraj_region_id',
        ]);
        $this->hasMany('OkresCounties', [
            'foreignKey' => 'kraj_region_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('kod')
            ->maxLength('kod', 7)
            ->requirePresence('kod', 'create')
            ->notEmptyString('kod');

        $validator
            ->scalar('nazev')
            ->maxLength('nazev', 80)
            ->requirePresence('nazev', 'create')
            ->notEmptyString('nazev');

        return $validator;
    }
}
