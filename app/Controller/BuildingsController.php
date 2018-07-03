<?php
App::uses('AppController', 'Controller');
/**
 * ActionLists Controller
 *
 * @property ActionList $ActionList
 * @property PaginatorComponent $Paginator
 */
class BuildingsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Session');
	var $helpers = array('Html', 'Form', 'Session');
/**
 * index method
 *
 * @return void
 */
	public function index() {
	
		$this->loadmodel('Building');
		$buildingList = $this->Building->find('all');
		$this->set('buildingLists', $buildingList);

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ActionList->exists($id)) {
			throw new NotFoundException(__('Invalid action list'));
		}
		$options = array('conditions' => array('ActionList.' . $this->ActionList->primaryKey => $id));
		$this->set('actionList', $this->ActionList->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Building->create();
			if ($this->Building->save($this->request->data)) {
				$this->Session->setFlash('The Building has been saved'); 
				return $this->redirect(array('action' => 'index',"added" => "added"));
			} else {
				$this->Session->setFlash('The Building could not be saved. Please, try again.');
				
			}
		}
		$this->loadmodel('State');
		$states = $this->State->find('list');
		$this->set(compact('states'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Building->exists($id)) {
			throw new NotFoundException(__('Invalid Building list'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Building->save($this->request->data)) {
			$this->Session->setFlash('The Building has been saved.');
				return $this->redirect(array('action' => 'index',"added" => "edited"));
			} else {
				$this->Session->setFlash('The Building could not be saved. Please, try again.');
			}
		} else {
		
			$this->request->data = $this->Building->find('first', array('conditions' => array('Building.' . $this->Building->primaryKey => $id)));
			
		}
		$this->loadmodel('State');
		$states = $this->State->find('list');
		$this->set(compact('states'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Building->id = $id;
		if (!$this->Building->exists()) {
			throw new NotFoundException(__('Invalid Building'));
		}
                
                
               
		$this->request->allowMethod('post', 'delete','get');
		if ($this->Building->delete()) {
			$this->Session->setFlash(Configure::read('MSG.CLOSE').__('The Building has been deleted.'),'default',array('class' => 'alert alert-block alert-danger fade in text-center'));
		} else {
			$this->Session->setFlash(Configure::read('MSG.CLOSE').__('The Building could not be deleted. Please, try again.'),'default',array('class' => 'alert alert-block alert-danger fade in text-center'));
		}
		return $this->redirect(array('action' => 'index',"added" => "deleted"));
	}
       
}
