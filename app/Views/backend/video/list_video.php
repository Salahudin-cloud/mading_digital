<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Video</title>

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
                                <li class="breadcrumb-item"><a href="<?php echo site_url('list_video') ?>">List Video</a></li>
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
                            <i class="far fa-list-alt"></i> List Video
                        </div>
                        <div class="card-body">
                            <!-- Show list of category -->
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 1%;">NO</th>
                                        <th style="width: 10%;">Nama Video</th>
                                        <th style="width: 50%;">Status</th>
                                        <th>Video</th>
                                        <th style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                    $i = 1 + (5 * ($page - 1)) ?>
                                    <?php foreach ($videos as $data) : ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $data['nama_video'] ?></td>
                                            <td>
                                                <?php if ($data['status_video'] === 'publish') : ?>
                                                    <span class="badge badge-success">Publish</span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger">Draft</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <video width="100%" controls>
                                                    <source src="<?php echo base_url() . 'assets/video/' . $data['file_video'] ?>" type="video/mp4">
                                                    Your browser does not support HTML video.
                                                </video>
                                            </td>
                                            <td>
                                                <div class="btn-group " role="group" aria-label="Action buttons">
                                                    <a href="<?php echo site_url('update_video/' . $data['id_video']) ?>" class="btn btn-sm btn-warning mr-1">
                                                        <i class="nav-icon fas fa-edit"></i>
                                                    </a>

                                                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah anda yakin menghapus video ini ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button id="confirmDeleteButton" type="button" class="btn btn-danger">Ya</button>
                                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Delete Form -->
                                                    <form id="deleteForm" action="<?php echo site_url('delete/video/process/' . $data['id_video']) ?>" method="POST">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="button" class="btn btn-sm btn-danger mr-1" data-toggle="modal" data-target="#deleteModal">
                                                            <i class="nav-icon fas fa-trash"></i>
                                                        </button>
                                                    </form>


                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="pt-2">
                                <?php echo $pager->links('default', 'my_paginate') ?>
                            </div>
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


        // delete button 

        document.getElementById('confirmDeleteButton').addEventListener('click', function() {
            document.getElementById('deleteForm').submit();
        });
    </script>

</body>

</html>