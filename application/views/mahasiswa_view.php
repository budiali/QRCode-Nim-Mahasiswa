<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
</head>
<body>

	<div class="container">
		<br>
		<div> <h2>Data<small> Mahasiswa </small></h2> </div>
		<div> <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"> Add New </button> </div><br>
		<div class="row">
				
			<table class="table table-striped">
				<thead>
					<tr>
						<th> Nim </th>
						<th> Nama </th>
						<th> Prodi </th>
						<th> QR - Code </th>
						<th scope="col"> Action </th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($mahasiswa -> result() as $row ) : ?>
						<tr>
							<td style="vertical-align: middle;"> <?php echo $row -> nim; ?></td>
							<td style="vertical-align: middle;"> <?php echo $row -> nama; ?></td>
							<td style="vertical-align: middle;"> <?php echo $row -> prodi; ?></td>
							<td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$row->qr_code;?>"></td>
							<td width="200" style="vertical-align: middle;">
								<a href="<?php echo site_url('mahasiswa/get_edit/'.$row -> nim);?>" class="btn btn-sm btn-info"> Update </a>
								<a href="<?php echo site_url('mahasiswa/delete/'.$row -> nim);?>" class="btn btn-sm btn-danger"> Delete </a>

							</td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
 
    <!-- Modal add new mahasiswa-->
    <form action="<?php echo base_url().'mahasiswa/simpan'?>" method="post">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              	<h4 class="modal-title" id="myModalLabel">Add New Mahasiswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
              <div class="modal-body">
             
                  <div class="form-group">
                    <label for="nim" class="control-label">NIM:</label>
                    <input type="text" name="nim" class="form-control" id="nim">
                  </div>
                  <div class="form-group">
                    <label for="nama" class="control-label">NAMA:</label>
                    <input type="text" name="nama" class="form-control" id="nama">
                  </div>
                  <div class="form-group">
                    <label for="prodi" class="control-label">PRODI:</label>
                    <select name="prodi" class="form-control" id="prodi">
                        <option>Sistem Informasi</option>
                        <option>Sistem Komputer</option>
                        <option>Manajemen Informatika</option>
                    </select>
                  </div>
             
              </div>
              <div class="modal-footer">
                
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
        </div>
    </form>
 
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
</body>
</html>