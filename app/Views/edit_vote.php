<title>Edit Vote</title>
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
    <form novalidate action="<?= base_url('Vote/aksi_edit/' . $a['id'])?>" method="post" enctype="multipart/form-data">
<div class="col-md-6 col-12">
                <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Edit Vote</h4>
                    <a href="<?= site_url('Vote') ?>" class="btn btn-light-secondary me-1 mb-1">Back</a>
                </div>
                    
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="row">
                                    <div class="col-md-4">
                                            <label>Periode</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" placeholder="Periode" name="periode" value="<?= $a['periode'] ?>"
                                                        id="first-name-icon">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-flag"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Periode Mulai</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input
                                                        type="datetime-local"
                                                        class="form-control mb-3 flatpickr-no-config"
                                                        placeholder="Pilih Tanggal & Jam" 
                                                        name="p_mulai" 
                                                        value="<?= $a['p_mulai'] ?>"
                                                    />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-clock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Periode Selesai</label>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                <input
                                                type="datetime-local"
                                                    class="form-control mb-3 flatpickr-no-config"
                                                    placeholder="Pilih Tanggal & Jam" name="p_selesai" value="<?= $a['p_selesai'] ?>"
                                                    />
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-clock   "></i>
                                                    </div>
                                                </div>
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
    
 

