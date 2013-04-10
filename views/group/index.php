<h2>Listing Groups</h2>
<br>
<?php if ($groups): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($groups as $group): ?>		<tr>

			<td><?php echo $group->name; ?></td>
			<td><?php echo $group->description; ?></td>
			<td>
				<?php echo Html::anchor('group/view/'.$group->id, 'View'); ?> |
				<?php echo Html::anchor('group/edit/'.$group->id, 'Edit'); ?> |
				<?php echo Html::anchor('group/delete/'.$group->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Groups.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('group/create', 'Add new Group', array('class' => 'btn btn-success')); ?>

</p>
