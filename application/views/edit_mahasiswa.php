<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
</head>
<body>

	<div class="container">
		<h1><center> Update Mahasiswa </center></h1>
		<div class="col-md-6 offset-md-3">
			<form action="<?php echo site_url('mahasiswa/update');?>" method="post">
				<div class="form-group">
					<label> Nama Mahasiswa </label>
					<input type="text" name="nama" value="<?php echo $nama; ?>" class="form-control" placeholder="Edit Nama Mahasiswa">
				</div>
				<input type="hidden" name="nim" value="<?php echo $nim; ?>">
				<button class="btn btn-primary"> Update </button>
		</div>

	</div>

	<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

</body>
</html>