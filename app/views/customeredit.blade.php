@extends('layouts.master')
@section('content')
<div class="left-sidebar"><!-- Left sidebar starts here -->
  <div class="row-fluid">
    <div class="span12">
      <div class="widget">
      <div class="widget-header">
        <div class="title">
          修改客户
        </div>
        <span class="tools">
          <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
        </span>
      </div>
      <div class="widget-body">

      {{ Form::open(array('url'=>'customer/edit/'.$customer->id, 'method'=>'post', 'class'=>'form-horizontal no-margin')) }}
        <div class="control-group">
          <div class="controls controls-row">
              <font color="red">
                {{ Session::get("message") }}
              </font>
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label">
            公司名称
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_name', $customer->c_name, array('class'=>'span6', 'required'=>'required', 'type'=>'text', 'placeholder'=>'公司名称')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            提交保护申请
          </label>
          <div class="controls">
            <label class="radio inline">
              {{ Form::radio('c_status', 0, false, array('class'=>'', 'type'=>'radio')) }}
              提交
            </label>
            <label class="radio inline">
              {{ Form::radio('c_status', 1, true, array('class'=>'', 'type'=>'radio')) }}
              不提交
            </label>
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label">
            联系人姓名
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_contact', $customer->c_contact, array('class'=>'span3', 'required'=>'required', 'type'=>'text', 'placeholder'=>'联系人姓名')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            联系人电话
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_phone', $customer->c_phone, array('class'=>'span5', 'required'=>'required', 'type'=>'text', 'placeholder'=>'联系人电话')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            联系人手机
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_mobile', $customer->c_mobile, array('class'=>'span5', 'type'=>'text', 'placeholder'=>'联系人手机')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="stateAndCity">
            区域
          </label>
          <div class="controls">

            {{ Form::select('city', $city, substr($customer->c_zonepath, 0, 4), array('class'=>'span2', 'id'=>'stateAndCity', 'id'=>'city')) }}
            {{ Form::select('area', $county, $customer->c_zonepath, array('class'=>'span2 input-left-top-margins', 'id'=>'county')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            地址
          </label>
          <div class="controls">
            {{ Form::text('c_address', $customer->c_address, array('class'=>'span8', 'type'=>'text', 'required'=>'required', 'placeholder'=>'公司详细地址')) }}
            <!-- <span class="help-inline ">
              Enter your Address
            </span> -->
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="stateAndCity">
            行业
          </label>
          <div class="controls">
            {{ Form::select('c_tradepath', $customer_trades, $customer->c_tradepath, array('class'=>'span6 input-left-top-margins')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            客户邮编
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_postcode', $customer->c_postcode, array('class'=>'span6', 'type'=>'text', 'placeholder'=>'客户邮编')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            公司注册地址
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_registeraddress', $customer->c_registeraddress, array('class'=>'span8', 'type'=>'text', 'placeholder'=>'公司注册地址')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            公司网址
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_siteurl', $customer->c_siteurl, array('class'=>'span6', 'type'=>'text', 'placeholder'=>'http://')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            公司注册资金
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_registermoney', $customer->c_registermoney, array('class'=>'span6', 'type'=>'text', 'placeholder'=>'￥0.00')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            公司注册时间
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_registerdate', $customer->c_registerdate, array('class'=>'input', 'type'=>'text', 'placeholder'=>'0000-00-00', 'id'=>'j_Date2')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            营业执照号
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_businesslicence', $customer->c_businesslicence, array('class'=>'span6', 'type'=>'text', 'placeholder'=>'营业执照号')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            营业执照到期时间
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_businesslicencedate', $customer->c_businesslicencedate, array('class'=>'input', 'type'=>'text', 'placeholder'=>'0000-00-00', 'id'=>'j_Date1')) }}

          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            国税登记号
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_dutyparagraph', $customer->c_dutyparagraph, array('class'=>'span6', 'type'=>'text', 'placeholder'=>'国税登记号')) }}
          </div>
        </div>

         <div class="control-group">
          <label class="control-label">
            ICP备案
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_icp', $customer->c_icp, array('class'=>'span6', 'type'=>'text', 'placeholder'=>'ICP备案')) }}
          </div>
        </div>

         <div class="control-group">
          <label class="control-label">
            法人
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_corporation', $customer->c_corporation, array('class'=>'span3', 'type'=>'text', 'placeholder'=>'法人')) }}
          </div>
        </div>

         <div class="control-group">
          <label class="control-label">
            法人身份证
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_corporationid', $customer->c_corporationid, array('class'=>'span6', 'type'=>'text', 'placeholder'=>'法人身份证')) }}
          </div>
        </div>

         <div class="control-group">
          <label class="control-label">
            个人/企业
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_nature', $customer->c_nature, array('class'=>'span6', 'type'=>'text', 'placeholder'=>'公司名称')) }}
          </div>
        </div>

         <div class="control-group">
          <label class="control-label">
            主营业务
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_mainoperation', $customer->c_mainoperation, array('class'=>'span6', 'type'=>'text', 'placeholder'=>'主营业务')) }}
          </div>
        </div>

         <div class="control-group">
          <label class="control-label">
            经营范围
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_businessscope', $customer->c_businessscope, array('class'=>'span6', 'type'=>'text', 'placeholder'=>'经营范围')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            主要市场
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_mainmarket', $customer->c_mainmarket, array('class'=>'span6', 'type'=>'text', 'placeholder'=>'主要市场')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="stateAndCity">
            企业经营模式
          </label>
          <div class="controls">
            {{ Form::select('c_businessmode', Config::get('customers.Customers_BusinessMode'), $customer->c_businessmode, array('class'=>'span3 input-left-top-margins')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="stateAndCity">
            企业性质
          </label>
          <div class="controls">
            {{ Form::select('c_character', Config::get('customers.Customers_Character'), $customer->c_character, array('class'=>'span4 input-left-top-margins')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="stateAndCity">
            年营业额
          </label>
          <div class="controls">
            {{ Form::select('c_yearturnover', Config::get('customers.Customers_YearTurnover'), $customer->c_yearturnover, array('class'=>'span3 input-left-top-margins')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="stateAndCity">
            员工人数
          </label>
          <div class="controls">
            {{ Form::select('c_employeenumber', Config::get('customers.Customers_EmployeeNumber'), $customer->c_employeenumber, array('class'=>'span2 input-left-top-margins')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label" for="stateAndCity">
            客户来源类型
          </label>
          <div class="controls">
            {{ Form::select('c_fromtype', Config::get('customers.Customers_FromType'), $customer->c_fromtype, array('class'=>'span3 input-left-top-margins')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            来源网址
          </label>
          <div class="controls controls-row">
            {{ Form::text('c_sourceurl', $customer->c_sourceurl, array('class'=>'span6', 'type'=>'text', 'placeholder'=>'http://')) }}
          </div>
        </div>

        <div class="control-group">
          <label class="control-label">
            公司简介
          </label>
          <div class="controls controls-row">
            {{ Form::textarea ('c_brief', $customer->c_brief, array('class'=>'span10', 'type'=>'text', 'placeholder'=>'公司简介')) }}
          </div>
        </div>

        <div class="form-actions no-margin">
          <button type="submit" class="btn btn-info pull-right">
            提交
          </button>
          <div class="clearfix">
          </div>
        </div>
                
      {{ Form::close() }}
        <script language="javascript">  
            $(document).ready(function(){
              //alert(111);
             /* $.ajax({
                type: "get",
                dataType: "json", 
                url: "/customer/county/{{substr($customer->c_zonepath, 0, 4)}}",
                data: '',//提交表单，相当于CheckCorpID.ashx?ID=XXX
                success: function(county){
                  county = eval(county);
                  $("#county").empty();
                  //$("#county").append("<option value='"+0+"'>所有县区</option>");
                  for(var i in county){
                    $("#county").append("<option value='"+i+"'>"+county[i]+"</option>");
                  }
              }); */
            });
            $("#city").change(function(){
              //alert($(this).val());
              $.ajax({
                type: "get",
                dataType: "json", 
                url: "/customer/county/"+$(this).val(),
                data: '',//提交表单，相当于CheckCorpID.ashx?ID=XXX
                success: function(county){
                  county = eval(county);
                  $("#county").empty();
                  //$("#county").append("<option value='"+0+"'>所有县区</option>");
                  for(var i in county){
                    $("#county").append("<option value='"+i+"'>"+county[i]+"</option>");
                  }
                  //alert( msg ); 
                } //操作成功后的操作！msg是后台传过来的值
              }); 
            });
        </script>  
        <script src='/js/date.js' language='JavaScript'>
        </script>
        <script language='JavaScript'>

          var myDate1 = new Calender({id:'j_Date1'});
          var myDate2 = new Calender({id:'j_Date2'});
        </script>
      </div>
      </div>
    </div>
  </div>

</div><!-- left sidebar ends here -->


<!-- 右侧内容 -->
<div class="right-sidebar"><!-- Right sidebar starts here -->
  <div class="wrapper">
    <a href="/customer">
      <button class="btn btn-large btn-success btn-block" type="button">客户列表</button>
    </a>
  </div>
</div><!-- Right sidebar ends here -->
@stop