@extends('layouts.master')
@section('content')
<!-- 左侧内容 -->
<div class="left-sidebar"><!-- Left sidebar starts here -->
  <!-- 搜索功能 -->
  <div class="row-fluid">
    <div class="span12">
      <div class="widget">
        <div class="widget-header">
          <div class="title">
            搜索
          </div>
          <span class="tools">
            <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
          </span>
        </div>
        <div class="widget-body">
          {{ Form::open(array('url'=>'customer', 'method'=>'post', 'class'=>'form-horizontal no-margin')) }}
                    
              客户名称:
              {{ Form::text('c_name', $search["c_name"]?:'', array('class'=>'span3', 'type'=>'text', 'placeholder'=>'公司名称')) }}
              客户状态:
              {{ Form::select('c_status', Config::get('customers.Customers_Status'), $search["c_status"]?:'', array('class'=>'span3 input-left-top-margins')) }}
              <button type="submit" class="btn btn-info">
                查询
              </button>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>

  <!-- 客户列表 -->
  <div class="row-fluid">
    <div class="span12">
      <div class="widget">
      <div class="widget-header">
        <div class="title">
          客户管理
        </div>
        <span class="tools">
          <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
        </span>
      </div>
      <div class="widget-body">

        <div class="control-group">
          <div class="controls controls-row">
              <font color="red">
                {{ Session::get("message") }}
              </font>
          </div>
        </div>

      <table class="table table-condensed table-striped table-bordered table-hover no-margin">
        <thead>
          <tr>
            <th style="width:5%">
              <input type="checkbox" class="no-margin" />
            </th>
            <th style="width:30%">
              客户名称
            </th>
            <th style="width:15%" class="hidden-phone">
              地区
            </th>
            <th style="width:20%" class="hidden-phone">
              行业
            </th>
            <th style="width:10%">
              状态
            </th>
            <th style="width:25%" class="hidden-phone">
              添加时间
            </th>
            <th style="width:10%">
              操作
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($customers as $customer)
          <tr>
            <td>
              <input type="checkbox" class="no-margin" />
            </td>
            <td>
              <a href="/customer/detail/{{ $customer->id }}">
                <span class="name">
                  {{ $customer->c_name }}
                </span>
              </a>
            </td>
            <td class="hidden-phone">
              {{ $customer_zones[substr($customer->c_zonepath, 0, 4)].'-'.$customer_zones[$customer->c_zonepath] }}
            </td>
            <td class="hidden-phone">
              {{ $customer_trades[$customer->c_tradepath] }}
            </td>
            <td>
              <span class="{{ Config::get('customers.Customers_Status_Style')[$customer->c_status] }}">
                {{ Config::get('customers.Customers_Status')[$customer->c_status] }}
              </span>
            </td>
            <td class="hidden-phone">
              {{ $customer->c_createtime }}
            </td>
            <td>
              
              <div class="btn-group">
                <button data-toggle="dropdown" class="btn btn-mini dropdown-toggle">
                  Action 
                  <span class="caret">
                  </span>
                </button>
                <ul class="dropdown-menu">
                  <li>
                    <a href="/customer/detail/{{ $customer->id }}">
                      客户详情
                    </a>
                  </li>
                  <li>
                    <a href="/customer/edit/{{ $customer->id }}">
                      修改客户
                    </a>
                  </li>
                @if(in_array($customer->c_status, array(2, 3, 4)))
                  <li>
                    <a href="/customer/apply/{{ $customer->id }}">
                      申请保护
                    </a>
                  </li>
                @endif
                @if(in_array($customer->c_status, array(0, 1)))
                  <li>
                    <a href="/customer/cancel/{{ $customer->id }}" onclick="javascript:return p_can()">
                      取消保护
                    </a>
                  </li>
                @endif
                  <li>
                    <a href="/customer/delete/{{ $customer->id }}" onclick="javascript:return p_del()">
                      删除客户
                    </a>
                  </li>
                </ul>
              </div>
            </td>
            
          </tr>
          @endforeach
        </tbody>
      </table>

        <SCRIPT LANGUAGE=javascript>   
          function p_del() {   
            var msg = "确认要删除此客户吗?";   
            if (confirm(msg)==true){   
              return true;   
            }else{   
              return false;   
            }   
          }   
          function p_can() {   
            var msg = "确认要取消客户报备吗?";   
            if (confirm(msg)==true){   
              return true;   
            }else{   
              return false;   
            }   
          }  
        </SCRIPT>  
      </div>
    </div>
  </div>

</div><!-- left sidebar ends here -->
</div>


<!-- 右侧内容 -->
<div class="right-sidebar"><!-- Right sidebar starts here -->
  <div class="wrapper">
    <a href="/customer/add">
      <button class="btn btn-large btn-info btn-block" type="button">添加保护客户</button>
    </a>
  </div>
</div><!-- Right sidebar ends here -->
@stop