<?php
namespace App\Model\Table;

use App\Model\Entity\Worklist;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Worklist Model
 *
 */
class WorklistTable extends Table
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

        $pk = array('listid','phoneid');
        $this->table('worklist');
        $this->displayField('id');
        $this->primaryKey($pk);

        $this->belongsTo('Phone');
        $this->belongsTo('Worklist');
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
            ->integer('phoneid')
            ->requirePresence('phoneid', 'create')
            ->notEmpty('phoneid');

        $validator
            ->integer('listid')
            ->requirePresence('listid', 'create')
            ->notEmpty('listid');

        return $validator;
    }
}
