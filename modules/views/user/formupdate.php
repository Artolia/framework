
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1> Edit User</h1>
        <ol class="breadcrumb">
            <li><a href="<?= PATH; ?>?page=user"> user</a></li>
            <li class="active"> Edit User</li>
        </ol>

    </div>
</div>

<!-- Error / Success Message !-->
<?php
if($error>0) {
?>
	<?php foreach($message as $value) {?>
		<div class="alert alert-danger"><?php echo $value; ?></div>
	<?php } ?>

<?php
}
?>

<!-- Page Body -->
<div class="row">
	<div class="col-lg-12">
		<form method="post">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<td>ID</td>
						<td>:</td>
						<td><?php echo $data['msu_id']; ?></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><input type="text" name="nama" class="form-control" value="<?php echo $data['msu_nama']; ?>"/></td>
					</tr>	
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="password" name="password" class="form-control"/></td>
					</tr>	
					<tr>
						<td>Status</td>
						<td>:</td>
						<td>
							<select name="status" class="form-control">
								<option value="1" <?= ($data['msu_status_aktif']=='1') ? 'selected="selected"' : ''?>>Aktif</option>
								<option value="0" <?= ($data['msu_status_aktif']=='0') ? 'selected="selected"' : ''?>>Non-Aktif</option>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="3"><input type="submit" value="Edit" name="submit" class="btn btn-primary sm-btn"/></td>
					</tr>
				</table>
			</div>
		</form>
	</div>
</div>	