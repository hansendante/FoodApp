<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
<?php if (session()->getFlashdata('pesan')) :  ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <?php echo form_open('dashboard/update') ?>

  <!-- Main content -->
  <div class="invoice p-3 mb-3">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h4>
          <i class="fas fa-globe"></i> View Cart

        </h4>
      </div>
      <!-- /.col -->
    </div>


    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th width="6%">Qty</th>
              <th>Nama Makanan</th>
              <th>Harga</th>
              <th>Deskripsi</th>
              <th>Subtotal</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i = 1;
            foreach ($cart->contents() as $key => $value) { ?>
              <tr>
                <td><input type="number" min="1" name="qty<?= $i++ ?>" class="form-control"
                value="<?= $value['qty'] ?>"></td>
                <td><?= $value['name'] ?></td>
                <td><?= number_to_currency($value['price'], 'IDR') ?></td>
                <td><?= $value['options']['deskripsi'] ?></td>
                <td><?= number_to_currency($value['subtotal'], 'IDR') ?></td>
                <td>
                  <a href="<?= base_url('dashboard/delete/' . $value['rowid']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash  "></i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="col-6">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Total :</th>
              <td><?= number_to_currency($cart->total(), 'IDR') ?></td>
            </tr>
            <tr>
              <th>Reservasi Tempat : </th>
              <td><a href="" class="btn btn-sm btn-primary">Yes</i></a> <a href="" class="btn btn-sm btn-success">No</i></a></td>
            </tr>
          </table>
        </div>
      </div>
    </div>


    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-12">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
        <a href="<?= base_url('dashboard/clear')?>" class="btn btn-warning"><i class="fas fa-trash"></i> Clear Keranjang</a>
        <a href="<?= base_url('dashboard/order') ?>"  class="btn btn-primary float-right"><i class="far fa-credit-card"></i> Order
            </a>

      </div>
    </div>
  </div>
  <?php echo form_close(); ?>
  <!-- /.invoice -->
</div>
<?= $this->endSection();; ?>