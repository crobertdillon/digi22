<?php
namespace App\Model\Table;

use App\Model\Entity\Smslist;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Smslist Model
 *
 */
class SmslistTable extends Table
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

        $this->table('smslist');
        $this->displayField('shortname');
        $this->primaryKey('id');

        $this->belongsToMany('Phone', [
            'through' => 'Worklist',
            'dependent' => false
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
            ->notEmpty('shortname', 'Shortname is required');

        $validator
            ->notEmpty('longname','Longname is required');

        return $validator;
    }
}
