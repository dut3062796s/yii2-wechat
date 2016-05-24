<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/23
 * Time: 下午4:56
 */

namespace frontend\controllers;


use common\models\Vote;
use common\models\VoteUser;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;

class VoteController extends Controller
{
    public function actions()
    {

        return [
            'webupload' => [
                'class' => \yidashi\webuploader\Action::className()
            ],
        ];
    }

    public function actionInfo()
    {
        $id = Yii::$app->request->get('id');
        $model = Vote::find()->where(['id' => $id])->one();
        return $this->render('info', [
            'model' => $model
        ]);
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => VoteUser::find()
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    /**
     * Creates a new Vote model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VoteUser();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Vote model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
}