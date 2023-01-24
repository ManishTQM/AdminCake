<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Phinx\Db\Action\Action;
use Cake\ORM\TableRegistry;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function login(){
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            // debug($user);
            // exit();
            if($user){
                $email = $this->request->getData('email');
                // echo $email;
                $users = TableRegistry::get("Users");
                $data = $users->find('all')->where(['email' => $email])->first();
                // print_r($data->first_name);
                // die;
                $session = $this->getRequest()->getSession();
                $session->write('name', $data->first_name);
                $this->Auth->setUser($user);
                return $this->redirect(['controller' => 'Users', 'action' => 'index']);
            }
            else{
                $this->Flash->error("Incorrect email or password !");
            }
        }

    }
    public function index()
    {
        $key = $this->request->getQuery('key');
        if ($key) {
            $query = $this->Users->find('all')->where(['Or' => ['name like' => '%' . $key . '%', 'email like' => '%' . $key . '%']]);
            // print_r($query);
            // die();
        //  $query = $this->Users->findByName($key);

        } else {
            $query = $this->Users;

        }
        $users = $this->paginate($this->Users);


        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            // $session = $this->request->getSession();
            // $session->destroy();
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //----------------------logout--------------------//

    public function logout(){
        $session = $this->request->getSession();
        $session->destroy();
        return $this->redirect(['action' => 'login']);

    }
    public function userStatus($id= null, $status){
        $this->request->allowMethod(['post']);
        $user = $this->Users->get($id);
        if ($status ==1) {
            $user->status = 0;
        }else{
            $user->status = 1;
        }

        if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been Save.'));
        }
       return $this->redirect(['action' => 'index']);
        // debug($user);
        // exit;
    }
}
