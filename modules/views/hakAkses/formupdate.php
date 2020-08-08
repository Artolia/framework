<div class="row">
    <div class="col-lg-12">
        <h1> Ubah Hak Akses</h1>
        <ol class="breadcrumb">
            <li><a href="<?= PATH; ?>?page=group"> Group</a></li>
            <li class="active"> Ubah Hak Akses</li>
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
					<input type="hidden" name="id" value="<?= $id;?>"/>
					<?php for($i=0;$i<count($parent);$i++){?>
					<tr>
						<td><?php echo $parent[$i]['nama'];?></td>							
						<td colspan="2">
						<?php for($j=0;$j<count($parent[$i]['hak_akses']);$j++){?>							
							<input type="checkbox" class="form-check-input" name="hakakses[<?php echo $parent[$i]['id'];?>][]" value="<?php echo $parent[$i]['hak_akses'][$j]?>" <?php if(array_search($parent[$i]['hak_akses'][$j],$parent[$i]['priv']) !== False){ echo "checked='checked'";}?>> <?php echo $parent[$i]['hak_akses'][$j]?></br>
						<?php } ?>						
						</td>
					</tr>	
					<?php for($k=0;$k<count($child);$k++){
						if($parent[$i]['id'] == $child[$k]['parent']){
					?>
					<tr>
						<td>- <?php echo $child[$k]['nama'];?></td>							
						<td colspan="2">
						<?php for($l=0;$l<count($child[$k]['hak_akses']);$l++){?>							
							<input type="checkbox" class="form-check-input" name="hakakses[<?php echo $child[$k]['id'];?>][]" value="<?php echo $child[$k]['hak_akses'][$l]?>" <?php if(array_search($child[$k]['hak_akses'][$l],$child[$k]['priv']) !== False){ echo "checked='checked'";}?>> <?php echo $child[$k]['hak_akses'][$l]?></br>
						<?php } ?>						
						</td>
					</tr>
					<?php } ?>
					<?php } ?>
					<?php } ?>
					<tr>
						<td colspan="3"><input type="submit" value="Update" name="submit" class="btn btn-primary sm-btn"/></td>
					</tr>
				</table>
			</div>
		</form>
	</div>
</div>
