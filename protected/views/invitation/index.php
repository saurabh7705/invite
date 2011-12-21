<?php
$this->breadcrumbs=array(
	'Invitations',
);

$this->menu=array(
	array('label'=>'Create Invitation', 'url'=>array('create')),
	array('label'=>'Manage Invitation', 'url'=>array('admin')),
);
?>

<h1>Invitations</h1>

<?php 
//$sql= 'SELECT * FROM invitation';
$data1=Invitation::model()->findAll();
$i=0;
; ?>
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
     
        <?php for($i=0;$i<sizeOf($data1);$i++){?>
       
        <tr><td><?php echo $data1[$i]->id; ?></td>

        <td>
	<?php echo $data1[$i]->username; ?>
	</td>
 
	  <td>
	<?php echo $data1[$i]->email; ?>
	</td>

	  <td>
	<?php echo $data1[$i]->sent; ?>
	</td>
        <td>
            <input type="checkbox" name="myCheckBoxList[]" value="<?php echo $data1[$i]->email ?>" />
        </td></tr>
        <?php }?>
      
</table>
        
    <div class="row buttons">
<?php echo CHtml::submitButton('Send'); ?>

    </div>
    <?php echo CHtml::endForm(); ?>
<!--</div> form -->
</div>
