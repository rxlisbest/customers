<!DOCTYPE html>
<!--[if lt IE 7]>

<html class="lt-ie9 lt-ie8 lt-ie7" lang="en">

<![endif]-->
<!--[if IE 7]>

<html class="lt-ie9 lt-ie8" lang="en">

<![endif]-->
<!--[if IE 8]>

<html class="lt-ie9" lang="en">

<![endif]-->
<!--[if gt IE 8]>
<!-->

<html lang="en">
  
  <!--
<![endif]-->
  <head>
    <meta charset="utf-8">
    <title>
      Blue Moon - Responsive Admin Dashboard
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link href="/css/date.css" rel="stylesheet">
    <link href="/icomoon/style.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet"> <!-- Important. For Theming change primary-color variable in main.css  -->
    <!--[if lte IE 7]>
    <script src="/css/icomoon-font/lte-ie7.js">
    </script>
    <![endif]-->
      <script src="/js/jquery-1.7.2.min.js"></script>
  
  </head>
  <body>
    <header><!-- Header Starts Here -->
      <a href="#" class="logo">
        <img src="/img/logo.png" alt="Logo"/>
      </a>
      @if(Auth::user())
      <div class="btn-group">
        <button class="btn btn-primary">
          {{ Auth::user()? Auth::user()->name: '未知' }}
        </button>
        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
          <span class="caret">
          </span>
        </button>
        <ul class="dropdown-menu pull-right">
          <!-- <li>
            <a href="#">
              Edit Profile
            </a>
          </li>
          <li>
            <a href="#">
              Account Settings
            </a>
          </li> -->
          <li>
            <a href="/logout">
              Logout
            </a>
          </li>
        </ul>
      </div>
      @endif
      <ul class="mini-nav">
        <!-- <li>
          <a href="#">
            <div class="fs1" aria-hidden="true" data-icon="&#xe040;"></div>
            <span class="info-label badge badge-warning">
              3
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <div class="fs1" aria-hidden="true" data-icon="&#xe04c;"></div>
            <span class="info-label badge badge-info">
              5
            </span>
          </a>
        </li>
        <li>
          <a href="#">
            <div class="fs1" aria-hidden="true" data-icon="&#xe037;"></div>
            <span class="info-label badge badge-success">
              9
            </span>
          </a>
        </li> -->
        
      </ul>
    </header><!-- Header Ends Here -->


    <div class="container-fluid"><!-- Container fluid starts here -->

      <div class="dashboard-container"><!-- Dashboard Container starts here -->

        <div class="top-nav"><!-- This is main navigation -->
          <ul>
            <li>
              <a href="/">
                <div class="fs1" aria-hidden="true" data-icon="&#xe0a0;"></div>
                桌面
              </a>
            </li>
            <!-- <li>
              <a href="forms.html" >
                <div class="fs1" aria-hidden="true" data-icon="&#xe0b8;"></div>
                Forms
              </a>
            </li>
            <li>
              <a href="graphs.html">
                <div class="fs1" aria-hidden="true" data-icon="&#xe096;"></div>
                Graphs
              </a>
            </li>
            <li>
              <a href="ui-elements.html">
                <div class="fs1" aria-hidden="true" data-icon="&#xe0d2;"></div>
                UI Elements
              </a>
            </li> -->
            <li>
              <a href="/customer">
                <div class="fs1" aria-hidden="true" data-icon="&#xe0a9;"></div>
                客户
              </a>
            </li>
            <!-- <li>
              <a href="tables.html">
                <div class="fs1" aria-hidden="true" data-icon="&#xe14a;"></div>
                Tables
              </a>
            </li>
            <li>
              <a href="media.html">
                <div class="fs1" aria-hidden="true" data-icon="&#xe00d;"></div>
                Media
              </a>
            </li>
            <li>
              <a href="calendar.html">
                <div class="fs1" aria-hidden="true" data-icon="&#xe052;"></div>
                Calendar
              </a>
            </li>
            <li>
              <a href="typography.html">
                <div class="fs1" aria-hidden="true" data-icon="&#xe100;"></div>
                Typography
              </a>
            </li>
            <li>
              <a href="edit-profile.html" class="selected">
                <div class="fs1" aria-hidden="true" data-icon="&#xe0aa;"></div>
                Extras
              </a>
            </li> -->
          </ul>
          <!-- clear -->
          <div class="clearfix"></div>
        </div>


        <div class="sub-nav"><!-- This is sub navigation -->
          <ul>
            <li><a href="/customer/add" class="">添加客户</a></li>
            <!-- <li>
              <a href="#" >
                Link
              </a>
            </li>
            <li>
              <a href="#">
                Link
              </a>
            </li>
            <li>
              <a href="#" class="selected">
                Link
              </a>
            </li>
            <li>
              <a href="#">
                Link
              </a>
            </li>
            <li>
              <a href="#">
                Link
              </a>
            </li>
            <li>
              <a href="#">
                Link
              </a>
            </li> -->
          </ul>
          <div class="btn-group pull-right"><!-- This dropdown menu is for mobile version -->
            <button class="btn btn-primary">
              Main Menu
            </button>
            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
              <span class="caret">
              </span>
            </button>
            <ul class="dropdown-menu pull-right">
              <!-- <li>
                <a href="index.html" data-original-title="">
                  Dashboard
                </a>
              </li>
              <li>
                <a href="forms.html" data-original-title="">
                  Forms
                </a>
              </li>
              <li>
                <a href="graphs.html" data-original-title="">
                  Graphs
                </a>
              </li>
              <li>
                <a href="ui-elements.html" data-original-title="">
                  UI Elements
                </a>
              </li> -->
              <li>
                <a href="/customer" data-original-title="">
                  客户
                </a>
              </li>
              <!-- <li>
                <a href="tables.html" data-original-title="">
                  Tables
                </a>
              </li>
              <li>
                <a href="media.html" data-original-title="">
                  Media
                </a>
              </li>
              <li>
                <a href="calendar.html" data-original-title="">
                  Calendar
                </a>
              </li>
              <li>
                <a href="typography.html" data-original-title="">
                  Typography
                </a>
              </li>
              <li>
                <a href="edit-profile.html" data-original-title="">
                  Edit Profile
                </a>
              </li>
              <li>
                <a href="invoice.html" data-original-title="">
                  Invoice
                </a>
              </li>
              <li>
                <a href="login.html" data-original-title="">
                  Login
                </a>
              </li>
              <li>
                <a href="404.html" data-original-title="">
                  404 Page
                </a>
              </li>
              <li>
                <a href="500.html" data-original-title="">
                  500 Page
                </a>
              </li>
              <li>
                <a href="help.html" data-original-title="">
                  Help
                </a>
              </li> -->
            </ul>
          </div>
        </div>

        <div class="dashboard-wrapper"><!-- Dashboard wrapper starts here -->

          
              
                    
                      @section('content')
                        This is the master sidebar.
                      @show
                  
                

        </div><!-- Dashboard wrapper hnds here -->

      </div><!--  Dashboard container ends here  -->

    </div><!--  Container fluid ends here  -->


    <footer><!--  Footer starts here  -->
      <p>
        Copyright © 2014  先行科技
      </p>
    </footer><!--  Footer ends here  -->
    <script src="/js/jquery.min.js">
      </script>
      <script src="/js/bootstrap.js">
      </script>
      <script src="/js/jquery.scrollUp.js">
      </script>
      <script src="/js/jquery.dataTables.js">
      </script>

      <script type="text/javascript">
        //ScrollUp
        $(function () {
          $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            topDistance: '300', // Distance from top before showing element (px)
            topSpeed: 300, // Speed back to top (ms)
            animation: 'fade', // Fade, slide, none
            animationInSpeed: 400, // Animation in speed (ms)
            animationOutSpeed: 400, // Animation out speed (ms)
            scrollText: 'Scroll to top', // Text for element
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
          });
        });

        //Tooltip
        $('a').tooltip('hide');

        //Data Tables
        $(document).ready(function () {
          $('#data-table').dataTable({
            "sPaginationType": "full_numbers"
          });
        });

        jQuery('.delete-row').click(function () {
          var conf = confirm('Continue delete?');
          if (conf) jQuery(this).parents('tr').fadeOut(function () {
            jQuery(this).remove();
          });
            return false;
          });
        </script>
    <script type="text/javascript">
      //Tooltip
      $('a').tooltip('hide');
    </script>
  <div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>
</html>