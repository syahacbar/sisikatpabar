<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Laman Tidak Ditemukan</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
	body {
		background: #f5f5f5;
	}

	.page-wrap {
		min-height: 100vh;
	}

	.col-md-12.text-center img {
		width: 60%;
		height: auto;
		margin-bottom: 4rem;
	}

	a.btn.btn-link {
		border-radius: 30px;
		background-color: #4e2eeb;
		color: #fff;
		padding: 10px 20px;
	}

	.mb-4.lead {
		font-weight: bold;
		font-size: 20px;
	}
	
	a:hover {
		text-decoration: none;
	}

	.btn:not(:disabled):not(.disabled) {
		cursor: pointer;
		text-decoration: none;
	}

</style>
</head>
<body>
<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <img src="<?php echo base_url('resources/admintheme/assets/img/error_page_sisikat.png');?>" alt="error-image">
                <div class="mb-4 lead">Maaf, laman yang Anda cari tidak tersedia.</div>
                <a href="<?php echo base_url(); ?>" class="btn btn-link">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>