<?php

namespace app\controllers;

use Yii;
use app\models\ProfileAccount;
use app\models\ProfileAccountSearch;
use app\models\Donations;
use app\models\UsersSystem;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for ProfileAccount model.
 */
class ProfileController extends AdminController
{
    /**
     * Lists all ProfileAccount models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect('/user/');
    }

    /**
     * Displays a single ProfileAccount model.
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
     * Creates a new ProfileAccount model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProfileAccount();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $query_areas = new Query();
            $areas_support = $query_areas->from('areas_support')->all();

            return $this->render('create', [
                'model' => $model,
                'areas_suport' => ArrayHelper::map($areas_support, 'id', 'name'),
            ]);
        }
    }

    /**
     * Updates an existing ProfileAccount model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->areas_support = json_encode($model->areas_support);
            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                var_dump($model->errors);
            }
        } else {
            $query_areas = new Query();
            $areas_support = $query_areas->from('areas_support')->all();

            return $this->render('update', [
                'model' => $model,
                'areas_suport' => ArrayHelper::map($areas_support, 'id', 'name'),
            ]);
        }
    }

    /**
     * Deletes an existing ProfileAccount model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $profile = $this->findModel($id);

        $query = new Query;
        $query->select('id')
            ->from('donations')
        ->where(['id_user' => $profile->user_id]);

        $rows = $query->all();


        if(count($rows)){
            foreach ($rows[0] as $row){

                $donation = Donations::findOne($row);
                $donation->delete();
            }
        }

        $user = UsersSystem::findOne($profile->user_id);
        $user->delete();
        $profile->delete();

       return $this->redirect('/user/');
    }

    /**
     * Finds the ProfileAccount model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProfileAccount the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProfileAccount::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
