<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

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
        $this->loadComponent('RequestHandler');
        $this->Auth->allow(['index']);
    }

    public function index() {
        $krajRegions = $this->KrajRegions->find('all');
        $this->set([
            'krajRegions' => $krajRegions,
            '_serialize' => ['krajRegions']
        ]);
    }

    public function view($id) {
        $krajRegion = $this->KrajRegions->get($id);
        $this->set([
            'krajRegion' => $krajRegion,
            '_serialize' => ['krajRegion']
        ]);
    }

    public function add() {
        $this->request->allowMethod(['post', 'put']);
        $krajRegion = $this->KrajRegions->newEntity($this->request->getData());
        if ($this->KrajRegions->save($krajRegion)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'krajRegion' => $krajRegion,
            '_serialize' => ['message', 'krajRegion']
        ]);
    }

    public function edit($id) {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $krajRegion = $this->KrajRegions->get($id);
        $krajRegion = $this->KrajRegions->patchEntity($krajRegion, $this->request->getData());
        if ($this->KrajRegions->save($krajRegion)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

    public function delete($id) {
        $this->request->allowMethod(['delete']);
        $krajRegion = $this->KrajRegions->get($id);
        $message = 'Deleted';
        if (!$this->KrajRegions->delete($krajRegion)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

}
