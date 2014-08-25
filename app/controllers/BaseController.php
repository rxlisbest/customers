<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function get_customer_trades(){
		$data = CustomerTrades::all();
		$customer_trades = array();
		foreach ($data as $key => $value) {
			$customer_trades[$value->c_tradepath] = $value->c_tradename;
		}
		return $customer_trades;
	}

	public function get_customer_zones(){
		$data = CustomerZones::all();
		$customer_zones = array();
		foreach ($data as $key => $value) {
			$customer_zones[$value->c_zonepath] = $value->c_zonename;
		}
		return $customer_zones;
	}

}
