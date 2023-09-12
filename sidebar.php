 <?php
  
  //session_start();
   if(!isset($_SESSION['user_name'])){
   //header('location:login.php');
  }
  ?>
  <nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <!-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> -->
      </ul>
      
    </form>
    <ul class="navbar-nav navbar-right">
     
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block"><?php echo $_SESSION['user_name']?></div></a>
        <div class="dropdown-menu dropdown-menu-right">
          
          <a href="logout.php" class="dropdown-item has-icon text-danger">
            <i class="fas fa-sign-out-alt"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index1.php">Ekstrakulikuler</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index1.php">EKS</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li >
          <a href="index1.php" ><i class="fas fa-fire"></i><span href="index1.php">Dashboard</span></a>
          
        </li>

        <li class="menu-header">Ekstrakulikuler</li>
        <li >
          <a href="pendaftaran-siswa.php"><i class="far fa-file-alt" ></i> <span href="pendaftaran-siswa.php">Pendaftaran</span></a>
        </li>
        <li>
          <a class="nav-link" href="ekstrakulikuler1.php "><i class="far fa-square"></i> <span href="ekstrakulikuler1.php"> Informasi Ekstrakulikuler</span></a>
        </li>
        <li >
          <a href="agenda-siswa.php" ><i class="fas fa-th"></i> <span href="agenda.php">Agenda</span></a>
        </li>
        <li>
          <a href="datapeserta-siswa.php" ><i class="fas fa-columns"></i> <span href="datapeserta-siswa.php">Data Peserta</span></a>
        </li>
        <li>
          <a href="pembina_siswa.php" ><i class="far fa-user"></i> <span href="pembina_siswa.php">Pembina</span></a>
        </li>
         <li>
          <a class="nav-link" href="nilai.php"><i class="fas fa-edit"></i> <span  href="nilai.php">Nilai</span></a>
        </li>
      </ul>

      </aside>
  </div>