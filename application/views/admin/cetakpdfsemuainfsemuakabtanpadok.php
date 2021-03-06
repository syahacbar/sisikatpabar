<?php
$pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetTitle('DATA LAPORAN PENGADUAN SISIKAT '.$range);
$pdf->SetHeaderMargin(20);
$pdf->SetTopMargin(10);
$pdf->setFooterMargin(15);
$pdf->SetAutoPageBreak(true,20);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');
$pdf->setPrintHeader(false);
//$pdf->setPrintFooter(false);
$pdf->SetMargins(5, 10, 5, true);

$pdf->AddPage('L','A4');
$html = '
<style>
	table{
		font-size:8;
		margin-left: auto;
		margin-right: auto;
	}
	tr.center{
		text-align:center;
		background-color:#C0C0C0;
		font-weight: bold;
	}
	div.heading{
		text-align:center;
		font-weight:bold;
		font-size:10;
	}
</style>
<div class="heading">DATA PELAPORAN SISIKAT<br>'.$range.'</div><br>
<table width="100%" border="1" cellpadding="5">
	<tr class="center">
		<th width="30">No.</th>
		<th width="60">Tanggal <br>Pengaduan</th>
		<th width="60">Jenis <br>Infrastruktur</th>
		<th width="150">Isi Laporan/<br>Pengaduan</th>
		<th width="70">Nama/<br>Ruas Jalan</th>
		<th width="60">Kec./Distrik</th>
		<th width="60">Kab./Kota</th>
		<th width="70">Titik Lokasi<br>(Koordinat)</th>
		<th width="70">Nama Pelapor/<br>NIK</th>
		<th width="70">No. HP/<br>Email</th>
		<th width="120">Alamat Lengkap<br>(Sesuai KTP)</th>
	</tr>';
$no = 1;
foreach ($laporan AS $lap)
{
	
$html .='
<tr>
	<td align="center">'.$no++.'</td>
	<td>'.shortdate_indo($lap['tgllaporan']).'</td>
	<td>'.$lap['infrastruktur'].'</td>
	<td>'.$lap['pengaduan'].'</td>
	<td>'.$lap['lokasi_namajalan'].'</td>
	<td>'.$lap['lokasidistrik'].'</td>
	<td>'.$lap['lokasikabkota'].'</td>
	<td>'.$lap['latitude'].', '.$lap['longitude'].'</td>
	<td>'.$lap['nama_pelapor'].'<br>'.$lap['nik'].'</td>
	<td>'.$lap['no_hp'].'<br>'.$lap['email'].'</td>
	<td>'.$lap['alamat_pelapor'].'</td>
</tr>';
}
$html .='</table>';
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('DATA LAPORAN PENGADUAN SISIKAT '.$range.'.pdf', 'I');

?>