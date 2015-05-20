<?php

class PostController extends Controller
{
    public $layout='//layouts/web';
    public $title="Survmetrics Blog";
    public $facebookOGImg;
    public $facebookOGTitle;
    public $facebookOGUrl;
    public $facebookOGDescription;
    public $image_link=null;
    public $post_title=null;
    public $twitterImg;

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function actions()
    {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
                'testLimit'=>2,
                'backend'=>'gd'//If removed, imagick will be used by default, which will cause an exception with the backColor
            )
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
            array('allow',  // allow all users to access 'index' and 'view' actions.
                'actions'=>array('index','view', 'captcha'),
                'users'=>array('*'),
            ),
            array('allow', // allow administrators to access all actions
                'roles'=>array('blog')
            ),
            array('allow', // allow administrators to access all actions
                'users'=>array('Alexiel')
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     */
    public function actionView()
    {
        $post=Post::model()->findByPk($_GET['id']);
        if($post==null)
            throw new CHttpException(404,'The requested page does not exist.');
        if(!empty($post->image_link)){
            $this->facebookOGImg=$post->image_link;
            $this->twitterImg=$post->image_link;
        }
        if(!empty($post->title)){
            $this->facebookOGTitle=$post->title;
        }
        if(!empty($post->subtitle)){
            $this->facebookOGDescription=$post->subtitle;
        }
        $this->facebookOGUrl='https://'.Yii::app()->request->serverName.Yii::app()->request->url;
        $this->render('view',array(
            'model'=>$post
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new Post;
        if(isset($_POST['Post']))
        {
            $model->attributes=$_POST['Post'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate()
    {
        $model=$this->loadModel();
        if(isset($_POST['Post']))
        {
            $model->attributes=$_POST['Post'];
            if($model->save())
                $this->redirect(array('view','id'=>$model->id));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete()
    {
        $this->loadModel()->delete();
        $this->redirect(array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $cmd=Yii::app()->db->createCommand()
            ->select('*')
            ->from('blog_post')
            ->where('status=:status', array(':status'=>Post::STATUS_PUBLISHED))
            ->order('create_time DESC');

        if(isset($_GET['tag']))
            $cmd->andWhere('tags',$_GET['tag']);

        $data=$cmd->query();

        $this->render('index',array(
            'data'=>$data,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Post('search');
        if(isset($_GET['Post']))
            $model->attributes=$_GET['Post'];
        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    /**
     * Suggests tags based on the current user input.
     * This is called via AJAX when the user is entering the tags input.
     */
    public function actionSuggestTags()
    {
        if(isset($_GET['q']) && ($keyword=trim($_GET['q']))!=='')
        {
            $tags=Tag::model()->suggestTags($keyword);
            if($tags!==array())
                echo implode("\n",$tags);
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel()
    {
        if($this->_model===null)
        {
            if(isset($_GET['id']))
            {
                if(Yii::app()->user->isGuest)
                    $condition='status='.Post::STATUS_PUBLISHED.' OR status='.Post::STATUS_ARCHIVED;
                else
                    $condition='';
                $this->_model=Post::model()->findByPk($_GET['id'], $condition);
            }
            if($this->_model===null)
                throw new CHttpException(404,'La página solicitada no existe.');
        }
        return $this->_model;
    }

    /**
     * Creates a new comment.
     * This method attempts to create a new comment based on the user input.
     * If the comment is successfully created, the browser will be redirected
     * to show the created comment.
     * @param Post the post that the new comment belongs to
     * @return Comment the comment instance
     */
    /*protected function newComment($post)
    {
        $comment=new Comment('insert');
        //Change the comment scenario if the user is authenticated.
        //This will ensure that the ActiveRecord rules of name and e-mail as required fields do not occur.
        if(!Yii::app()->user->isGuest){
            $comment->setScenario('authenticatedComment');
            $comment->author=Yii::app()->user->id;
            $comment->email='';//Must insert email, even if a
            $comment->status=Comment::STATUS_APPROVED;//Approve it immediately.
        }
        if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
        {
            echo CActiveForm::validate($comment);
            Yii::app()->end();
        }
        if(isset($_POST['Comment']))
        {
            $comment->attributes=$_POST['Comment'];
            if($post->addComment($comment))
            {
                if($comment->status==Comment::STATUS_PENDING)
                    Yii::app()->user->setFlash('commentSubmitted','Gracias por su comentario. Este será publicado una vez sea aprobado.');
                $this->refresh();
            }
        }
        return $comment;
    }*/
}
