<?php

class CustomerController extends BaseController {

	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		if (Cache::has('customer_trades')){
			$this->customer_trades = Cache::get('customer_trades');
			$this->customer_zones = Cache::get('customer_zones');
			//var_dump(Cache::has('customer_trades'));exit;

		}
		else{
			$this->customer_trades = $this->get_customer_trades();
			$this->customer_zones = $this->get_customer_zones();
			Cache::put('customer_trades', $this->customer_trades, 15);
			Cache::put('customer_zones', $this->customer_zones, 15);
			//var_dump($this->customer_zones);exit;
		}
	}

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected $layout = 'layouts.master';

	public function getIndex(){
		$data["search"]["c_name"] = '';
		$data["search"]["c_status"] = '';
		$customers = Customers::whereRaw('c_add_userid=? AND c_status <> ?', array(Auth::user()->id, 3))->orderby('id', 'desc')->get();
		$data["customers"] = $customers;
		$data["customer_trades"] = $this->customer_trades;
		$data["customer_zones"] = $this->customer_zones;
		$this->layout->content = View::make("customer")->with($data);
	}

	public function postIndex(){
		//if(Input::get("c_name"))
		$data["search"]["c_name"] = Input::get("c_name");
		$data["search"]["c_status"] = Input::get("c_status");
		$customers = Customers::whereRaw('c_add_userid=? AND c_name like ? AND c_status=?', array(Auth::user()->id, "%".Input::get("c_name")."%", Input::get("c_status")))->orderby('id', 'desc')->get();
		$data["customers"] = $customers;
		$data["customer_trades"] = $this->customer_trades;
		$data["customer_zones"] = $this->customer_zones;
		$this->layout->content = View::make("customer")->with($data);
	}

	public function getAdd(){
		$data["customer_trades"] = $this->customer_trades;
		$data["customer_zones"] = $this->customer_zones;
		$data["city"] = $this->_getCity();
		$data["county"] = $this->_getCounty();
		$this->layout->content = View::make("customeradd")->with($data);
	}

	public function getDetail($c_id){
		$data["customer_trades"] = $this->customer_trades;
		$data["customer_zones"] = $this->customer_zones;
		$data["city"] = $this->_getCity();
		$data["county"] = $this->_getCounty();
		$data["customer"] = Customers::whereRaw('id = ?', array($c_id))->get()->first();
		$this->layout->content = View::make("customerdetail")->with($data);
	}

	public function postAdd(){
		//var_dump(Input::get());exit;
		$validator = Validator::make(Input::all(),
				array(
					'c_name' => 'required',
					'c_address' => 'required',
					'area' => 'required',
					//'c_keyword' => 'required',
				)
			);
		if($validator->fails()){
			return Redirect::to("customer/add")->with("message", "必填项不能为空!")->withErrors($validator)->withInput();
		}

		if(!$this->_getProtectNumberCheck()){
			return Redirect::to("customer/add")->with("message", "报备客户数量己达到限制数量,不能继续报备!")->withInput();
		}

		$customers = new Customers();
		$customers->c_name = Input::get('c_name');
		$customers->c_tradepath = Input::get('c_tradepath');
		$customers->c_zonepath = Input::get('area');
		$customers->c_address = Input::get('c_address');
		$customers->c_postcode = Input::get('c_postcode');
		$customers->c_businesslicence = Input::get('c_businesslicence');
		$customers->c_businesslicencedate = Input::get('c_businesslicencedate');
		$customers->c_siteurl = Input::get('c_siteurl');
		$customers->c_registeraddress = Input::get('c_registeraddress');
		$customers->c_registerdate = Input::get('c_registerdate');
		$customers->c_registermoney = Input::get('c_registermoney');
		$customers->c_mainoperation = Input::get('c_mainoperation');
		$customers->c_businessscope = Input::get('c_businessscope');
		$customers->c_mainmarket = Input::get('c_mainmarket');
		$customers->c_corporation = Input::get('c_corporation');
		$customers->c_corporationid = Input::get('c_corporationid');
		$customers->c_dutyparagraph = Input::get('c_dutyparagraph');
		$customers->c_nature = Input::get('c_nature');
		$customers->c_keyword = Input::get('c_keyword');
		$customers->c_brief = Input::get('c_brief');
		$customers->c_icp = Input::get('c_icp');
		$customers->c_businessmode = Input::get('c_businessmode');
		$customers->c_character = Input::get('c_character');
		$customers->c_fromtype = Input::get('c_fromtype');
		$customers->c_employeenumber = Input::get('c_employeenumber');
		$customers->c_yearturnover = Input::get('c_yearturnover');
		$customers->c_sourceurl = Input::get('c_sourceurl');
		$customers->c_createtime = date("Y-m-d H:i:s");
		if(!Input::get('c_status'))
			$customers->c_status = 0;
		else
			$customers->c_status = 4;
		$customers->c_add_userid = Auth::user()->id;

		$customers->c_contact = Input::get('c_contact');
		$customers->c_phone = Input::get('c_phone');
		$customers->c_mobile = Input::get('c_mobile');
		$customers->save();
		return Redirect::to('customer');

		//$this->layout->content = View::make("customeradd");
	}

	public function getEdit($c_id){
		$data["customer_trades"] = $this->customer_trades;
		$data["customer_zones"] = $this->customer_zones;
		$data["city"] = $this->_getCity();
		$data["county"] = $this->_getCounty();
		$data["customer"] = Customers::whereRaw('id = ?', array($c_id))->get()->first();
		$this->layout->content = View::make("customeredit")->with($data);
	}

	public function postEdit($c_id){
		//var_dump(Input::get());exit;
		$validator = Validator::make(Input::all(),
				array(
					'c_name' => 'required',
					'c_address' => 'required',
					'area' => 'required',
					//'c_keyword' => 'required',
				)
			);
		if($validator->fails()){
			return Redirect::to("customer/edit/".$c_id)->with("message", "必填项不能为空!")->withErrors($validator)->withInput();
		}
		$customer = Customers::whereRaw('id = ?', array($c_id))->get()->first();

		if(!Input::get('c_status') && $customer->c_status!=1 && !$this->_getProtectNumberCheck()){
			return Redirect::to("customer/edit/".$c_id)->with("message", "报备客户数量己达到限制数量,不能继续报备!")->withInput();
		}

		$customer->c_name = Input::get('c_name');
		$customer->c_tradepath = Input::get('c_tradepath');
		$customer->c_zonepath = Input::get('area');
		$customer->c_address = Input::get('c_address');
		$customer->c_postcode = Input::get('c_postcode');
		$customer->c_businesslicence = Input::get('c_businesslicence');
		$customer->c_businesslicencedate = Input::get('c_businesslicencedate');
		$customer->c_siteurl = Input::get('c_siteurl');
		$customer->c_registeraddress = Input::get('c_registeraddress');
		$customer->c_registerdate = Input::get('c_registerdate');
		$customer->c_registermoney = Input::get('c_registermoney');
		$customer->c_mainoperation = Input::get('c_mainoperation');
		$customer->c_businessscope = Input::get('c_businessscope');
		$customer->c_mainmarket = Input::get('c_mainmarket');
		$customer->c_corporation = Input::get('c_corporation');
		$customer->c_corporationid = Input::get('c_corporationid');
		$customer->c_dutyparagraph = Input::get('c_dutyparagraph');
		$customer->c_nature = Input::get('c_nature');
		$customer->c_keyword = Input::get('c_keyword');
		$customer->c_brief = Input::get('c_brief');
		$customer->c_icp = Input::get('c_icp');
		$customer->c_businessmode = Input::get('c_businessmode');
		$customer->c_character = Input::get('c_character');
		$customer->c_fromtype = Input::get('c_fromtype');
		$customer->c_employeenumber = Input::get('c_employeenumber');
		$customer->c_yearturnover = Input::get('c_yearturnover');
		$customer->c_sourceurl = Input::get('c_sourceurl');
		//$customers->c_createtime = date("Y-m-d H:i:s");
		if(!Input::get('c_status'))
			$customers->c_status = 0;
		$customer->c_add_userid = Auth::user()->id;

		$customer->c_contact = Input::get('c_contact');
		$customer->c_phone = Input::get('c_phone');
		$customer->c_mobile = Input::get('c_mobile');
		$customer->save();
		return Redirect::to('customer');

		//$this->layout->content = View::make("customeradd");
	}

	public function getDelete($c_id){
		$customer = Customers::whereRaw('id = ?', array($c_id))->get()->first();
		$customer->c_status = 3;
		$customer->save();
		return Redirect::to('customer');
	}

	public function getCancel($c_id){
		$customer = Customers::whereRaw('id = ?', array($c_id))->get()->first();
		$customer->c_status = 4;
		$customer->save();
		return Redirect::to('customer');
	}

	public function getApply($c_id){
		$customer = Customers::whereRaw('id = ?', array($c_id))->get()->first();
		if(!$this->_getProtectNumberCheck()){
			return Redirect::to("customer")->with("message", "保护客户数量己达到限制数量,不能继续保护!")->withInput();
		}
		$customer->c_status = 0;
		$customer->save();
		return Redirect::to('customer');
	}

	public function getCounty($path=33){
		$data = CustomerZones::whereRaw("left(c_zonepath, ?)=? AND length(c_zonepath)=?", array(strlen($path), $path, 6))->get();

		$county = array(
				"" => "所有县区",
			);
		foreach ($data as $key => $value) {
			$county[$value->c_zonepath] = $value->c_zonename;
		}
		echo json_encode($county);
		exit ;
	}

	private function _getCity($path=33){
		$data = CustomerZones::whereRaw("left(c_zonepath, 2)=? AND length(c_zonepath)=?", array($path, 4))->get();
		$city = array(
				$path => "所有城市",
			);
		foreach ($data as $key => $value) {
			$city[$value->c_zonepath] = $value->c_zonename;
		}
		return $city;
	}

	private function _getCounty($path=33){
		$data = CustomerZones::whereRaw("left(c_zonepath, ?)=? AND length(c_zonepath)=?", array(strlen($path), $path, 6))->get();

		$county = array(
				"" => "所有县区",
			);
		foreach ($data as $key => $value) {
			$county[$value->c_zonepath] = $value->c_zonename;
		}
		return $county;
	}

	private function _getProtectNumberCheck(){
		$number = Customers::whereRaw('c_add_userid=? AND c_status IN (?, ?)', array(Auth::user()->id, 1, 0))->count();
		if((int)$number<Auth::user()->c_num)
			return TRUE;
		else
			return FALSE;
	}
}
