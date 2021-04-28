
<div class="content-wrapper">
	<div class="container">
		<h1>Persons</h1>
		<table class="table table-strippped table-hover">
			<th>Person</th>
			<?php foreach ($persons as $key => $value) { ?>
				<tr>
					<td><?php echo $value ?></td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>
