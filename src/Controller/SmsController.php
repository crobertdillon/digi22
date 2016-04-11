<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;


/**
 * Sms Controller
 *
 * @property \App\Model\Table\SmsTable $Sms
 */
class SmsController extends AppController
{
    public $components = ['Paginator'];
    public $paginate = [
        'limit' => 25000,
        'order' => [
            'Sms.utc' => 'desc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Twilio');
        
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->viewBuilder()->layout('dashboard');
        $this->set('title', 'Dashboard');
        $this->set('sub','SMS Messages Sent');
        $sms = $this->paginate($this->Sms);

        $this->set(compact('sms'));
        $this->set('_serialize', ['sms']);


        $messy = 0;
        $phones = 0;
        $burgers = 34;
        $trump = 9999999;

        $messy = $this->Sms->find()->count();

        $phony = TableRegistry::get('Phone');

        $phones = $phony->find()->count();
        $burgers = mt_rand(2, 150);
        $trump = mt_rand(2, 1500000);

        $this->set('messy',$messy);
        $this->set('phones',$phones);
        $this->set('burgers',$burgers);
        $this->set('trump',$trump);
        
        
        
        

    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sm = $this->Sms->newEntity();
        if ($this->request->is('post')) {
            $sm = $this->Sms->patchEntity($sm, $this->request->data);
            $messy = $this->request->data;
            $mess = $messy['mess'];
            $list = $messy['list'];
            $utc = $messy['utc'];
            $plu = TableRegistry::get('Phone');
            $phony = TableRegistry::get('Worklist');
            $query = $phony
                ->find()
                ->where(['listid' => $list]);
            foreach ($query as $nummy) {
                $pid = $nummy['phoneid'];

                $furry = $plu
                    ->find()
                    ->select('phone')
                    ->where(['id'=>$pid])
                    ->first();

                //debug($furry);

                $nardo = $furry->phone;
                $retval = "";
                $status = "";
                $err = "";
                $frodo = $this->Twilio->sendSms($nardo,$mess);
                $ret = $frodo['retval'];
                $status = $frodo['status'];
                $err = $frodo['err'];
                $messval = $ret."|".$status."|".$err;
                $utc = time();
                $logsms = TableRegistry::get('SmsLog');
                $log = $logsms->newEntity();
                $log->phone = $nardo;
                $log->smsid = $list;
                $log->message = $mess;
                $log->retval = $messval;
                $log->utc = $utc;
                $logsms->save($log);


            }
            if ($this->Sms->save($sm)) {
                $this->Flash->success(__('The sms has been sent.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The sm could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('sm'));
        $this->set('_serialize', ['sm']);

        $list = TableRegistry::get('Smslist');
        $this->set('slists', $list->find('list'));

        $this->set('cuser',$this->AuthUser->id('username'));

        $this->set('title', 'Sending New SMS Message');
        $this->set('sub','So whats so gosh durn important you cant walk five miles uphills bothways in the snow?');
        $this->set('bc','<a href=\'/\'>SMS</a>  /  Send');

    }


}
