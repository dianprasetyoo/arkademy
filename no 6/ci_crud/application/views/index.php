<script language="JavaScript">
function konfirmasi() {
tanya= confirm('anda yakin akan menghapus data ?');
if (tanya == true)
  return true;
else
  return false;
}

</script>
<html>
<head>
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/dataTables.bootstrap4.min.css">
</head>
<body>

    <div class="container" style="margin-top: 80px">
        <?php echo $this->session->flashdata('pesan') ?>
        <a href="<?php echo base_url() ?>index.php/csalary/tambah_salary/" class="btn btn-md btn-success">ADD</a>
        <hr>
        <!-- table -->
        <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Work</th>
                    <th>Salary</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
      							$no = $offset;
      							foreach($daftar as $row) :
      						?>

                  <tr>
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->workname; ?></td>
                      <td><?php echo $row->salary; ?></td>
                      <td>
                        <a href="<?php echo base_url() ?>index.php/csalary/edit_salary/<?php echo $row->idname;?>" class="btn btn-sm btn-success">Edit</a>
                        <a onclick="return konfirmasi()" href="<?php echo base_url() ?>index.php/csalary/hapus_salary/<?php echo $row->idname;?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                  </tr>
                          <?php
  						endforeach;
  						?>
                </tbody>
              </table>
        </div>

    </div>

<script type="text/javascript" src="<?php echo base_url(); ?>/assets/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/font-awesome.min.css"></script>
<script>
    $('#table').DataTable( {
    autoFill: true
} );
</script>
</body>
</html
