<div class="row">
    <div class="col-lg-12">
        <h1> Tambah Menu</h1>
        <ol class="breadcrumb">
            <li><a href="<?= PATH; ?>?page=menu"> Menu</a></li>
            <li class="active"> Tambah Menu</li>
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
						<td>Nama Menu</td>
						<td>:</td>
						<td><input type="text" name="nama" id="nama" class="form-control"></td>
					</tr>
					<tr>
						<td>Urutan</td>
						<td>:</td>
						<td><input type="text" name="urutan" id="urutan" class="form-control"></td>
					</tr>
					<tr>
						<td>Page</td>
						<td>:</td>
						<td><input type="text" name="page" id="page" class="form-control"></td>
					</tr>
					<tr>
						<td>Parent</td>
						<td>:</td>
						<td>
							<select name="parent" class="form-control">
								<option value="">.: Pilih :.</option>
								<?php for($i=0;$i<count($parent);$i++) {?>
								<option value="<?php echo $parent[$i]['msm_id'];?>"><?php echo $parent[$i]['msm_nama'];?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Hak Akses </br><span style="color:red">*separate by coma</span></td>
						<td>:</td>
						<td><input type="text" name="hakakses" id="hakakses" class="form-control"></td>
					</tr>
					<tr>
						<td colspan="3"><input type="submit" value="Tambah" name="submit" class="btn btn-primary sm-btn"/></td>
					</tr>
				</table>
			</div>
		</form>
	</div>
</div>
