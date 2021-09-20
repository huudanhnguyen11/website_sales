<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
              <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Admin</p>
                  <p class="designation">Premium user</p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/websitebanhang/admin/Views/Dashboard/">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/websitebanhang/admin/views/user/">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Quản lý nhân viên</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Quản lý sản phẩm</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="http://localhost/websitebanhang/admin/views/category/">Quản lý loại sản phẩm</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="http://localhost/websitebanhang/admin/views/brand/">Quản lý thương hiệu</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="http://localhost/websitebanhang/admin/views/product/">Quản lý mặt hàng</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/websitebanhang/admin/views/customer/">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Quản lý khách hàng</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/websitebanhang/admin/Views/Order/">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Quản lý đơn hàng</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="menu-icon typcn typcn-user-outline"></i>
                <span class="menu-title">Thống kê doanh thu</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="menu-icon typcn typcn-document-add"></i>
                <span class="menu-title">Quản lý tài khoản</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="pages/samples/blank-page.html">Đổi mật khẩu</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../Controllers/accountController.php?logout=ok">Đăng xuất</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>