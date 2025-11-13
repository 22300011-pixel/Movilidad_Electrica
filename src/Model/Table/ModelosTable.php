<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Modelos Model
 *
 * @property \App\Model\Table\FotosTable&\Cake\ORM\Association\HasMany $Fotos
 * @property \App\Model\Table\VehiculosTable&\Cake\ORM\Association\HasMany $Vehiculos
 *
 * @method \App\Model\Entity\Modelo newEmptyEntity()
 * @method \App\Model\Entity\Modelo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Modelo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Modelo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Modelo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Modelo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Modelo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Modelo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Modelo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Modelo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Modelo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Modelo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Modelo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Modelo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Modelo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Modelo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Modelo> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ModelosTable extends Table
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

        $this->setTable('modelos');
        $this->setDisplayField('nombre_del_modelo');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Fotos', [
            'foreignKey' => 'modelo_id',
        ]);
        $this->hasMany('Vehiculos', [
            'foreignKey' => 'modelo_id',
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
            ->scalar('nombre_del_modelo')
            ->maxLength('nombre_del_modelo', 100)
            ->requirePresence('nombre_del_modelo', 'create')
            ->notEmptyString('nombre_del_modelo');

        $validator
            ->scalar('marca')
            ->maxLength('marca', 100)
            ->requirePresence('marca', 'create')
            ->notEmptyString('marca');

        $validator
            ->scalar('tipo_de_vehiculo')
            ->maxLength('tipo_de_vehiculo', 100)
            ->requirePresence('tipo_de_vehiculo', 'create')
            ->notEmptyString('tipo_de_vehiculo');

        $validator
            ->decimal('tarifa_por_minuto')
            ->requirePresence('tarifa_por_minuto', 'create')
            ->notEmptyString('tarifa_por_minuto');

        $validator
            ->integer('capacidad_maxima_kg')
            ->allowEmptyString('capacidad_maxima_kg');

        $validator
            ->integer('capacidad_de_bateria')
            ->allowEmptyString('capacidad_de_bateria');

        return $validator;
    }
}
