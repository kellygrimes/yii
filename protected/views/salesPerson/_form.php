<?php
/* @var $this SalesPersonController */
/* @var $model SalesPerson */
/* @var $form CActiveForm */
/* <div class="row">
        <?php
        $list = CHtml::listData(Dealership::model()->findAll(),'ID','Name');
        echo $form->dropDownList($model, 'Dealership_ID', $list);
        ?>
            </div>
        <div class="row">
        <?php echo $form->dropDownList($model,'Dealership_ID', CHtml::listData(Dealership::model()->findAll(),'ID','Name')); ?>
        </div>*/ 
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sales-person-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ID'); ?>
		<?php echo $form->textField($model,'ID'); ?>
		<?php echo $form->error($model,'ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Dealership_ID'); ?>
            <?php echo $form->dropDownList($model,'Dealership_ID', $model->getAllDealerships()); ?>
                <?php echo $form->error($model,'Dealership_ID'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'User_ID'); ?>
		 <?php echo $form->dropDownList($model,'User_ID', $model->getAllUsers()); ?>
                <?php echo $form->error($model,'User_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ContactPhone'); ?>
		<?php echo $form->textField($model,'ContactPhone',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ContactPhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Email'); ?>
		<?php echo $form->textField($model,'Email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textField($model,'Description',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'Description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DateAdded'); ?>
		<?php echo $form->textField($model,'DateAdded'); ?>
		<?php echo $form->error($model,'DateAdded'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Active'); ?>
		<?php echo $form->textField($model,'Active'); ?>
		<?php echo $form->error($model,'Active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Photo'); ?>
		<?php echo $form->textField($model,'Photo'); ?>
		<?php echo $form->error($model,'Photo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->