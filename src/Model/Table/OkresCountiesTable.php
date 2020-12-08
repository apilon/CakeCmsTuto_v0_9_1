<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OkresCounties Model
 *
 * @property \App\Model\Table\KrajRegionsTable&\Cake\ORM\Association\BelongsTo $KrajRegions
 * @property \App\Model\Table\ObecCitiesTable&\Cake\ORM\Association\HasMany $ObecCities
 *
 * @method \App\Model\Entity\OkresCounty get($primaryKey, $options = [])
 * @method \App\Model\Entity\OkresCounty newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OkresCounty[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OkresCounty|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OkresCounty saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OkresCounty patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OkresCounty[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OkresCounty findOrCreate($search, callable $callback = null, $options = [])
 */
class OkresCountiesTable extends Table
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

        $this->setTable('okres_counties');
        $this->setDisplayField('nazev');
        $this->setPrimaryKey('id');

        $this->belongsTo('KrajRegions', [
            'foreignKey' => 'kraj_region_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ObecCities', [
            'foreignKey' => 'okres_county_id',
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
            ->maxLength('kod', 9)
            ->requirePresence('kod', 'create')
            ->notEmptyString('kod');

        $validator
            ->scalar('nazev')
            ->maxLength('nazev', 80)
            ->requirePresence('nazev', 'create')
            ->notEmptyString('nazev');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['kraj_region_id'], 'KrajRegions'));

        return $rules;
    }
}
