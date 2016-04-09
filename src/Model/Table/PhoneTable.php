<?php
namespace App\Model\Table;

use App\Model\Entity\Phone;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Localized\Validation\UsValidation;
use Cake\Validation\Validator;

/**
 * Phone Model
 *
 */
class PhoneTable extends Table
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

        $this->table('phone');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsToMany('Smslist', [
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
    public function validationDefault(Validator $validator) {


        $validator = new Validator();
        // add the provider to the validator
        $validator->provider('us', UsValidation::class);
        // use the provider in a field validation rule
        $validator->add('phone', 'checkyphone', [
            'rule' => 'phone',
            'provider' => 'us',
            'message' => 'Please enter a valid US phone number'
        ]);

        $validator->add('phone', 'unique', [
            'rule' => 'validateUnique',
            'provider' => 'table',
            'message' => 'That phone number already exists in the database'
        ]);

        $validator
            ->requirePresence('first_name')
            ->notEmpty('first_name', 'First name is required')
            ->add('first_name', [
                'length' => [
                    'rule' => ['minLength', 2],
                    'message' => 'First names need to be at least 2 characters long',
                ]
            ])
            ->allowEmpty('last_name')
            ->allowEmpty('station');


        return $validator;
    }
}
