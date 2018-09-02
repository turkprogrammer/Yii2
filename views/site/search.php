<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\widgets\ListView;
use yii\helpers\Html;

if (isset($search1)) {
    $this->params['breadcrumbs'][] = $this->title . ' - ' . $search1;
} else {
    $this->params['breadcrumbs'][] = $this->title;
}


echo ListView::widget([
    'dataProvider' => $dataProvider, // переданные данные
    'itemView' => '_list', // шаблон для вывода данных
    'layout' => "{pager}\n{summary}\n{items}\n{pager}", // выводим постраничную навигацию вначале и в конце списка, общее количесвто элементов и количестов элементов показанных на странице и сам список
    'summary' => 'Найдено: <code>{count} из {totalCount}</code>', // шаблон для summary
    'summaryOptions' => [// опции для раздела количество элементов
        'tag' => 'span', // заключаем summary в тег span
        'class' => 'summary' // добавлем класс summary
    ],
    'emptyText' => 'Ничего не найдено...', // выводим  'Список пуст', если даннах нет
    'emptyTextOptions' => [// опции для пустого контейнера
        'tag' => 'i' // добавляем тег абзаца для пустого контейнера
    ],
]);
?>

