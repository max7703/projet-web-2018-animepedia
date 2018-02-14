<?php require_once '../vue/VueHeader.php';
$header = new VueHeader();
$header->printHeader("Admin | Animepedia") ?>
<link rel="stylesheet" href="admin_.css">
<table class="table  table-sm">
<thead class="table-info">
	<tr>
		<th></th>
		<th>Name</th>
		<th>Registration Date</th>
		<th>E-mail address</th>
		<th>Premium Plan</th>
	</tr>
</thead>
<tbody>
	<tr>
		<td>
			<label class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input">
				<span class="custom-control-indicator"></span>
			</label>
		</td>
		<td>John Lilki</td>
		<td>September 14, 2013</td>
		<td>jhlilk22@yahoo.com</td>
		<td>No</td>
	</tr>
	<tr>
		<td>
			<label class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input">
				<span class="custom-control-indicator"></span>
			</label>
		</td>
		<td>John Lilki</td>
		<td>September 14, 2013</td>
		<!--class="table-danger"-->
		<td >jhlilk22@yahoo.com</td>
		<td>No</td>
	</tr>
	<tr>
		<td>
			<label class="custom-control custom-checkbox">
				<input type="checkbox" class="custom-control-input">
				<span class="custom-control-indicator"></span>
			</label>
		</td>
		<td>John Lilki</td>
		<td>September 14, 2013</td>
		<td>jhlilk22@yahoo.com</td>
		<td>No</td>
	</tr>
</tbody>
</table>
 <?php include '../vue/VueFooter.php' ?>