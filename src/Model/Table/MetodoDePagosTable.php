<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MetodoDePagos Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ViajesTable&\Cake\ORM\Association\HasMany $Viajes
 *
 * @method \App\Model\Entity\MetodoDePago newEmptyEntity()
 * @method \App\Model\Entity\MetodoDePago newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\MetodoDePago> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MetodoDePago get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\MetodoDePago findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\MetodoDePago patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\MetodoDePago> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\MetodoDePago|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\MetodoDePago saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\MetodoDePago>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MetodoDePago>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MetodoDePago>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MetodoDePago> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MetodoDePago>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MetodoDePago>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\MetodoDePago>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\MetodoDePago> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MetodoDePagosTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('metodo_de_pagos');
        $this->setDisplayField('tipo_de_tarjeta');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Viajes', [
            'foreignKey' => 'metodo_de_pago_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('tipo_de_tarjeta')
            ->requirePresence('tipo_de_tarjeta', 'create')
            ->notEmptyString('tipo_de_tarjeta');

        $validator
            ->scalar('nombre_del_titular')
            ->maxLength('nombre_del_titular', 100)
            ->requirePresence('nombre_del_titular', 'create')
            ->notEmptyString('nombre_del_titular');

        $validator
            ->scalar('cvv')
            ->maxLength('cvv', 4)
            ->requirePresence('cvv', 'create')
            ->notEmptyString('cvv');

        $validator
            ->scalar('fecha_de_vencimiento')
            ->maxLength('fecha_de_vencimiento', 5)
            ->requirePresence('fecha_de_vencimiento', 'create')
            ->notEmptyString('fecha_de_vencimiento');

        $validator
            ->boolean('es_predeterminado')
            ->notEmptyString('es_predeterminado');

        $validator
            ->scalar('alias')
            ->maxLength('alias', 50)
            ->allowEmptyString('alias');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);

        return $rules;
    }
}
