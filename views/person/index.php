<h2>Listing People</h2>
<br>
<?php if ($people): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>First</th>
			<th>Last</th>
			<th>Email</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($people as $person): ?>		<tr>

			<td><?php echo $person->first; ?></td>
			<td><?php echo $person->last; ?></td>
			<td><?php echo $person->email; ?></td>
			<td>
				<?php echo Html::anchor('person/view/'.$person->id, 'View'); ?> |
				<?php echo Html::anchor('person/edit/'.$person->id, 'Edit'); ?> |
				<?php echo Html::anchor('person/delete/'.$person->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No People.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('person/create', 'Add new Person', array('class' => 'btn btn-success')); ?>

</p>
