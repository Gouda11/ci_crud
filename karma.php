<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>CRUD Opertaion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style>
.pull_center{
    margin-left: 500px;
}
.label-center{
    margin-left:50px;
    color:#33B5E5;
}
.label-address{
    margin-left:30px;
    color:#33B5E5;
}
textarea{
    height:150px;
    width:250px;
}

</style>


</head>
<body>

<nav class="navbar navbar-dark bg-dark">
<a class="navbar-brand pull_center" ><?php echo $title;?></a>
</nav>  



<div class="container col-md-4">


<form action="<?php echo site_url('karma/add')?>" method="post" class='was_validated'>
  <?php 
 if($this->uri->segment(2)=="inserted"){
  echo '<p class="btn btn-primary">Data Inserted</p>';

}
?>

<?php 

if (isset($user_data)) {
  # code...
  foreach ($user_data->result() as $row) {
    # code...
    ?>
  
    <div class="form-group">
    <label for="add_name" class="label-center">Name:</label>
    <input type="text" name="add_name" class="form-control" value="<?php echo $row->name ;?>" id="add_name">
    <span class="text-danger"><?php echo form_error('add_name');?></span>
   </div>
 
   <div class="form-group">
    <label for="add_email" class="label-center">Email address:</label>
    <input type="email" name="add_email" class="form-control" value="<?php echo $row->email;?>" id="add_email">
    <span class="text-danger"><?php echo form_error('add_email');?></span>
   </div>

   <div class="form-group">
    <label for="add_date" class="label-center">Date</label>
    <input type="date" name="add_date" class="form-control" value="<?php echo $row->date;?>" id="add_date">
   </div>
   <div class="form-group col-md-6">
    <label for="add_address" class="label-address">Address</label>
    <textarea name="add_address" value="<?php echo $row->address;?>" id="add_address"></textarea>
   </div>
   <input type="hidden" name="hidden_id" value="<?php echo $row->id; ?>">
   <button type="submit" name="update" value="Update" class="btn btn-primary">Update</button>


   <?php  
   }
   }else{
 ?>



<div class="form-group">
    <label for="add_name" class="label-center">Name:</label>
    <input type="text" name="add_name" class="form-control" placeholder="Enter name" id="add_name">
    <span class="text-danger"><?php echo form_error('add_name');?></span>
  </div>
 
  <div class="form-group">
    <label for="add_email" class="label-center">Email address:</label>
    <input type="email" name="add_email" class="form-control" placeholder="Enter email" id="add_email">
    <span class="text-danger"><?php echo form_error('add_email');?></span>
  </div>

  <div class="form-group">
    <label for="add_date" class="label-center">Date</label>
    <input type="date" name="add_date" class="form-control" id="add_date">
  </div>

  <div class="form-group col-md-6">
    <label for="add_address" class="label-address">Address</label>
    <textarea name="add_address" id="add_address"></textarea>
  </div>

<div class="form-group">
<button type="submit" name="insert" value="insert" class="btn btn-primary">Submit</button>
</div>
<?php
}
?>
</form>
</div>

<br>
<!-- table view -->


  <div class="table-responsive">
<table class="table table-bordered">
<thead class="thead-dark">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Date</th>
<th>Address</th>
<th>Action</th>
</tr>

 <?php
 if($fetch_data->num_rows()>0) 
 {
foreach($fetch_data->result() as $row)
{
?>
  <tr>
  <td><?php echo $row->id; ?></td>
  <td><?php echo $row->name; ?></td>
  <td><?php echo $row->email; ?></td>
  <td><?php echo $row->date; ?></td>
  <td><?php echo $row->address; ?></td>
  <td>
  <a href="#" id="<?php echo $row->id; ?>" class="btn btn-danger delete_data" >Delete</a>
  <a href="<?php echo base_url()?>karma/update_data/<?php echo $row->id; ?>" class="btn btn-primary edit_data">Edit</a>
  </td>
  </tr>
  <?php 
}
}
else
{
 ?>
 <tr>
 <td colspan='3'>No data found</td>
 </tr>

<?php 
}
 ?> 
</table>

<script>
$(document).ready(function () {
  $('.delete_data').click(function () { 
    var id = $(this).attr('id');
    if(confirm("Are you sure you want delete this ?"))
    {
     window.location="<?php echo base_url(); ?>karma/delete_data/"+id;
    }else{
      return false;
    }
    
  });

});

</script>
</body>
</html>