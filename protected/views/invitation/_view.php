<div class="view">
<!--<div class="form1">-->
<?php echo CHtml::form('', 'post'); ?>
  
    <table>
        <tr>
            <td><b>ID</b></td>
            <td><b>Name</b></td>
            <td><b>Email-Id</b></td>
            <td><b>Sent On</b></td>
        </tr>
        
        <tr><td><?php echo CHtml::encode($data->id); ?></td>

        <td>
	<?php echo CHtml::encode($data->username); ?>
	</td>

	  <td>
	<?php echo CHtml::encode($data->email); ?>
	</td>

	  <td>
	<?php echo CHtml::encode($data->sent); ?>
	</td>
        <td>
            <?php echo Chtml::checkBox("myCheckBoxList"); ?> 
        </td></tr>
      
</table>
        
    <div class="row buttons">
<?php echo CHtml::submitButton('Send'); ?>

    </div>
    <?php echo CHtml::endForm(); ?>
<!--</div> form -->
</div>