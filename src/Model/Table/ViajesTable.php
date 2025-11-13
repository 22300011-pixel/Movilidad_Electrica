<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Viajes Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\VehiculosTable&\Cake\ORM\Association\BelongsTo $Vehiculos
 * @property \App\Model\Table\MetodoDePagosTable&\Cake\ORM\Association\BelongsTo $MetodoDePagos
 * @property \App\Model\Table\EstacionesTable&\Cake\ORM\Association\BelongsTo $Estaciones
 * @property \App\Model\Table\PromocionesTable&\Cake\ORM\Association\BelongsTo $Promociones
 *
 * @method \App\Model\Entity\Viaje newEmptyEntity()
 * @method \App\Model\Entity\Viaje newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Viaje> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Viaje get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Viaje findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Viaje patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Viaje> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Viaje|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Viaje saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Viaje>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Viaje>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Viaje>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Viaje> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Viaje>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Viaje>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Viaje>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Viaje> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ViajesTable extends Table
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

        $this->setTable('viajes');
        $this->setDisplayField('estado_viaje');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Vehiculos', [
            'foreignKey' => 'vehiculo_id',
        ]);
        $this->belongsTo('MetodoDePagos', [
            'foreignKey' => 'metodo_de_pago_id',
        ]);
        $this->belongsTo('Estaciones', [
            'foreignKey' => 'estacion_id',
        ]);
        $this->belongsTo('Promociones', [
            'foreignKey' => 'promocion_id',
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
            ->dateTime('hora_inicio')
            ->requirePresence('hora_inicio', 'create')
            ->notEmptyDateTime('hora_inicio');

        $validator
            ->dateTime('hora_fin')
            ->requirePresence('hora_fin', 'create')
            ->notEmptyDateTime('hora_fin');

        $validator
            ->decimal('costo_total')
            ->allowEmptyString('costo_total');

        $validator
            ->scalar('estado_viaje')
            ->notEmptyString('estado_viaje');

        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->integer('vehiculo_id')
            ->allowEmptyString('vehiculo_id');

        $validator
            ->integer('metodo_de_pago_id')
            ->allowEmptyString('metodo_de_pago_id');

        $validator
            ->integer('estacion_id')
            ->allowEmptyString('estacion_id');

        $validator
            ->integer('promocion_id')
            ->allowEmptyString('promocion_id');

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
        $rules->add($rules->existsIn(['vehiculo_id'], 'Vehiculos'), ['errorField' => 'vehiculo_id']);
        $rules->add($rules->existsIn(['metodo_de_pago_id'], 'MetodoDePagos'), ['errorField' => 'metodo_de_pago_id']);
        $rules->add($rules->existsIn(['estacion_id'], 'Estaciones'), ['errorField' => 'estacion_id']);
        $rules->add($rules->existsIn(['promocion_id'], 'Promociones'), ['errorField' => 'promocion_id']);

        return $rules;
    }
}
