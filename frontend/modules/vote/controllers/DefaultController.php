<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/23
 * Time: 下午4:56
 */

namespace frontend\modules\vote\controllers;


use common\models\Vote;
use common\models\VoteUser;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use Yii;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
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
        $voteId = Yii::$app->request->get('voteId');
        $model = $this->findVote($voteId);
        return $this->render('info', [
            'model' => $model
        ]);
    }

    public function actionIndex()
    {
        $id = Yii::$app->request->get('voteId');
        $dataProvider = new ActiveDataProvider([
            'query' => VoteUser::find()->where(['vote_id' => $id])
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
        $voteId = Yii::$app->request->get('voteId');
        $vote = $this->findVote($voteId);
        $model = new VoteUser();
        $model->vote_id = $vote->id;
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

    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model
        ]);
    }
    /**
     * Finds the Vote model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return VoteUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = VoteUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('选手不存在!');
        }
    }
    /**
     * Finds the Vote model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Vote the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findVote($id)
    {
        if (($model = Vote::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('活动不存在!');
        }
    }
}