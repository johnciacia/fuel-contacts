<h2>Viewing #<?php echo $person->id; ?></h2>

<p>
	<strong>First:</strong>
	<?php echo $person->first; ?></p>
<p>
	<strong>Last:</strong>
	<?php echo $person->last; ?></p>
<p>
	<strong>Email:</strong>
	<?php echo $person->email; ?></p>

<?php echo Html::anchor('person/edit/'.$person->id, 'Edit'); ?> |
<?php echo Html::anchor('person', 'Back'); ?>