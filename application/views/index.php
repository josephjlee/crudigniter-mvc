<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'limitString.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CRUD - MVC</title>
    <?php include 'assetCss.php';?>
</head>

<style>
.carousel-control-prev,
.carousel-control-next
{
    height: 2em;
    width: 2em;
    background: none repeat scroll 0 0 #428bca;
    border-radius: 50%;
    margin-top: 6.4em;
}

.carousel-control-prev
{
    left: -1.3em;
    padding: 0 4px 0 0;
}

.carousel-control-next
{
    right: -1.3em;
    padding: 0 0 0 4px;
}

.carousel-indicators
{
    cursor: pointer;
}

.carousel-indicators li {
    background: #cecece;
    bottom: -3.7em;
    height: 0.8em;
    width: 0.8em;
    border-radius: 50%;
}

.carousel-indicators .active
{
    height: 1em;
    bottom: -3.6em;
    width: 1em;
    border-radius: 50%;
    background: #428bca !important;
}

article
{
    padding: 0.7em 0.7em 0.2em 0.7em;
    margin-bottom: 1em;
    border-radius: 3px;
    border: 1px solid #DDD;
}

article:hover
{
    background: #eee;
}

figure img
{
    width: 100%;
    height: 100%;
}
</style>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <?php include 'navigasi.php';?>

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon text-dark">
                                <i class="fa fa-fw fa-key"></i>
                            </div>
                            <div class="mr-5"><?php echo $jumlah['idauto']?> Data ID Auto</div>
                        </div>
                        <a class="card-footer clearfix small z-1" href="<?php echo base_url()?>index.php/idauto/tampil">
                            <span class="float-left">Lihat Tabel</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon text-dark">
                                <i class="fa fa-fw fa-image"></i>
                            </div>
                            <div class="mr-5"><?php echo $jumlah['gambar']?> Data Gambar</div>
                        </div>
                        <a class="card-footer clearfix small z-1" href="<?php echo base_url()?>index.php/pilihan/tampil">
                            <span class="float-left">Lihat Tabel</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon text-dark">
                                <i class="fa fa-fw fa-newspaper-o"></i>
                            </div>
                            <div class="mr-5"><?php echo $jumlah['jml_artikel']?> Data Artikel</div>
                        </div>
                        <a class="card-footer clearfix small z-1" href="<?php echo base_url()?>index.php/tanggal/tampil">
                            <span class="float-left">Lihat Tabel</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon text-dark">
                                <i class="fa fa-fw fa-file"></i>
                            </div>
                            <div class="mr-5"><?php echo $jumlah['file']?> Data File</div>
                        </div>
                        <a class="card-footer clearfix small z-1" href="<?php echo base_url()?>index.php/file/tampil">
                            <span class="float-left">Lihat Tabel</span>
                            <span class="float-right">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <?php
            if(is_array($jumlah['artikel']) || is_object($jumlah['artikel']))
            {
                foreach($jumlah['artikel'] as $art)
                {
                    $tag = explode(',',$art['tag']);
                    $isi = batas($art['isi'], 50);
                    ?>
            <article>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <figure>
                            <img src="<?php echo base_url()?>data/artikel/<?php echo $art['gambar']?>">
                        </figure>
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                            <a href="<?php echo base_url()?>index.php/artikel/detail/id/<?php echo $art['id']?>">
                                <?php echo ucwords($art['judul'])?>
                            </a>
                        </h4>
                        <section>
                            <i class="fa fa-fw fa-calendar"></i>
                            <?php echo $art['tgl_post']?>
                        </section>
                        <p>
                            <?php echo str_replace('\n', ' ',$isi)?>
                        </p>
                    </div>
                </div>
            </article>
                <?php
                }
            }
            include 'footer.php'; ?>

            <button class="btn btn-block btn-sm btn-primary mb-4" onclick="window.location='<?php echo base_url()?>index.php/artikel/tampil';">lihat artikel lainnya</button>

            <a class="scroll-to-top rounded" href="#page-top">
              <i class="fa fa-angle-up"></i>
            </a>
        </div>
    </div>

    <?php include 'assetJs.php';?>
    <?php include 'dataNav.php';?>
    <?php include 'popup.php'; ?>
</body>
</html>
