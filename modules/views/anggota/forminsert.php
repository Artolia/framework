<div class="row">
    <div class="col-lg-12">
        <h1> Tambah Anggota</h1>
        <ol class="breadcrumb">
            <li><a href="<?= PATH; ?>?page=anggota&msg_id=<?= $msg_id ?>"> Anggota</a></li>
            <li class="active"> Tambah Anggota</li>
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
				<input type="hidden" name="msg_id" value="<?= $msg_id; ?>"/>
				<table class="table">										
					<tr>
						<td>Nama Anggota</td>							
						<td> : </td>
						<td>
							<select name="msu_id" id="msu_id" class="form-control">
								<option value="">.: Pilih Anggota :. </option>
								<?php for($i=0;$i<count($user);$i++) {?>
									<option value="<?php echo $user[$i]['msu_id'];?>"><?php echo $user[$i]['msu_nama'];?></option>
								<?php } ?>
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
