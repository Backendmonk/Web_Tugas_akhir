<?php
include '../inc/koneksi.php';
if (isset($_POST['csv'])) {
	header('Content-Type: text/csv; charset=utf-8');

	header('Content-Disposition: attachment; filename=DevelopersData.csv');
	
	$output = fopen("php://output", "w");
	fputcsv($output, array('No','Kegiatan','Tanggal_Kegiatan','Tempat_kegiatan','Penyelenggara', 'Absensi','Berita_acara','LPJ'));
	$qp = mysqli_query($koneksi,"SELECT * FROM pengajuan_kegiatan WHERE STATUS ='Approve'");
	$no=0;
        while($dp = mysqli_fetch_array($qp)){
            $idp = $dp['ID_PENGAJUAN'];
            $qpro = mysqli_query($koneksi,"SELECT * FROM proposal WHERE ID_LPJ IS NOT NULL AND ID_PENGAJUAN ='$idp' ");
            $dpro = mysqli_fetch_row($qpro);
if (isset($dpro)) {
    $idpro = $dpro[5];
    $qlpj = mysqli_query($koneksi,"SELECT * FROM approval_lpj WHERE ID_BK IS NOT NULL AND ID_APPROVALLPJ ='$idpro' ");
    $dlpj =  mysqli_fetch_row($qlpj);
    if (isset($dlpj)) {
        $idbk = $dlpj[7];
        $qbk =  mysqli_query($koneksi,"SELECT * FROM bukti_kegiatan WHERE ABSENSI_BK IS NOT NULL AND ID_BUKTIKEGIATAN ='$idbk'");
        $dbk = mysqli_fetch_row($qbk);
		if (isset($dbk[3])) {
			$AB = "ada";
		} else {
			$AB = "tidak";
		}
		if ($dlpj[4]=="Approve") {
			$lpj = "ada";
		} else {
			$lpj = "tidak";
		}
		$no++;
		$AL = [];
		array_push($AL,"$no","$dp[NAMA_KEGIATAN]","$dp[TGL_KEGIATAN]","$dp[TEMPAT_KEGIATAN]","$dp[NAMA_ORMAWA_FK]","$AB","$AB","$lpj");
		fputcsv($output, $AL);
    }
	}
		}

	fclose($output);
}
?>