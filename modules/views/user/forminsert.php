
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1> Tambah User</h1>
        <ol class="breadcrumb">
            <li><a href="<?= PATH; ?>?page=user"> User</a></li>
            <li class="active"> Tambah User</li>
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
						<td><input type="text" name="id" class="form-control"/></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td>:</td>
						<td><input type="text" name="nama" class="form-control"/></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="password" name="password" class="form-control"/></td>
					</tr>
					<tr>
						<td colspan="3"><input type="submit" value="Tambah" name="submit" class="btn btn-primary sm-btn"/></td>
					</tr>
				</table>
			</div>
		</form>
	</div>
</div>	