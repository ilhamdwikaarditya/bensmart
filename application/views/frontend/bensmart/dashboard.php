<!-- HEADER
    ================================================== -->
    <header class="bg-dark pt-9 pb-11 d-none d-md-block">
      <div class="container-md">
        <div class="row align-items-center">
          <div class="col">

            <!-- Heading -->
            <h1 class="font-weight-bold text-white mb-2">
              Dashboard Member
            </h1>

          </div>
          <div class="col-auto">

            <!-- Button -->
            <a class="btn btn-sm btn-gray-300-20" href="<?php echo site_url('login/logout'); ?>">
              Log Out
            </a>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </header>

    <!-- MAIN
    ================================================== -->
    <main class="pb-8 pb-md-11 mt-md-n9">
      <div class="container-md">
        <div class="row">
          <?php include 'menu_backend.php'; ?>
          <div class="col-12 col-md-9">

            <!-- Card -->
		  <div class="card card-bleed shadow-light-lg mb-6">
			<div class="card-header">

			  <!-- Heading -->
			  <h4 class="mb-0">
				Dashboard member
			  </h4>

			</div>
			<div class="card-body">

			  <!-- List group -->
			  <div class="list-group list-group-flush">

				<div class="list-group-item">

				  <!-- Heading -->
				  <h5 class="mb-0">
					Minat Belajar
				  </h5>


				  <!-- Text -->
				  <p class="small text-muted">
					Berdasarkan kelas yang kamu ikuti saat ini
				  </p>
				  <div class="d-flex">
<?php 
$this->db->select("f.nm_mapel, count(e.id_class_materi_detail) totselesai, count(d.id_class_materi_detail) totkelas, ((count( e.id_class_materi_detail ) / count( d.id_class_materi_detail )) * 100) persentase ");
$this->db->from("tr_class a"); 
$this->db->join("tr_class_member b", "a.id_class = b.id_class","LEFT");
$this->db->join("tr_class_materi_section c","a.id_class = c.id_class","LEFT");
$this->db->join("tr_class_materi_detail d","c.id_class_materi_section = d.id_class_materi_section","LEFT");
$this->db->join("tr_class_materi_member e","d.id_class_materi_detail = e.id_class_materi_detail","LEFT");
$this->db->join("ref_mapel f","a.id_mapel = f.id_mapel","LEFT");
$this->db->where("b.cuser", $id_user);
$this->db->group_by("f.id_mapel");
$this->db->order_by("persentase DESC");
$this->db->limit("5");
$mapel_datas = $this->db->get()->result_array();
foreach ($mapel_datas as $mapel_data){
?>
	<div class="col-sm-2 col-md-3 col-6">
	  <div class="circle-progress-block">
		<div id="circleProgress1" class="progressbar-js-circle p-3"><svg viewBox="0 0 100 100" style="display: block; width: 100%;">
				<path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="#eee" stroke-width="4" fill-opacity="0"></path>
				<path d="M 50,50 m 0,-48 a 48,48 0 1 1 0,96 a 48,48 0 1 1 0,-96" stroke="rgb(159,162,179)" stroke-width="4" fill-opacity="0" style="stroke-dasharray: <?php echo number_format($mapel_data['persentase']*3); ?>, 300; stroke-dashoffset: 0;"></path>
			</svg>
			<div class="progressbar-text" style="position: absolute; left: 50%; top: 42%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: #000000; font-size: 1rem;">
			  <span class="h4"><?php echo number_format($mapel_data['persentase']); ?>%</span></div>
		</div>
	  </div>
	  <h5 class="text-center"><?php echo $mapel_data['nm_mapel']; ?></h5>
	</div>
<?php
}
?>
				  </div>
				</div>
				<div class="list-group-item">
				  <!-- Heading -->
				  <h5 class="mb-0">
					Progress Belajar
				  </h5>
				  <!-- Text -->
				  <p class="small text-muted">
					Selesaikan semua materi dengan baik
				  </p>
<?php 
$this->db->select("a.id_class, a.nm_class, count(e.id_class_materi_detail) totselesai, count(d.id_class_materi_detail) totkelas ");
$this->db->from("tr_class a"); 
$this->db->join("tr_class_member b", "a.id_class = b.id_class","LEFT");
$this->db->join("tr_class_materi_section c","a.id_class = c.id_class","LEFT");
$this->db->join("tr_class_materi_detail d","c.id_class_materi_section = d.id_class_materi_section","LEFT");
$this->db->join("tr_class_materi_member e","d.id_class_materi_detail = e.id_class_materi_detail","LEFT");
$this->db->where("b.cuser", $id_user);
$this->db->group_by("b.id_class");
$class_datas = $this->db->get()->result_array();
foreach ($class_datas as $class_data){
	$idclass = $class_data['id_class'];
	$nmclass = $class_data['nm_class'];
	$totsele = $class_data['totselesai'];
	$totkelas = $class_data['totkelas'];
?>		
	  <div class="class-list mx-2">
		<h6 style="font-size: 16px;">
		  <?php echo $nmclass; ?>
		</h6>
		<div class="progress">
			<?php if($totkelas == '0'){ ?>
			<div class="progress-bar bg-dark" style="width:0%">
				0%
			</div>
			<?php } else { ?>
			<div class="progress-bar bg-dark" style="width:<?php echo ($totsele / $totkelas)*100; ?>%">
			<?php echo number_format(($totsele / $totkelas)*100,2); ?>%
			</div>
			<?php }?>
		</div>
		<p class="small text-muted mt-1">
		  <span class="">(<?php echo $totsele; ?> dari <?php echo $totkelas; ?> materi telah selesai)</span>
		</p>
	  </div>	
<?php
}
?>
				  

				  

				</div>
			  </div>
			</div>
		  </div>


          </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </main>