<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Agenda Telefonica</a>
      <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"  data-toggle="collapse" data-target="#menu_principal" aria-expanded="false" aria-controls="collapseExample">
        <i class="fas fa-bars"></i>
      </button>
      <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $user['email']; ?><i class="fas fa-user fa-fw"></i></a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="perfil.php">Perfil</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php">Salir</a>
					</div>
				</li>
			</ul>
    </nav>
   
    <div class="collapse bg-dark" style="border: 1px solid white" id="menu_principal">
      <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link active" href="contactos.php">Contactos</a>
        <a class="flex-sm-fill text-sm-center nav-link" href="mantenimiento.php">Mantenimiento</a>
        <a class="flex-sm-fill text-sm-center nav-link" href="about.php">Ayuda</a>
      </nav>
    </div>