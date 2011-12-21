<div class="form">

	
	<?php echo CHtml::form('', 'post', array('enctype'=>'multipart/form-data')); ?>
           

	<div class="row">
		<?php echo CHtml::Label('Files',''); ?>
		<?php echo CHtml::FileField('data', ''); ?>
		</div>
 

	<div class="row buttons">
		<?php echo CHtml::submitButton('Upload'); ?>
	</div>

    <?php echo CHtml::endForm(); ?>

</div><!-- form -->
