<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Phone Entity.
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $station
 * @property string $phone
 * @property int $smslist
 */
class Phone extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'smslists' => true
    ];
}
