<?php
include '../inc/koneksi.php';
if (isset($_POST['csv'])) {
	header('Content-Type: text/csv; charset=utf-8');

	header('Content-Disposition: attachment; filename=DevelopersData.csv');
	
	$output = fopen("php://output", "w");
	fputcsv($output, array('id','Kegiatan','Tanggal_kegiatan','Tempat_kegiatan','Penyelenggara', 'Absensi','Berita_acara','LPJ'));
	$sql = "SELECT * FROM `cetak`";
	$qry = mysqli_query($koneksi, $sql);
	while($row= mysqli_fetch_assoc($qry))
	{
		fputcsv($output, $row);
	}
	fclose($output);
}
?>