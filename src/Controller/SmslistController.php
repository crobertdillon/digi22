<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Smslist Controller
 *
 * @property \App\Model\Table\SmslistTable $Smslist
 */
class SmslistController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $smslist = $this->paginate($this->Smslist);

        $this->set(compact('smslist'));
        $this->set('_serialize', ['smslist']);
        $this->set('bc','SMS Lists');
        $this->set('title', 'SMS Lists');
        $this->set('sub','Getting Nichey With It - SMS Lists');
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $smslist = $this->Smslist->newEntity();
        if ($this->request->is('post')) {
            $smslist = $this->Smslist->patchEntity($smslist, $this->request->data);
            if ($this->Smslist->save($smslist)) {
                $this->Flash->success(__('The smslist has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The smslist could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('smslist'));
        $this->set('_serialize', ['smslist']);

        $this->set('title', 'Adding New SMS List');
        $this->set('sub','Please Add List Details');
        $this->set('bc','<a href=\'/Smslist/\'>Adding SMS List</a>  / Add');
    }

    /**
     * Edit method
     *
     * @param string|null $id Smslist id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $smslist = $this->Smslist->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $smslist = $this->Smslist->patchEntity($smslist, $this->request->data);
            if ($this->Smslist->save($smslist)) {
                $this->Flash->success(__('The smslist has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The smslist could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('smslist'));
        $this->set('_serialize', ['smslist']);

        $this->set('title', 'Editing SMS List');
        $this->set('sub','Edit List Details');
        $this->set('bc','<a href=\'/Smslist/\'>Edit SMS List</a>  / Edit');
    }

    /**
     * Delete method
     *
     * @param string|null $id Smslist id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $smslist = $this->Smslist->get($id);
        if ($this->Smslist->delete($smslist)) {
            $this->Flash->success(__('The smslist has been deleted.'));
        } else {
            $this->Flash->error(__('The smslist could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
