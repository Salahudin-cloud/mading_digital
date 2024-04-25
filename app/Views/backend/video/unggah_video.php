<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unggah Video</title>

    <!-- import css -->
    <?php include(APPPATH . 'Views/imports/css.php') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- import preloader -->
        <?php include(APPPATH . 'Views/templates/backend/preloader.php') ?>


        <!-- importt navbar -->
        <?php include(APPPATH . 'Views/templates/backend/navbar.php') ?>


        <!-- importt sidebar -->
        <?php include(APPPATH . 'Views/templates/backend/sidebar.php') ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Video</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Video</li>
                                <li class="breadcrumb-item"><a href="<?php echo site_url('/upload_video') ?>">List Video</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-upload"></i> Unggah Video
                        </div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama_video">Nama video </label>
                                    <input type="text" class="form-control" id="nama_video" name="nama_video" placeholder="Masukan Nama Video">
                                </div>
                                <div class="form-group">
                                    <label for="file_video">File Video</label>
                                    <input type="file" class="form-control-file" id="file_video" name="file_video">
                                </div>
                                <div class="d-flex justify-content-end flex-column">
                                    <button class="btn btn-primary mb-2" type="submit" name="video_status" value="draft">
                                        Draft
                                    </button>
                                    <button class="btn btn-success" type="submit" name="video_status" value="publikasi">
                                        Publish
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->


        <!-- importt footer -->
        <?php include(APPPATH . 'Views/templates/backend/footer.php') ?>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    <!-- import js  -->
    <?php include(APPPATH . 'Views/imports/js.php') ?>

    <script>
        // auto change date by year for footer
        const thisYear = new Date();
        document.getElementById('tanggal').innerHTML = thisYear.getFullYear();
    </script>
</body>

</html>