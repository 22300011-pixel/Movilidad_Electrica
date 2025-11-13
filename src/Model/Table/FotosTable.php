<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fotos Model
 *
 * @property \App\Model\Table\ModelosTable&\Cake\ORM\Association\BelongsTo $Modelos
 *
 * @method \App\Model\Entity\Foto newEmptyEntity()
 * @method \App\Model\Entity\Foto newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Foto> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Foto get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Foto findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Foto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Foto> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Foto|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Foto saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Foto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Foto>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Foto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Foto> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Foto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Foto>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Foto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Foto> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FotosTable extends Table
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

        $this->setTable('fotos');
        $this->setDisplayField('url_foto');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Modelos', [
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
            ->scalar('url_foto')
            ->maxLength('url_foto', 255)
            ->requirePresence('url_foto', 'create')
            ->notEmptyString('url_foto');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 255)
            ->allowEmptyString('descripcion');

        $validator
            ->integer('modelo_id')
            ->allowEmptyString('modelo_id');

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
        $rules->add($rules->existsIn(['modelo_id'], 'Modelos'), ['errorField' => 'modelo_id']);

        return $rules;
    }
}
