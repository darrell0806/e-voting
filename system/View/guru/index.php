<!DOCTYPE html>
<html>
<head>
    <title>Dropdown Nama Guru</title>
</head>
<body>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="card-title mb-4">List Nama Guru</h1>
                        <div class="form-group">
                            <label for="nama_guru">Nama Guru:</label>
                            <select class="form-control" name="nama_guru" id="nama_guru">
                                <?php foreach ($guru as $item): ?>
                                    <option value="<?php echo $item['id']; ?>"><?php echo $item['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>