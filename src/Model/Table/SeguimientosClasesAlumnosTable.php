<?php
namespace App\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SeguimientosClasesAlumnos Model
 *
 * @property |\Cake\ORM\Association\BelongsTo $ClasesAlumnos
 * @property \App\Model\Table\CalificacionesTable|\Cake\ORM\Association\BelongsTo $Calificaciones
 *
 * @method \App\Model\Entity\SeguimientosClasesAlumno get($primaryKey, $options = [])
 * @method \App\Model\Entity\SeguimientosClasesAlumno newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SeguimientosClasesAlumno[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SeguimientosClasesAlumno|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SeguimientosClasesAlumno patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SeguimientosClasesAlumno[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SeguimientosClasesAlumno findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SeguimientosClasesAlumnosTable extends Table
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

        $this->setTable('seguimientos_clases_alumnos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ClasesAlumnos', [
            'foreignKey' => 'clase_alumno_id'
        ]);
        $this->belongsTo('Calificaciones', [
            'foreignKey' => 'calificacion_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('observacion');

        $validator
            ->boolean('presente')
            ->requirePresence('presente', 'create')
            ->notEmpty('presente');

        $validator
            ->dateTime('fecha')
            ->allowEmpty('fecha');

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
        $rules->add($rules->existsIn(['clase_alumno_id'], 'ClasesAlumnos'));
        $rules->add($rules->existsIn(['calificacion_id'], 'Calificaciones'));

        return $rules;
    }
}
