<div class="container-fluid">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <div class="row text-center mt-3">

        <?php foreach ($makanan as $m => $value) : ?>
            <?php echo form_open('dashboard/add');
            echo form_hidden('id', $value['id']);
            echo form_hidden('price', $value['harga']);
            echo form_hidden('name', $value['nama']);
            //option
            echo form_hidden('rating', $value['rating']);
            echo form_hidden('deskripsi', $value['deskripsi']);
            echo form_hidden('gambar', $value['gambarmakanan']);
            ?>

            <div class="card ml-3 mb-3" style="width: 16rem;">
                <img src="/img/<?php echo $value['gambarmakanan'] ?>" class="card-img-top" alt="" height="200px">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $value['nama'] ?></h5>
                    <small class="card-text"><?php echo $value['deskripsi'] ?></small>
                    <br>
                    <span class="badge badge-pill badge-success mb-3">Rp. <?php echo $value['harga'] ?></span>
                    <br>
                    <a href="#" class="btn btn-sm btn-success">Detail</a>
                    <?php if($value['quantity'] > 0 ){
                        echo '<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-shopping-basket"></i> Tambah</button>';
                    }else{
                        echo '<button type="submit" disabled class="btn btn-secondary btn-sm"><i class="fa fa-shopping-basket"></i> Habis Terjual</button>';
                    } ?>
                    
                </div>
            </div>
            <?php echo form_close(); ?>
        <?php endforeach ?>
    </div>
</div>