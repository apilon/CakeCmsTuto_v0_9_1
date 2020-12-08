<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * ObecCities Controller
 *
 * @property \App\Model\Table\ObecCitiesTable $ObecCities
 *
 * @method \App\Model\Entity\ObecCity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ObecCitiesController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['findObecCities', 'add', 'edit', 'delete']);
        $this->viewBuilder()->setLayout('cakephp_default');

    }

    /**
     * findObecCity method
     * for use with JQuery-UI Autocomplete
     *
     * @return JSon query result
     */
    public function findObecCities() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->ObecCities->find('all', array(
                'conditions' => array('ObecCities.nazev LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['nazev'], 'value' => $result['id']);
            }
            echo json_encode($resultArr);
        }
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['KrajRegions', 'OkresCounties'],
        ];
        $obecCities = $this->paginate($this->ObecCities);

        $this->set(compact('obecCities'));
    }

    /**
     * View method
     *
     * @param string|null $id Obec City id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $obecCity = $this->ObecCities->get($id, [
            'contain' => ['KrajRegions', 'OkresCounties'],
        ]);

        $this->set('obecCity', $obecCity);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $obecCity = $this->ObecCities->newEntity();
        if ($this->request->is('post')) {
            $obecCity = $this->ObecCities->patchEntity($obecCity, $this->request->getData());
//            debug($obecCity); die();
            if ($this->ObecCities->save($obecCity)) {
                $this->Flash->success(__('The obec city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The obec city could not be saved. Please, try again.'));
        }
        $krajRegions = $this->ObecCities->KrajRegions->find('list', ['limit' => 200]);
        $okresCounties = $this->ObecCities->OkresCounties->find('list', ['limit' => 200]);
        $this->set(compact('obecCity', 'krajRegions', 'okresCounties'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Obec City id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $obecCity = $this->ObecCities->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $obecCity = $this->ObecCities->patchEntity($obecCity, $this->request->getData());
            if ($this->ObecCities->save($obecCity)) {
                $this->Flash->success(__('The obec city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The obec city could not be saved. Please, try again.'));
        }
        $krajRegions = $this->ObecCities->KrajRegions->find('list', ['limit' => 200]);
        $okresCounties = $this->ObecCities->OkresCounties->find('list', ['limit' => 200]);
        $this->set(compact('obecCity', 'krajRegions', 'okresCounties'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Obec City id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $obecCity = $this->ObecCities->get($id);
        if ($this->ObecCities->delete($obecCity)) {
            $this->Flash->success(__('The obec city has been deleted.'));
        } else {
            $this->Flash->error(__('The obec city could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
