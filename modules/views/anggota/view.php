<div class="row">
    <div class="col-lg-12">
        <h1> Anggota</h1>
        <ol class="breadcrumb">
            <li><a href="<?= PATH; ?>?page=group"> Group</a></li>
            <li class="active"> Anggota</li>
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
			<a href="<?php echo SITE_URL; ?>?page=anggota&action=forminsert&msg_id=<?= $msg_id ?>" class="btn btn-primary">+ Tambah Anggota Baru</a>
        </div>

		<div class="panel panel-default">
			<div class="panel-body">
				<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th style="width: 40px;">No</th>
							<th>Nama</th>
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
								<td><?php echo $data[$i]["msu_nama"]; ?></td>
								<td>
									<a class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin?');" href="<?php echo SITE_URL; ?>?page=anggota&action=deleteAnggota&msg_id=<?= $msg_id?>&msgm_id=<?php echo $data[$i]["msgm_id"]; ?>">Delete</a>
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
