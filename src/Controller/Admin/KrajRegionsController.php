<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * KrajRegions Controller
 *
 * @property \App\Model\Table\KrajRegionsTable $KrajRegions
 *
 * @method \App\Model\Entity\KrajRegion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KrajRegionsController extends AppController {

    public function initialize() {
        parent::initialize();
//        $this->viewBuilder()->setLayout('cakephp_default');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $krajRegions = $this->paginate($this->KrajRegions);

        $this->set(compact('krajRegions'));
    }

    /**
     * View method
     *
     * @param string|null $id Kraj Region id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $krajRegion = $this->KrajRegions->get($id, [
            'contain' => ['ObecCities', 'OkresCounties'],
        ]);

        $this->set('krajRegion', $krajRegion);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $krajRegion = $this->KrajRegions->newEntity();
        if ($this->request->is('post')) {
            $krajRegion = $this->KrajRegions->patchEntity($krajRegion, $this->request->getData());
            if ($this->KrajRegions->save($krajRegion)) {
                $this->Flash->success(__('The kraj region has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kraj region could not be saved. Please, try again.'));
        }
        $this->set(compact('krajRegion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Kraj Region id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $krajRegion = $this->KrajRegions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $krajRegion = $this->KrajRegions->patchEntity($krajRegion, $this->request->getData());
            if ($this->KrajRegions->save($krajRegion)) {
                $this->Flash->success(__('The kraj region has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kraj region could not be saved. Please, try again.'));
        }
        $this->set(compact('krajRegion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Kraj Region id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $krajRegion = $this->KrajRegions->get($id);
        if ($this->KrajRegions->delete($krajRegion)) {
            $this->Flash->success(__('The kraj region has been deleted.'));
        } else {
            $this->Flash->error(__('The kraj region could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
