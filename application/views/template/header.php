<header class="main-header">
    <!-- Logo -->
    <a  href="<?php echo site_url('web/dashboard'); ?>" class="logo ajax" >
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SI</b>TE</span>
      <!-- logo for regular state and mobile devices -->
      <span class="header" style="font-size: 15px;"><b >SITE Semarang</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>		
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">                    
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php 
					$token = $this->session->userdata('token');					
					$udata=$this->session->userdata("userData");
					if (empty($token)) {
						echo base_url('assets/adminlte/dist/img/user2-160x160.jpg');
					} else {						
						echo $udata['picture_url'];
					}
				?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $udata['nama']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php 
					if (empty($token)) {
							echo base_url('assets/adminlte/dist/img/user2-160x160.jpg');
						} else {						
							echo $udata['picture_url'];
						}				
				?>" class="img-circle" alt="User Image">                
				<p></p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">                  
				  <a href="<?php echo base_url('portal/log/out'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <!--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->
          </li>
        </ul>
      </div>
    </nav>
  </header>