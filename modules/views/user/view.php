<div class="row">
    <div class="col-lg-12">
        <h1> User</h1>
        <ol class="breadcrumb">
            <li><a href="<?= PATH; ?>"> Home</a></li>
            <li class="active"> User</li>
        </ol>

    </div>
</div>

<!-- Error / Success Message !-->
<?php
if(isset($_SESSION['msg'])) {
	foreach($_SESSION['msg'] as $value) {
?>
	<div class="alert alert-success"><?php echo $value; ?></div>
<?php } 
unset($_SESSION['msg']);
}
?>

<!-- Page Body -->
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
			<?php if($allowAdd){ ?>
				<a href="<?php echo PATH; ?>?page=user&action=forminsert" class="btn btn-primary">+ Tambah User Baru</a>
			<?php } ?>
        </div>

		<div class="panel panel-default">
			<div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th style="width: 40px;">No</th>
							<th>Nama</th>
							<th>Status Aktif</th>
							<th style="width:100px;">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = 1;
						for($i=0;$i<count($data);$i++){
							?>
							<tr>
								<td><?php echo $no; ?></td>						
								<td><?php echo $data[$i]["nama"]; ?></td>
								<td><?php if($data[$i]["status"]=='1'){echo 'Aktif';}else{echo 'Non-Aktif';} ?></td>
								<td>
									<?php if($allowEdit){ ?>
										<a class="btn btn-warning btn-sm" href="<?php echo SITE_URL; ?>?page=user&action=formupdate&id=<?php echo $data[$i]["id"]; ?>">Edit</a>
									<?php } ?>
								</td>
							</tr>
						<?php
							$no++;
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
	$('#dataTables-example').DataTable({
		responsive: true
	});
});
</script>
