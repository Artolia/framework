<div class="row">
    <div class="col-lg-12">
        <h1> Menu</h1>
        <ol class="breadcrumb">
            <li><a href="<?= PATH; ?>"> Home</a></li>
            <li class="active"> Menu</li>
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
				<a href="<?php echo PATH; ?>?page=menu&action=forminsert" class="btn btn-primary">+ Tambah Menu Baru</a>
			<?php } ?>
        </div>

		<div class="panel panel-default">
			<div class="panel-body">
				<table width="100%" class="table">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Urutan</th>
							<th style="width:100px;">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$no = 1;
						for($i=0;$i<count($parent);$i++){
							?>
							<tr>
								<td><?php echo $parent[$i]["msm_nama"]; ?></td>
								<td><?php echo $parent[$i]["msm_urutan"]; ?></td>
								<td>
									<?php if($allowEdit){ ?>
										<a class="btn btn-warning btn-sm" href="<?php echo SITE_URL; ?>?page=menu&action=formupdate&id=<?php echo $parent[$i]["msm_id"]; ?>">Edit</a>
									<?php } ?>
								</td>
							</tr>
							<?php
								for($j=0;$j<count($child);$j++){
									if($parent[$i]['msm_id'] == $child[$j]['msm_parent']){
							?>
								<tr>
									<td><?php echo ' - ' . $child[$j]['msm_nama']?></td>
									<td><?php echo $child[$j]["msm_urutan"]; ?></td>
									<td>
										<?php if($allowEdit){ ?>
											<a class="btn btn-warning btn-sm" href="<?php echo SITE_URL; ?>?page=menu&action=formupdate&id=<?php echo $child[$j]["msm_id"]; ?>">Edit</a>
										<?php } ?>
									</td>
								</tr>
								<?php } } ?>
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
