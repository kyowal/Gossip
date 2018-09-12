<?php
include ('header.php');
include ('class/class_gossip.php');
global $app;
$app = new Application();
$app->checkIsLogin();

$types = array(
    "Mannual",
    "Feed",
    "Video"
);
?>
<div class="container">
	<div class="card-body text-center">
		<h4 class="card-title ttl">Website Content Listing</h4>
		<p class="card-text subttl">This is custom post content list posted by
			you.</p>
	</div>
	<div class="card">
		<button type="button"
			class="btn btn-success position-absolute refresh">
			<i class="fas fa-sync-alt"></i> Refresh List
		</button>
		<button type="button"
			class="btn btn-success position-absolute openeditor">
			<i class="fas fa-plus"></i> Add a new List
		</button>
		<div class="tbllist">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Title</th>
						<th scope="col">Type</th>
						<th scope="col">Edit List</th>
						<th scope="col">list info</th>
					</tr>
				</thead>
				<tbody>
             
			<?php
for ($i = 1; $i < 35; $i ++) {
    ?>
			<tr>
						<th scope="row"><?php echo $i; ?></th>
						<td>This is a title of this page which will be shown here</td>
						<td><?php echo $types[array_rand($types)]; ?></td>
						<td><a class="btn btn-sm btn-primary" href="#"><i
								class="far fa-edit"></i> edit</a> <a
							class="btn btn-sm btn-danger" href="#"><i
								class="fas fa-trash-alt"></i> delete</a></td>
						<td><a class="btn btn-sm btn-info" href="#"><i
								class="fas fa-info-circle"></i> Details</a></td>
					</tr>
            <?php
}
?>
            </tbody>
			</table>
		</div>
	</div>


	<div class="modal fade" id="posteditor" tabindex="-1" role="dialog"
		aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="card-body text-center">
					<h4 class="card-title">Create New Article</h4>
					<p class="card-text">Using this form you can add new content.</p>
				</div>
				<div class="card col-8 offset-2 my-2 p-3 dsplayt">
					<div class="tabs">
						<ul class="nav nav-tabs" id="myTab">
							<li class="col-6 my-2 p-3 active"><a href="#cfeed"
								class="contab active" data-toggle="tab" title="Feed">Create Feed</a></li>
							<li class="col-6 my-2 p-3"><a href="#youtube" class="contab"
								data-toggle="tab" title="Youtube">Youtube</a></li>
						</ul>
						<div class="tab-content">
						<?php
                        include ('html/artical-feed.php');
                        include ('html/artical-youtube.php');
                        ?>
                		</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>