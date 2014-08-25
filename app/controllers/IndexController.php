<?php

class IndexController extends BaseController {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	public function getIndex(){
		return Redirect::to("customer");
	}
}
