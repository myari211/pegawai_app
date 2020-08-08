<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;1,100;1,400&display=swap" rel="stylesheet">
    <title>Aplikasi Pegawai</title>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
body{
    font-family: 'Poppins', sans-serif;
}
#body-row {
    margin-left:0;
    margin-right:0;
}
#sidebar-container {
    min-height: 100vh;   
    background-color: #333;
    padding: 0;
}


.sidebar-expanded {
    width: 230px;
}
.sidebar-collapsed {
    width: 60px;
}


#sidebar-container .list-group a {
    height: 50px;
    color: white;
}


#sidebar-container .list-group .sidebar-submenu a {
    height: 45px;
    padding-left: 30px;
}
.sidebar-submenu {
    font-size: 0.9rem;
}


.sidebar-separator-title {
    background-color: #333;
    height: 35px;
}
.sidebar-separator {
    background-color: #333;
    height: 25px;
}
.logo-separator {
    background-color: #333;    
    height: 60px;
}


#sidebar-container .list-group .list-group-item[aria-expanded="false"] .submenu-icon::after {
  content: " \f0d7";
  font-family: 'Poppins', sans-serif;
  display: inline;
  text-align: right;
  padding-left: 10px;
}

#sidebar-container .list-group .list-group-item[aria-expanded="true"] .submenu-icon::after {
  content: " \f0da";
  font-family: 'Poppins', sans-serif;
  display: inline;
  text-align: right;
  padding-left: 10px;
}
#btn{
    font-family:'Poppins', sans-serif;
}

</style>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark m-0">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            <span class="menu-collapsed">DMT</span>
        </a>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">   
                <li class="nav-item dropdown d-sm-block d-md-none">
                    <a class="nav-link dropdown-toggle" href="#" id="smallerscreenmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="smallerscreenmenu">
                        <a class="dropdown-item" href="#">Dashboard</a>
                        <a class="dropdown-item" href="#">Profile</a>
                    </div>
                </li>
      
            </ul>
        </div>
        <div class="btn-group dropleft">
            <button type="button" class="btn btn-primary dropdown-toggle d-inline-flex align-items-center" data-toggle="dropdown" aria-expanded="false">
                <i class="material-icons">
                    person
                </i>
            </button>
            <ul class="dropdown-menu mr-2 p-2 bg-secondary" style="height:15rem">
                <li></li>
                <li class="text-center text-white" style="margin-top:60px"><?php echo e(Auth::user()->name); ?></li>
                <li class=" text-center text-white"><?php echo e(Auth::user()->email); ?></li>
                <li class="d-flex align-items-end justify-content-center">
                    <button type="button" class="btn btn-danger shadow" href="<?php echo e(route('logout')); ?>" onClick="event.preventDefault(); document.getElementById('logout-form').submit();"><?php echo e(__('Logout')); ?></button>
                </li>
            </ul>
        </div>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="post" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>

    </nav>
    <div class="row" id="body-row">
        <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
            <ul class="list-group">
                <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                    <small>MAIN MENU</small>
                </li>
                <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <span class="menu-collapsed d-flex justify-content-between align-items-center">
                        HRD
                        <i class="material-icons" style="font-size:20px">people_alt</i>
                    </span>
                </a>
                <div id='submenu1' class="collapse sidebar-submenu">
                    <a href="/department" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed d-flex justify-content-between">
                            Departement
                            <i class="material-icons" style="font-size:18px">domain</i>
                        </span>
                    </a>
                    <a href="/jabatan" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed d-flex justify-content-between align-items-center">
                            Jabatan
                            <i class="material-icons" style="font-size:18px">work</i>
                        </span>
                    </a>
                    <a href="/pegawai" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed d-flex justify-content-between align-items-center">
                            Pegawai
                            <i class="material-icons" style="font-size:18px">perm_contact_calendar</i>
                        </span>
                    </a>
                </div>
                <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between align-items-center">
                        <span class="menu-collapsed">Gudang</span>
                        <i class="material-icons" style="font-size:20px">store</i>
                    </div>
                </a>
                <div id='submenu2' class="collapse sidebar-submenu">
                    <a href="/barang" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed d-flex justify-content-between align-items-center">
                            Daftar Barang
                            <i class="material-icons" style="font-size:20px">weekend</i>
                        </span>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                        <span class="menu-collapsed">Password</span>
                    </a>
                </div>            
            </ul>
        </div> <!-- End Sidebar -->
    <!-- MAIN -->
        <div class="col-md p-0 m-0">
            <main class="py-4 p-0 m-0">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>
<?php /**PATH /pegawai_vue/laravel/resources/views/layouts/app.blade.php ENDPATH**/ ?>