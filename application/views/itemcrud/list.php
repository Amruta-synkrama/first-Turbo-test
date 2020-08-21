<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>You can Add items Here</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo base_url('itemcrud/create') ?>"> Create New Item</a>
        </div>
    </div>
</div>


<table class="table table-bordered">


  <thead>
      <tr>
      	 <th>No</th>
          <th>Title</th>
          <th>Description</th>
          <th width="220px">Action</th>
      </tr>
  </thead>


  <tbody>
   <?php foreach ($data as $item) { ?>      
      <tr>
      	  <td><?php echo $item->id; ?></td>
          <td><?php echo $item->title; ?></td>
          <td><?php echo $item->description; ?></td>          
      <td>
        <form method="DELETE" action="<?php echo base_url('itemcrud/delete/'.$item->id);?>">
          <a class="btn btn-info" href="<?php echo base_url('itemcrud/show/'.$item->id) ?>"> show</a>
         <a class="btn btn-primary" href="<?php echo base_url('itemcrud/edit/'.$item->id) ?>"> Edit</a>
          <button type="submit" class="btn btn-danger"> Delete</button>
        </form>
      </td>     
      </tr>
      <?php } ?>
  </tbody>


</table>