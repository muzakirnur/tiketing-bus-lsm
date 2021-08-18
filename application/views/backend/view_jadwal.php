<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title ?></title>
    <style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
    <!-- css -->
    <?php $this->load->view('backend/include/base_css'); ?>
  </head>
  <body id="page-top">
    <!-- navbar -->
    <?php $this->load->view('backend/include/base_nav'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      <!-- Page Heading -->
      <!-- Basic Card Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Kode Jadwal [<?= $jadwal['kd_jadwal']; ?>]  </h6>
        </div>
        <div class="card-body">             
            <div class="card-body">
              <div class="row">
                <div class="col-sm-6">
                  <p>BUS     : <b> <?= $jadwal['kd_bus']." [".$jadwal['nama_bus'].'-'.$jadwal['plat_bus'] ?>]</b></p>
                  <p>Asal :  <b><?= strtoupper($asal['kota_tujuan'])." - ".$asal['terminal_tujuan']; ?></b></p>
                  <p>Tujuan  : <b><?= strtoupper($jadwal['kota_tujuan'])." - ".$jadwal['terminal_tujuan']; ?></b></p>
                  <p>Jam Berangkat    : <b><?= date('H:i',strtotime($jadwal['jam_berangkat_jadwal'])) ?></b></p>
                  <p>Jam Tiba : <b><?= date('H:i',strtotime($jadwal['jam_tiba_jadwal'])) ?></b></p>
                  <p>Harga Jadwal : <b>Rp <?= $jadwal['harga_jadwal']; ?></b></p>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
            <hr>
            <a class="btn btn-default" href="javascript:history.back()"> Kembali</a>
            <button data-toggle="modal" data-target="#edit" class="btn btn-primary pull-rigth">Edit</button>
          </div>
      </div>
    </div>
  </div>
  <!-- End of Main Content -->
  <!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

  <!-- Footer -->
  <?php $this->load->view('backend/include/base_footer'); ?>
  <!-- End of Footer -->
<!-- js -->
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
<?php $this->load->view('backend/include/base_js'); ?>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <form action="<?php echo base_url(). 'backend/jadwal/updatejadwal'; ?>" method="post">
              <div class="form-group">
              <label class="">Kode Jadwal</label>
                    <div class="form-label-group">
                      <input type="text" id="kd_jadwal" name="kd_jadwal" class="form-control" placeholder="Kode Jadwal" readonly="readonly" value="<?= $jadwal['kd_jadwal']; ?>" autofocus="autofocus">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="">Asal</label>
                    <select class="form-control" name="asal" required>
                      <option value="" selected disabled=""><?= strtoupper($asal['kota_tujuan']); ?></option>
                      <?php foreach ($tujuan as $row ) {?>
                      <option value="<?= $row['kd_tujuan'] ?>" ><?= strtoupper($row['kota_tujuan'])." - ".$row['terminal_tujuan']; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label class="">Tujuan</label>
                    <select class="form-control" name="tujuan" required>
                      <option value="" selected disabled=""><?= strtoupper($jadwal['kota_tujuan']); ?></option>
                      <?php foreach ($tujuan as $row ) {?>
                      <option value="<?= $tuja['kd_tujuan'] ?>" ><?= strtoupper($row['kota_tujuan']); ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label  class="">Bus</label>
                    <select class="form-control" name="bus">
                      <option value="" selected disabled=""><?= $jadwal['nama_bus'] ?></option>
                      <?php foreach ($bus as $row ) {?>
                      <option value="<?= $row['kd_bus'] ?>" ><?= strtoupper($row['nama_bus']); ?> -<?php if ($row['status_bus'] == '1') { ?>
                        Online
                        <?php } else { ?>
                        Offline
                      <?php } ?>- </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label  class="">Jam Berangkat</label>
                    <input type="text" class="form-control"  id="time" name="berangkat" required="" placeholder="Jam Berangkat" value="<?=$jadwal['jam_berangkat_jadwal'];?>">
                  </div>
                  <div class="form-group">
                    <label  class="">Jam Tiba</label>
                    <input type="text" class="form-control"  id="time2" name="tiba" required="" placeholder="Jam Tiba" value="<?=$jadwal['jam_tiba_jadwal'];?>">
                  </div>
                  <div class="form-group">
                    <label  class="">Harga Jadwal</label>
                    <input type="number" class="form-control" name="harga" required="" placeholder="Harga" value="<?=$jadwal['harga_jadwal'];?>">
                    <?= form_error('name'),'<small class="text-danger pl-3">','</small>'; ?>
                  </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input  type="submit" class="btn btn-primary pull-rigth" value="Update">
      </div>
      </form>
            </div>
          </div>
        </div>
        </div>
</body>
</html>