<h2>Viewing #<?php echo $group->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $group->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $group->description; ?></p>

<?php echo Html::anchor('group/edit/'.$group->id, 'Edit'); ?> |
<?php echo Html::anchor('group', 'Back'); ?>