<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <div class="container">  
    <?php 
    global $role;
    switch ($_SESSION['is_admin']) {
      case '1':
        $role = 'Admin';
        break;

      default:
        $role = 'Pengusul';
    }
     ?>
    <a class="navbar-brand" href="{{site_url('' .$role)}}">
      <img src="/TA/gambar/ugm.png" width="30" height="30" class="d-inline-block align-top" alt="">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
        class="glyphicon glyphicon-user"></span>{{$role}}<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>Profil</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-cog"></span>Settings</a></li>
            <li class="divider"></li>
            <li><a href="#"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
        </ul>
    </div>    
  </div>

</nav>