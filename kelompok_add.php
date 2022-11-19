<?php include('header.php'); ?>
<?php include('sidemenu.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Kelompok</h1>
    <p class="mb-4"></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="POST" action="pro_add_kelompok.php">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <td>Nama Kelompok</td>
                        <td> : </td>
                        <td><input type="text" name="nama_kelompok" class="form-control" required></td>
                    </table>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="kelompok.php" class="btn btn-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('footer.php'); ?>