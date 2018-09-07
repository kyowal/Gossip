<?php include('header.php'); 
$types = array("Mannual", "Feed","Video");
?>
<div class="container my-5">
   <div class="card-body text-center">
    <h4 class="card-title">Special title treatment</h4>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
  </div>
    <div class="card">
        <button id="add__new__list" type="button" class="btn btn-success position-absolute" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-plus"></i> Add a new List</button>
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Type</th>
                <th scope="col">Edit List </th>
                <th scope="col">list info</th>
              </tr>
            </thead>
            <tbody>
             
			<?php
			for($i = 1; $i < 10; $i++){
			?>
			<tr>
                <th scope="row"><?php echo $i; ?></th>
                <td>This is a title of this page which will be shown here</td>
                <td><?php echo $types[array_rand($types)]; ?></td>
                <td>
					<a class="btn btn-sm btn-primary" href="#"><i class="far fa-edit"></i> edit</a>
                    <a class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash-alt"></i> delete</a>
                </td>
                <td><a class="btn btn-sm btn-info" href="#"><i class="fas fa-info-circle"></i> Details</a> </td>
            </tr>
            <?php
	 		}
			?>
            </tbody>
          </table>
    </div>
    <!-- Large modal -->


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
		<div class="card-body text-center">
			<h4 class="card-title">Special title treatment</h4>
			<p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
		</div>
		<div class=" card col-8 offset-2 my-2 p-3">
		<div class="tabs">
			<ul class="nav nav-tabs" id="myTab">
				<li class="active">	<a href="#cfeed" data-toggle="tab" title="Feed">Create Feed</a></li>
				<li> <a href="#youtube" data-toggle="tab" title="Youtube">Youtube</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade in active" id="cfeed">
					<form>
						<div class="form-group">
						  <label for="listname">List name</label>
						  <input type="text" class="form-control" name="listname" id="listname" placeholder="Enter your listname">
						</div>
						<div class="form-group">
						  <label for="datepicker">Deadline</label>
						  <input  type="text" class="form-control" name="datepicker" id="datepicker" placeholder="Pick up a date">
						</div>
						<div class="form-group">
							<label for="datepicker">Add a list item</label>
							<div class="input-group">
							  <input type="text" class="form-control" placeholder="Add an item" aria-label="Search for...">
							  <span class="input-group-btn">
								<button class="btn btn-secondary" type="button">Go!</button>
							  </span>
							</div>
						</div>
						<div class="form-group text-center">
							<button type="submit" class="btn btn-block btn-primary">Sign in</button>
						</div>
					</form>
				</div>
				<div class="tab-pane fade" id="youtube">
					<form>
						<div class="form-group">
							<label for="datepicker">Add a list item</label>
							<div class="input-group">
							  <input type="text" class="form-control" placeholder="Enter youtube Url" aria-label="Search for...">
							  <span class="input-group-btn">
								<button class="btn btn-secondary" type="button">Fetch Youtube Data</button>
							  </span>
							</div>
						</div>
						
						<div class="form-group">
						  <label for="videotitle">Video Title</label>
						  <input type="text" class="form-control" name="videotitle" id="videotitle" placeholder="Video Title">
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>
  </div>
</div>
</div>
<?php include('footer.php'); ?>