<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('First', 'first'); ?>

			<div class="input">
				<?php echo Form::input('first', Input::post('first', isset($person) ? $person->first : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Last', 'last'); ?>

			<div class="input">
				<?php echo Form::input('last', Input::post('last', isset($person) ? $person->last : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Email', 'email'); ?>

			<div class="input">
				<?php echo Form::input('email', Input::post('email', isset($person) ? $person->email : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php foreach ($groups as $group) : ?>	
				<div class="checkbox">
					<?php echo Form::checkbox('groups[]', $group->id, isset($person) ? in_array($group, $person->groups) : '') ; ?> 
					<?php echo Form::label($group->name, 'groups[]'); ?>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>