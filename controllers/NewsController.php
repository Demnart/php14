<?php

class NewsController
{

    public function actionAll()
    {
        $test = new NewsModel();
        $test->title = "Чтото";
        $test->text = 'What';
        $test->author ='hey';
        $test->update();
        die;

        $items = NewsModel::getAll();
        $view = new View();
        $view->items = $items;
        $view->display('news/all.php');
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = NewsModel::getOne($id);
        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');
    }

}