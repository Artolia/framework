<div class="row">
    <div class="col-lg-12">
        <h1> Edit Group</h1>
        <ol class="breadcrumb">
            <li><a href="<?= PATH; ?>?page=group"> Group</a></li>
            <li class="active"> Edit Group</li>
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
				<input type="hidden" name="id" value="<?= $id; ?>"/>
				<table class="table">										
					<tr>
						<td>Nama Group</td>							
						<td> : </td>
						<td><input type="text" name="msg_nama" id="msg_nama" value="<?= $data['msg_nama'];?>" class="form-control"/></td>
					</tr>		
					<tr>
						<td>Status</td>							
						<td> : </td>
						<td>
							<select name="msg_status" id="msg_status" class="form-control">
								<option value="1" <?= ($data['msg_status']=='1') ? 'selected="selected"' : '' ?>>Aktif</option>
								<option value="0" <?= ($data['msg_status']=='0') ? 'selected="selected"' : '' ?>>Non-Aktif</option>
							</select>
						</td>
					</tr>	
					<tr>
						<td colspan="3"><input type="submit" value="Tambah" name="submit" class="btn btn-primary sm-btn"/></td>
					</tr>
				</table>
			</div>
		</form>
	</div>
</div>
