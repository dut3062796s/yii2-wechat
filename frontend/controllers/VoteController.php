<?php
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/5/23
 * Time: 下午4:56
 */

namespace frontend\controllers;


use common\models\Vote;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class VoteController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Vote::find()
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
}