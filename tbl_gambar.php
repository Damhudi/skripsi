<?php

include 'dbconnect.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Galeri</title>

	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
	<link href="datatables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">

<!-- jQuery -->



</head>
<body>

		<table id="table_id" class="display table table-striped table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Gambar</th>
					<th>Nama</th>
					<th>Ukuran</th>
					<th>Tipe</th>
					<th>Folder</th>
					<th>Waktu</th>
				</tr>
			</thead>
			<tbody>
				<?php

				$result = mysql_query("SELECT * FROM gambar ORDER BY waktu DESC");

				$no = 1;
				while ($row = mysql_fetch_array($result)) { ?>
					
				
					<tr>
						<td><?php echo $no++; ?></td>
						<td><img src="<?php echo $row['tipe']; ?>" width="50px" height="50px"></td>
						<td><?php echo $row['nama']; ?></td>
						<td><?php echo $row['ukuran']; ?></td>
						<td><?php echo $row['tipe']; ?></td>
						<td><?php echo $row['folder']; ?></td>
						<td><?php echo $row['waktu']; ?></td>
					</tr>

				<?php } ?>
			</tbody>
		</table>

<!-- Bootstrap Core JavaScript -->
<script src="js/jquery.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="datatables/media/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready( function () {
   	 $('#table_id').DataTable();
} );
</script>

</body>
</html>