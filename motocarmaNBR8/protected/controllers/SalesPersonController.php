<?php

class SalesPersonController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SalesPerson;
                $user = new User;
                $profile=new Profile;
                $profile->regMode = true;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SalesPerson']))
		{
                    try{
			$model->attributes=$_POST['SalesPerson'];
			$user->attributes=$_POST['User'];
                        $profile->attributes=((isset($_POST['Profile'])?$_POST['Profile']:array()));
                        if($user->validate() && $model->validate() && $profile->validate()){
                            $transaction = Yii::app()->db->beginTransaction();
                            if($user->save(false)){
                                
                                $profile->user_id=$user->id;
                                if($profile->save()){
                                    $model->User_ID = $user->id;
                                    if($model->save()){
                                        
                                    }else{
                                        $transaction->rollback();
                                    }
                                }else{
                                    $transaction->rollback();
                                }
                                
                            }else{
                                $transaction->rollback();
                            }
                            $transaction->commit();
                            $this->redirect(array('view','id'=>$model->ID));
                        }
                    }catch(Exception $e){
                            $transaction->rollBack();
                            throw new CHttpException(null,"Error while saving Sales Person :  ".$e->getMessage());
                    }
		}

		$this->render('create',array(
			'model'=>$model,
                        'user'=>$user,
                        'profile' => $profile
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                //$user = $model->user;
                $user = null;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                
		if(isset($_POST['SalesPerson']))
		{
			$model->attributes=$_POST['SalesPerson'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID));
		}

		$this->render('update',array(
			'model'=>$model,'user'=>$user, 'profile'=>null
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $roles = Rights::getAssignedRoles(Yii::app()->user->Id); 
            $criteria = array();
            if (count($roles) === 1) { 
                $role = current($roles);
                if($role->name == 'dealer'){
                    $dealership=  Dealership::model()->findByAttributes(array('User_ID'=>Yii::app()->user->Id));
                    $criteria = array(
                                'condition'=>'Dealership_ID='.$dealership->ID
                                );
                }
            }
		$dataProvider=new CActiveDataProvider('SalesPerson',
                                array('criteria'=> $criteria));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SalesPerson('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SalesPerson']))
			$model->attributes=$_GET['SalesPerson'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SalesPerson the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SalesPerson::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SalesPerson $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sales-person-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
