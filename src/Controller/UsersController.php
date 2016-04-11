<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);

        $this->set('bc','Users');
        $this->set('title', 'Users');
        $this->set('sub','Administrative User Details');
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);

        $more = $user['username'];

        $this->set('title', 'View User '.$more);
        $this->set('sub','User Details');
        $this->set('bc','<a href=\'/Users/\'>Users</a>  / View  /  '.$more);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been created successfully.  Wasnt that fun?'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('You broke something so the user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);

        $this->set('title', 'Adding Administrative User');
        $this->set('sub','Please Add User Details');
        $this->set('bc','<a href=\'/Users/\'>Users</a>  / Add');

        $shart = $this->AuthUser->id('role');

        if($shart == 'admin'){
            $this->set('roles',['admin'=>'admin','normal'=>'normal','satan'=>'satan']);
        }
        else {
            $this->set('roles',['normal'=>'normal']);
        }

    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
        $more = $user['username'];
        $this->set('title', 'Edit User '.$more);
        $this->set('sub','Editing User Details');
        $this->set('bc','<a href=\'/Users/\'>Users</a>  / Edit  /  '.$more);
        $this->set('roles',['admin'=>'admin','normal'=>'normal']);

        $shart = $this->AuthUser->id('role');

        if($shart == 'admin'){
            $this->set('roles',['admin'=>'admin','normal'=>'normal','satan'=>'satan']);
        }
        else {
            $this->set('roles',['normal'=>'normal']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted. I hope you are satisfied.'));
        } else {
            $this->Flash->error(__('Defying all odds, the user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow('logout');
    }
    public function login()
    {
        $this->set('title', 'Tribune Broadcasting Digital SMS');
        $this->viewBuilder()->layout('login2');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

}
