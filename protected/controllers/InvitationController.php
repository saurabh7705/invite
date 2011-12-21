<?php require 'F:\wamp\www\invite\protected\lib\Postmark.php';

class InvitationController extends Controller
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
				'actions'=>array('create','update','upload'),
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

	public function actionUpload()
    {
            
                $model=new Invitation;
		$file = CUploadedFile::getInstanceByName('data');
               
                if(isset($file))
		{
                $x=time();
		$file->saveAs('F:/wamp/www/invite/protected/data/invite'.$x.'.txt');
               
                $file_content = file_get_contents("F:/wamp/www/invite/protected/data/invite".$x.".txt");
                $file_content_separated_by_spaces = explode(" ", $file_content);
                $i;
               var_dump($file_content_separated_by_spaces);
                for($i=0;$i<sizeOf($file_content_separated_by_spaces);$i=$i+2)
                {
                  
                    $model1=new Invitation;
                $model1->username=$file_content_separated_by_spaces[$i];
                $model1->email=$file_content_separated_by_spaces[$i+1];
                $model1->sent=0;
               
                $val=$model1->save();                           
                }
	
                }
			
        $this->render('upload', array('model'=>$model));
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
		$model=new Invitation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Invitation']))
		{
			$model->attributes=$_POST['Invitation'];
	
			if($model->save())
			{
			
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Invitation']))
		{
			$model->attributes=$_POST['Invitation'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
           
            if(isset($_POST['myCheckBoxList']))
            {
                $mails=$_POST['myCheckBoxList'];
            for ($i=0;$i<sizeOf($mails);$i++)
            {
                $email = new Postmark();
                $email->addTo($mails[$i]);
                $email->subject('Subject');
                $email->messagePlain('Plaintext message');
                $email->tag('Test tag');
                $email->send();
                $model=Invitation::model()->findByAttributes(array('email'=>$mails[$i]));
                $model->sent=date("Y-m-d H:i:s");
                $val=$model->save();
            }
            }
		$dataProvider=new CActiveDataProvider('Invitation');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
                
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Invitation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Invitation']))
			$model->attributes=$_GET['Invitation'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Invitation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='invitation-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
