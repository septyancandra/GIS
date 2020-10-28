<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php
		$main_menu = $this->db->get_where('jajalquery.tbl_menu', array('parent' => 0));
		foreach ($main_menu->result() as $main) {
			$sub_menu = $this->db->order_by('nama_menu', 'ASC')->get_where('jajalquery.tbl_menu', array('parent' => $main->id_menu));
			if ($sub_menu->num_rows() > 0) {
				// main menu dengan sub menu
				echo '	<li class="treeview">
						<a href="#">
							<i class="'.$main->icon.'"></i>
							<span>'.$main->nama_menu.'</span>
							<span class="pull-right-container">
							  <span class="label label-primary pull-right"></span>
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>';  
				// sub menu nya disini
				echo "<ul class='treeview-menu'>";
				foreach ($sub_menu->result() as $sub) {
					echo "<li>" . anchor($sub->linkci, '<i class="' . $sub->icon . '"></i>' . $sub->nama_menu, array('class' => 'ajax')) . "</li>";
				}
				echo"</ul></li>";
			} else {
				// main menu tanpa sub menu
				//echo "<li>" . anchor($main->linkci, '<i class="' . $main->icon . '"></i>' . $main->nama_menu) . "</li>";
				echo '<li><a href="#">
							<i class="'.$main->icon.'"></i>
							<span>'.$main->nama_menu.'</span>
							<span class="pull-right-container">
							  <span class="label label-primary pull-right"></span>
							</span>
						</a></li>';
			
			}
		}
		?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>