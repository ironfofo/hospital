<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


    <li class="nav-item{{ Request::is('admin/member/*') ?" menu-open " : "" }}">
      <a href="#" class="nav-link{{ Request::is('admin/member/*') ?" active " : "" }}">
      <i class=" nav-icon fa-solid fa-users"></i>
        <p>
          Member
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/admin/member/list" class="nav-link{{ Request::is("admin/member/list") ?" active " : "" }}">
            <i class="far fa-circle nav-icon"></i>
            <p>MemberList</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/admin/member/prm/list" class="nav-link{{ Request::is("admin/member/prm/list") ?" active " : "" }}">
            <i class=" far fa-circle nav-icon"></i>
            <p>prmlist</p>
          </a>
        </li>
      </ul>
    </li>
   
    <li class="nav-item{{ Request::is('admin/booking/*') ?" menu-open " : "" }}">
      <a href="#" class="nav-link{{ Request::is('admin/booking/*') ?" active " : "" }}">
        <i class="nav-icon fa-regular fa-calendar-days"></i>
        <p>
          預約管理
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/admin/booking/list" class="nav-link{{ Request::is("admin/booking/list") ?" active " : "" }}">
            <i class="far fa-circle nav-icon"></i>
            <p>預約名單</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/admin/booking/TimeList/list" class="nav-link{{ Request::is("admin/booking/TimeList/list") ?" active " : "" }}">
            <i class="far fa-circle nav-icon"></i>
            <p>時間清單</p>
          </a>
        </li>
      </ul>
    </li>
    
    <li class="nav-item{{ Request::is('admin/doctor/*') ?" menu-open " : "" }}">
      <a href="#" class="nav-link{{ Request::is('admin/doctor/*') ?" active " : "" }}">
      <i class="nav-icon fa-solid fa-hospital-user"></i>
        <p>
          醫師資料管理
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/admin/doctor/list" class="nav-link{{ Request::is("admin/doctor/list") ?" active " : "" }}">
            <i class="far fa-circle nav-icon"></i>
            <p>醫師基本資料</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/admin/doctor/doctorrest/list" class="nav-link{{ Request::is("admin/doctor/doctorrest/list") ?" active " : "" }}">
            <i class="far fa-circle nav-icon"></i>
            <p>醫師修假表</p>
          </a>
        </li>
      </ul>
    </li>
    
    <li class="nav-item{{ Request::is('admin/professional/*') ?" menu-open " : "" }}">
      <a href="#" class="nav-link{{ Request::is('admin/professional/*') ?" active " : "" }}">
        <i class="nav-icon fas fa-copy"></i>
        <p>
          科別管理
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/admin/professional/professional/list" class="nav-link{{ Request::is("admin/professional/professional/*") ?" active " : "" }}">
            <i class="far fa-circle nav-icon"></i>
            <p>專業分科資料</p>
          </a>
        </li>
      </ul>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/admin/professional/professional_layer1/list" class="nav-link{{ Request::is("admin/professional/professional_layer1/*") ?" active " : "" }}">
            <i class="far fa-circle nav-icon"></i>
            <p>專業分科細項</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item{{ Request::is('admin/chartJs/*') ?" menu-open " : "" }}">
      <a href="#" class="nav-link{{ Request::is('admin/chartJs/*') ?" active " : "" }}">
        <i class="nav-icon fa-solid fa-ranking-star"></i>
        <p>
          數據分析
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/admin/chartJs/list" class="nav-link{{ Request::is("admin/chartJs/list") ?" active " : "" }}">
            <i class="far fa-circle nav-icon"></i>
            <p>會員數據分析</p>
          </a>
        </li>
      </ul>
    </li>



      
  </ul>
</nav>