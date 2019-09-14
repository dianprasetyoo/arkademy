<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>

    <div class="container" style="margin-top: 80px">
        <div class="col-md-12">
            <?php echo form_open('csalary/save') ?>

              <div class="form-group">
                <label for="text">ID</label>
                <input type="text" name="id" class="form-control" placeholder="Masukkan id" value="<?php echo $kd; ?>" readonly required>
              </div>

              <div class="form-group">
                <label for="text">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan name">
              </div>

              <div class="form-group">
                <label for="text">Work</label>
                  <select name="work" class="form-control select">
                    <option selected disabled>-- Pilih --</option>
                    <?php
          						$query = $this->db->query("select * from (work) order by id asc");
          						foreach ($query->result() as $row){
          							echo '<option value="'.$row->id.'">'.$row->name.'</option>';
          						}
          					?>
                </select>
              </div>

              <div class="form-group">
                <label for="text">Salary</label>
                  <select name="salary" class="form-control select">
                    <option selected disabled>-- Pilih --</option>
                    <?php
          						$query = $this->db->query("select * from (category) order by id asc");
          						foreach ($query->result() as $row){
          							echo '<option value="'.$row->id.'">'.$row->salary.'</option>';
          						}
          					?>
                </select>
              </div>

              <button type="submit" class="btn btn-md btn-success">Simpan</button>
              <button type="reset" class="btn btn-md btn-warning">reset</button>
            <?php echo form_close() ?>
        </div>
    </div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>
