<!doctype html>
<html>
<head>
    @include('layouts.head')
</head>
<body>
	@include('layouts.header')
    @section('sidebar')
	<div class="container mt-4">
	  <div class="row">
	    <!-- side bar -->
	    <div class="col-3">

	      <?php if ($_SESSION['is_admin'] == 0): ?>
	      <div class="card">
	        <div class="card-header">
	          Menu Pengusul
	        </div>
	        <div class="list-group list-group-flush">
	          <a href="<?=site_url('pengajuan/baru')?>" class="list-group-item">Membuat Baru</a>
	          <a href="<?=site_url('pengajuan/status')?>" class="list-group-item">Daftar Pengajuan</a>
	        </div>
	      </div>
	      <?php endif; ?>

	      <div><span></span></div>
	      <?php if ($_SESSION['is_admin']): ?>
		      <div class="card">
		        <div class="card-header">
		          Menu Admin
		        </div>
		        <div class="list-group list-group-flush">
		          <a href="<?=site_url('admin?' . http_build_query(array_merge($params, ['status'=>'diajukan'])))?>" class="list-group-item">Belum Diproses</a>
		        </div>
		        <div class="list-group list-group-flush">
		          <a href="<?=site_url('admin?'. http_build_query(array_merge($params, ['status'=>'diproses'])))?>" class="list-group-item">Sedang Diproses</a>
		        </div>
		        <div class="list-group list-group-flush">
		          <a href="<?=site_url('admin?'. http_build_query(array_merge($params, ['status'=>'selesai'])))?>" class="list-group-item">Selesai</a>
		        </div>
		        <div class="list-group list-group-flush">
		          <a href="<?=site_url('admin?'. http_build_query(array_merge($params, ['status'=>'ditolak'])))?>" class="list-group-item">Ditolak</a>
		        </div>
		        <div class="list-group list-group-flush">
		          	<nav class="navbar navbar-light bg-light">
		          	  <form>
					    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Kata kunci pencarian" aria-label="Search" value="{{isset($params['search']) ? $params['search'] : '' }}">
					    @if (!empty($params))
					    	@if (!empty($params['sort']))
					    		<input type="hidden" name="sort" value="{{$params['sort']}}">
					    	@endif
					    	@if (!empty($params['status']))
					    		<input type="hidden" name="status" value="{{$params['status']}}">
					    	@endif
					    @endif
					    <button class="btn btn btn-outline-primary my-2 my-sm-0" type="submit">Cari</button>
					  </form>
					</nav>
		        </div>
		      </div>
	      <?php endif ?>	
	      	
	    </div>

	    <!-- content -->
	    <div class="col-9">
            @yield('content')	      
	    </div>
	  </div>
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3	/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        $("#btn-anggota").click(function(){
            var $markup = $('.anggota-wrap:first-child').clone();
            $markup.find(':selected').removeAttr('selected');
            $(".anggota-container").append($markup);
        });
        $("#btn-anggota2").click(function(){
            var $markup = $('.anggota-wrap2:first-child').clone();
            $markup.children().val('');
            console.log($markup.children());
            console.log ($markup);
            $(".anggota-container2").append($markup);
        });
        $('[data-toggle="popover"]').popover({
        	 trigger: 'hover'
        });
        
    }); 
</script>

</body>
</html>