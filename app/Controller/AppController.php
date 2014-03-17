<?php
/**
 * Application level Controller
 * German Gonzalez B.
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $helpers = array('GoogleMap');

	public function beforefilter(){

		$this->layout = "life";
	}
}
