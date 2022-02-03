<?php
  include "SessionKemahasiswaan.php";
if (isset($_POST['csv'])) {
	header('Content-Type: text/csv; charset=utf-8');

	header('Content-Disposition: attachment; filename=DevelopersData.csv');
	
	$output = fopen("php://output", "w");
	fputcsv($output, array('Nama Kegiatan','Tanggal Kegiatan','Tempat Kegiatan','Penyelenggara', 'Absensi','Berita kegiatan','LPJ'));
	$sql = "SELECT * FROM `applpj` inner join pengajuan_lpj on   applpj.idlpj = pengajuan_lpj.id  inner JOIN pengajuan_kegiatan_mhs  on pengajuan_lpj.id_pengajuan = pengajuan_kegiatan_mhs.id inner join approval_kegiatan on approval_kegiatan.id_pengajuan = pengajuan_kegiatan_mhs.id WHERE applpj.approve = 1";
	$qry = mysqli_query($koneksi, $sql);
	while($data= mysqli_fetch_array($qry))
	{
		
		fputcsv($output, $data);
	}
	fclose($output);
}
?>