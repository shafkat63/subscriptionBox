 <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow"  >
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="home.php"style="font-size:1.5rem;background-color:rgb(11, 22, 32);color:white;"><b>SN</b><span  "><b>ACK</b></span><b>BOX</b></a>

  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search" >
  <ul class="navbar-nav px-3"style="background-color:rgb(11, 22, 32); color:white;">
    <li class="nav-item text-nowrap">
    	<?php
    		if (isset($_SESSION['admin_id'])) {
    			?>
    				<a class="nav-link" href="admin-logout.php" style="background-color:rgb(11, 22, 32); color:white;"><b>Log out</b></a>
    			<?php
    		}

    	?>
      
    </li>
  </ul>
</nav>