<h2>Editing Group</h2>
<br>

<?php echo render('group/_form'); ?>
<p>
	<?php echo Html::anchor('group/view/'.$group->id, 'View'); ?> |
	<?php echo Html::anchor('group', 'Back'); ?></p>
