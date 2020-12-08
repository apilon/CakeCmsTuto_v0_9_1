<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * OkresCounties Controller
 *
 * @property \App\Model\Table\OkresCountiesTable $OkresCounties
 *
 * @method \App\Model\Entity\OkresCounty[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OkresCountiesController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['getByKrajRegion', 'add', 'edit', 'delete']);
    }

    public function getByKrajRegion() {
        $kraj_region_id = $this->request->query('kraj_region_id');

        $okresCounties = $this->OkresCounties->find('all', [
            'conditions' => ['OkresCounties.kraj_region_id' => $kraj_region_id],
        ]);
        /**/        $this->set('okresCounties', $okresCounties);
                  $this->set('_serialize', ['okresCounties']);
        /**/
        /*      $data = '';
                foreach ($okresCounties as $okresCounty) {
                    $data .= '<option value="' . $okresCounty->id . '">' . $okresCounty->nazev . '</option>';
                }
                $this->autoRender = false; // ligne ajoutée
                echo $data;
         */
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['KrajRegions'],
        ];
        $okresCounties = $this->paginate($this->OkresCounties);

        $this->set(compact('okresCounties'));
    }

    /**
     * View method
     *
     * @param string|null $id Okres County id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $okresCounty = $this->OkresCounties->get($id, [
            'contain' => ['KrajRegions', 'ObecCities'],
        ]);

        $this->set('okresCounty', $okresCounty);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $okresCounty = $this->OkresCounties->newEntity();
        if ($this->request->is('post')) {
            $okresCounty = $this->OkresCounties->patchEntity($okresCounty, $this->request->getData());
            if ($this->OkresCounties->save($okresCounty)) {
                $this->Flash->success(__('The okres county has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The okres county could not be saved. Please, try again.'));
        }
        $krajRegions = $this->OkresCounties->KrajRegions->find('list', ['limit' => 200]);
        $this->set(compact('okresCounty', 'krajRegions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Okres County id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $okresCounty = $this->OkresCounties->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $okresCounty = $this->OkresCounties->patchEntity($okresCounty, $this->request->getData());
            if ($this->OkresCounties->save($okresCounty)) {
                $this->Flash->success(__('The okres county has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The okres county could not be saved. Please, try again.'));
        }
        $krajRegions = $this->OkresCounties->KrajRegions->find('list', ['limit' => 200]);
        $this->set(compact('okresCounty', 'krajRegions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Okres County id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $okresCounty = $this->OkresCounties->get($id);
        if ($this->OkresCounties->delete($okresCounty)) {
            $this->Flash->success(__('The okres county has been deleted.'));
        } else {
            $this->Flash->error(__('The okres county could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
