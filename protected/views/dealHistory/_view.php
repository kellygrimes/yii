<?php
/* @var $this DealHistoryController */
/* @var $data DealHistory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Car_ID')); ?>:</b>
	<?php echo CHtml::encode($data->car->Make); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Deal_ID')); ?>:</b>
	<?php echo CHtml::encode($data->Deal_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DealStatus_ID')); ?>:</b>
	<?php echo CHtml::encode($data->dealStatus->DealStatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SalesPerson_ID')); ?>:</b>
	<?php echo CHtml::encode($data->SalesPerson_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('User_ID')); ?>:</b>
	<?php echo CHtml::encode($data->user->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DealStatus')); ?>:</b>
	<?php echo CHtml::encode($data->DealStatus); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Make')); ?>:</b>
	<?php echo CHtml::encode($data->Make); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Model')); ?>:</b>
	<?php echo CHtml::encode($data->Model); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Price')); ?>:</b>
	<?php echo CHtml::encode($data->Price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SalesPersonUserName')); ?>:</b>
	<?php echo CHtml::encode($data->SalesPersonUserName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StyleID')); ?>:</b>
	<?php echo CHtml::encode($data->StyleID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Year')); ?>:</b>
	<?php echo CHtml::encode($data->Year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UserName')); ?>:</b>
	<?php echo CHtml::encode($data->UserName); ?>
	<br />

	*/ ?>

</div>