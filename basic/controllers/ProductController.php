<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\base\Exception;
use yii\filters\VerbFilter;
use app\models\Product;
use app\models\ProductSearch;
use app\models\ProductCategory;
use app\models\Category;
use app\components\StringUtils;
use app\models\UploadModel;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                'denyCallback' => function () {
                    return Yii::$app->response->redirect(['/login']);
                },
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionDetail($id)
    {
        $categories = Category::getCategoriesByProduct($id);

        return $this->render('detail', [ 'model' => $this->findModel($id), 'categories' => $categories, ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $categories = Category::find()->all();
        $uploadModel = new UploadModel();
        $productCategory = new ProductCategory();
        
        return $this->render('create', [ 'model' => $model, 'categories' => $categories, 'productCategory' => $productCategory, 'uploadModel' => $uploadModel,  ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $categories = Category::find()->all();
        $uploadModel = new UploadModel();
        $productCategory = ProductCategory::find()->where(['product_id' => $id])->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [ 'model' => $model, 'categories' => $categories, 'productCategory' => $productCategory, 'uploadModel' => $uploadModel,  ]);
        }
    }

    /**
     * Save a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionSave($id = null)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $model = new Product();
        $uploadModel = new UploadModel();
        $path = 'images/products/';

        $categories = Yii::$app->request->post('ProductCategory');
        $categories = explode(',',$categories['category_id']);

        if( Yii::$app->request->isAjax )
        {
            if( $id )
            {
                $model = $this->findModel($id);
            }

            if( $model->load(Yii::$app->request->post()) )
            {
                $uploadModel->file = UploadedFile::getInstance($uploadModel, 'file');

                try{
                  if( $uploadModel->validate()){

                    if( !$id )
                    {
                        $model->image = StringUtils::generateString() . '.' . $uploadModel->file->extension;
                    }
                    
                    $uploadModel->file->saveAs($path . $model->image);
                  }
                  else {
                      throw new Exception( 'There was a problem trying to save the file!' );
                  }
                }
                catch( Exception $e){
                  throw new Exception( $e->getMessage() );
                }

                if(!$model->save())
                {
                    throw new Exception( 'Sorry, can\'t save data, fill all fields and try again!' );
                }


                if( $id ){
                    ProductCategory::deleteByProduct( $id );
                }

                foreach ($categories as $category) {
                    $productCategory = new ProductCategory();
                    $productCategory->product_id    = $model->id;
                    $productCategory->category_id   = $category;
                    $productCategory->save();
                }

                return $model;
            }
        }

        throw new Exception( 'Page not found!' );
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->deleteImage($id);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteAjax($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $this->deleteImage($id);

        return $this->findModel($id)->delete();
    }

    private function deleteImage( $id )
    {
        $model = Product::findOne($id);

        return unlink('images/products/'.$model->image);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
