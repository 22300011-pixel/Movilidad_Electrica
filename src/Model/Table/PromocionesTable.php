<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Promociones Model
 *
 * @property \App\Model\Table\ViajesTable&\Cake\ORM\Association\HasMany $Viajes
 *
 * @method \App\Model\Entity\Promocion newEmptyEntity()
 * @method \App\Model\Entity\Promocion newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Promocion> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Promocion get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Promocion findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Promocion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Promocion> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Promocion|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Promocion saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Promocion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Promocion>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Promocion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Promocion> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Promocion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Promocion>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Promocion>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Promocion> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PromocionesTable extends Table
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

        $this->setTable('promociones');
        $this->setDisplayField('codigo');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Viajes', [
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
            ->scalar('codigo')
            ->maxLength('codigo', 50)
            ->requirePresence('codigo', 'create')
            ->notEmptyString('codigo');

        $validator
            ->decimal('porcentaje_de_descuento')
            ->requirePresence('porcentaje_de_descuento', 'create')
            ->notEmptyString('porcentaje_de_descuento');

        $validator
            ->date('fecha_de_expiracion')
            ->allowEmptyDate('fecha_de_expiracion');

        $validator
            ->boolean('activa')
            ->notEmptyString('activa');

        return $validator;
    }
}
