<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Estaciones Model
 *
 * @property \App\Model\Table\VehiculosTable&\Cake\ORM\Association\HasMany $Vehiculos
 * @property \App\Model\Table\ViajesTable&\Cake\ORM\Association\HasMany $Viajes
 *
 * @method \App\Model\Entity\Estacion newEmptyEntity()
 * @method \App\Model\Entity\Estacion newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Estacion> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Estacion get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Estacion findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Estacion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Estacion> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Estacion|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Estacion saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Estacion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estacion>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Estacion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estacion> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Estacion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estacion>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Estacion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Estacion> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EstacionesTable extends Table
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

        $this->setTable('estaciones');
        $this->setDisplayField('nombre');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Vehiculos', [
            'foreignKey' => 'estacion_id',
        ]);
        $this->hasMany('Viajes', [
            'foreignKey' => 'estacion_id',
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
            ->scalar('nombre')
            ->maxLength('nombre', 100)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('direccion')
            ->requirePresence('direccion', 'create')
            ->notEmptyString('direccion');

        $validator
            ->decimal('latitud')
            ->requirePresence('latitud', 'create')
            ->notEmptyString('latitud');

        $validator
            ->decimal('longitud')
            ->requirePresence('longitud', 'create')
            ->notEmptyString('longitud');

        $validator
            ->integer('capacidad')
            ->allowEmptyString('capacidad');

        return $validator;
    }
}
