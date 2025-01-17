<title>Edit User</title>
<div id="main">
	<header class="mb-3">
		<a href="#" class="burger-btn d-block d-xl-none">
			<i class="bi bi-justify fs-3"></i>
		</a>
	</header>

	<div class="page-heading">
		<div class="page-title">
			<div class="row">
			
				<div class="col-12 col-md-6 order-md-2 order-first">
					<nav
					aria-label="breadcrumb"
					class="breadcrumb-header float-start float-lg-end"
					>
				</nav>
			</div>
		</div>
	</div>
<?php if (isset($validation)): ?>
            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
          <?php endif; ?>
          <form novalidate action="<?= base_url('User/update/' . $a['id_user'])?>" method="post" enctype="multipart/form-data">
          <div class="col-md-6 col-12">
                <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Edit User</h4>
                    <a href="<?= site_url('user') ?>" class="btn btn-light-secondary me-1 mb-1">Back</a>
                </div>
                  <div class="card-content">
                    <div class="card-body">
                      <form class="form form-horizontal">
                        <div class="form-body">
                          <div class="row">
                                    <?php if (!empty($a['foto'])): ?>
                                        <div class="mt-3">
                                            <label>Foto Lama</label>
                                            <br>
                                            <img src="<?= base_url('images/' . $a['foto']) ?>" alt="<?= $a['username'] ?>" class="img-fluid rounded" width="100">
                                         </div>
                                         <?php endif; ?>
                                         <br>
                                         <div class="col-md-4">
                                            
                                            <label>Foto Baru</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="position-relative">
                                                    <input type="file" class="form-control" placeholder="Foto" name="foto" id="foto" onchange="previewImage()">
                                                    <img id="preview" src="" alt="" style="max-width: 100px; margin-top: 10px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nama</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Nama" name="nama" value="<?= $a['nama'] ?>"
                                                        id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Username</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Username" name="username" value="<?= $a['username'] ?>"
                                                        id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Level</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                <fieldset class="form-group">
                                                <select class="form-select" id="basicSelect" name="level">
                                                <option>-PILIH-</option>
                                                    <?php foreach ($b as $c) { ?>
                                                        <option value ="<?= $c->id_level?>" <?php if ($a['level'] == $c->id_level) echo 'selected' ?>>
                                                        <?php echo $c->nama_level?>
                                                    </option>
                                                    <?php } ?>
                                                </select>
                                    </fieldset>
                                        </div>
                                        </div>
                                       
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> 
    </section>
    <script>
function previewImage() {
  var preview = document.querySelector('#preview');
  var file = document.querySelector('#foto').files[0];
  var reader = new FileReader();

  reader.addEventListener("load", function () {
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
  }
}
</script>
    