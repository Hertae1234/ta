<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <div class="container">  
    <a class="navbar-brand" href="{{site_url()}}">
      <img src="/TA/gambar/ugm.png" width="30" height="30" class="d-inline-block align-top" alt="">
    </a>

    <?php 
      $nama;
      if($_SESSION['is_admin'] == '1') {
        $nama = 'Admin';
      }
      else {
        $nama = isset($_SESSION['fullname'])? $_SESSION['fullname']: $_SESSION['username'];  
      }

    ?>
    <div class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
        class="glyphicon glyphicon-user"></span>{{$nama}}<b class="caret"></b></a>
        <ul class="dropdown-menu"><!-- 
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>Profil</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-cog"></span>Settings</a></li> -->
            <li class="divider"></li>
            <li><a href="{{site_url('login/logout')}}" class="btn"><span  class="glyphicon glyphicon-off"></span>Logout</a></li>
        </ul>
    </div>    
  </div>

</nav>