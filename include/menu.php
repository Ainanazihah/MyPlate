	<?php
    if ($showDataSQL['status']==0)
    {
		?>
    		<!-- Menu Pertama -->
            
            	<li class="mt">
                      <a href="index2.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

<!-- Menu Kedua -->
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Option</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="add.php">Add & Search</a></li>
                          <li><a  href="view.php">View Friends</a></li>
                         
                      </ul>
                  </li>


<!-- Menu Ketiga -->



                 <li class="sub-menu">
                      <a href="logout.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Logout</span>
                      </a>
                  </li>
                  
                  <?php
	}
	elseif ($showDataSQL['status']==1)
    {
		//menu untuk admin
		?>
		
        
        <!-- Menu Pertama -->
            
            	<li class="mt">
                      <a href="index2.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

<!-- Menu Kedua -->
               
 <li class="sub-menu">
                      <a href="setting.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Setting</span>
                      </a>
                  </li>

<!-- Menu Ketiga -->



                 <li class="sub-menu">
                      <a href="logout.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Logout</span>
                      </a>
                  </li>
        
        
        
        
        
        
        <?php
	}
	?>