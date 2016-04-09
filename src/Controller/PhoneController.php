<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Phone Controller
 *
 * @property \App\Model\Table\PhoneTable $Phone
 */
class PhoneController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $phone = $this->paginate($this->Phone);

        $this->set(compact('phone'));
        $this->set('_serialize', ['phone']);

        //THIS IS MY FUN WAY OF SPENDING A FRIDAY NIGHT

        $this->set('bc','Phone Numbers');
        $this->set('title', 'Phone Numbers');
        $this->set('sub','Each phone number MUST belong to the default list and then can belong to multiple other lists - cuz we love to niche');
    }

    /**
     * View method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $phone = $this->Phone->get($id, [
            'contain' => []
        ]);

        $this->set('phone', $phone);
        $this->set('_serialize', ['phone']);

        $more = $phone->phone;

        $this->set('title', 'View Phone '.$more);
        $this->set('sub','Phone Number Details');
        $this->set('bc','<a href=\'/Phone/\'>Phone Number</a>  / View  /  '.$more);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $phone = $this->Phone->newEntity();
        if ($this->request->is('post')) {
            $phone = $this->Phone->patchEntity($phone, $this->request->data);
            if ($this->Phone->save($phone)) {
                $phoneid=$phone->id;
                $worklists = TableRegistry::get('Worklist');
                $narf = $this->request->data['smslists'];
                if(!$narf) {
                    $narf = array();
                }
                array_push($narf,'1');
                foreach($narf as $list) {
                    $query = $worklists->query();
                    $query->insert(['phoneid', 'listid'])
                        ->values([
                            'phoneid' => $phoneid,
                            'listid' => $list
                        ])
                        ->epilog('ON DUPLICATE KEY UPDATE `listid`=VALUES(`listid`)')
                        ->execute();
                }
                $this->Flash->success(__('The phone has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The phone could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('phone'));
        $this->set('_serialize', ['phone']);
        $this->set('slists', $this->Phone->Smslist->find('list'));
        $this->set('title', 'Adding Sucker... er New Phone');
        $this->set('sub','Adding SMS Data');
        $this->set('bc','<a href=\'/Phone/\'>SMS Victim</a>  / Add  /  ');
    }

    /**
     * Edit method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $phone = $this->Phone->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $phone = $this->Phone->patchEntity($phone, $this->request->data);
            if ($this->Phone->save($phone)) {
                $phoneid = $phone->id;
                $worklists = TableRegistry::get('Worklist');
                $query = $worklists->query();
                $query->delete()
                    ->where(['phoneid' => $phoneid])
                    ->execute();
                $narf = $this->request->data['smslists'];
                if(!$narf) {
                    $narf = array();
                }
                array_push($narf,'1');
                foreach($narf as $list) {
                    $query = $worklists->query();
                    $query->insert(['phoneid', 'listid'])
                        ->values([
                            'phoneid' => $phoneid,
                            'listid' => $list
                        ])
                        ->epilog('ON DUPLICATE KEY UPDATE `listid`=VALUES(`listid`)')
                        ->execute();
                }
                $this->Flash->success(__('The phone has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The phone could not be saved. Please, try again.'));
            }
        } 
        $this->set(compact('phone'));
        $this->set('_serialize', ['phone']);

        //$ky = $this->Phone->get($id, [ 'contain' => ['']])

        $worklists = TableRegistry::get('Worklist');
        $worky = $worklists->find('all',[ 'conditions' => array('Worklist.phoneid' => $phone->id)]);
        foreach($worky as $shit){
            $porky[] = $shit['listid'];
        }
        $this->set('yup',$porky);

        $this->set('slists', $this->Phone->Smslist->find('list'));

        $more = $phone['phone'];
        $this->set('title', 'Edit Phone '.$more);
        $this->set('sub','Editing Phone Details');
        $this->set('bc','<a href=\'/Phone/\'>SMS Victim</a>  / Edit  /  '.$more);

    }

    /**
     * Delete method
     *
     * @param string|null $id Phone id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $phone = $this->Phone->get($id);
        if ($this->Phone->delete($phone)) {
            $this->Flash->success(__('The phone has been deleted.'));
        } else {
            $this->Flash->error(__('The phone could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
