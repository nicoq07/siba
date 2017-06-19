<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clases Model
 *
 * @property \App\Model\Table\ProfesoresTable|\Cake\ORM\Association\BelongsTo $Profesores
 * @property \App\Model\Table\HorariosTable|\Cake\ORM\Association\BelongsTo $Horarios
 * @property \App\Model\Table\DisciplinasTable|\Cake\ORM\Association\BelongsTo $Disciplinas
 * @property \App\Model\Table\AlumnosTable|\Cake\ORM\Association\BelongsToMany $Alumnos
 *
 * @method \App\Model\Entity\Clase get($primaryKey, $options = [])
 * @method \App\Model\Entity\Clase newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Clase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Clase|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Clase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Clase[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Clase findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClasesTable extends Table
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

        $this->setTable('clases');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Profesores', [
            'foreignKey' => 'profesor_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Horarios', [
            'foreignKey' => 'horario_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Disciplinas', [
            'foreignKey' => 'disciplina_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Alumnos', [
            'foreignKey' => 'clase_id',
            'targetForeignKey' => 'alumno_id',
            'joinTable' => 'clases_alumnos'
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
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

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
        $rules->add($rules->existsIn(['profesor_id'], 'Profesores'));
        $rules->add($rules->existsIn(['horario_id'], 'Horarios'));
        $rules->add($rules->existsIn(['disciplina_id'], 'Disciplinas'));

        return $rules;
    }
}
