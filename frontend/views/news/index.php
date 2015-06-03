<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<table>
  <tr valign="top">
      <td>
            <b>Категории</b>
            <?php
                $category_array=ArrayHelper::map($category_list,'id','name');
                //$param=[];
                foreach ($category_array as $key=>$val) { 
                    $param[]=['label'=>"$val",'url'=>['news/index','cat'=>"$key"]];
                };  
            ?>
                
            <?= Menu::widget([
                    'items'=>$param
                ]);
            ?>
      </td>
      <td>
        <div class="news-index">
        
            <h1><?= Html::encode($this->title) ?></h1>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
        
                    'title',
                    'category.name',
                   // 'category_id',
                    'date',
                    //'content:ntext',
                    'contshort:ntext',
        
                    ['class' => 'yii\grid\ActionColumn','template' => '{view}'],
                ],
            ]); ?>
        
        </div>
       </td> 
  </tr>
</table>