<?php

class MainController
{
    /**
     * @return void
     */
    public function home()
    {
        $category_list = Category::getCategoryCountProduct();

        require_once('views/main/home.php');
    }

    /**
     * @return void
     */
    public function error()
    {
        require_once('views/main/error.php');
    }

    /**
     * @return void
     */
    public function getProductsByIdCategory()
    {
        if ($_POST['category_id'] && !$_POST['filter']) {
            $list_products = Products::getProductsByIdCategory($_POST['category_id']);
        } elseif ($_POST['category_id'] && $_POST['filter']) {
            $list_products = Products::getProductsWithParam($_POST['category_id'], $_POST['filter']);
        } else {
            require_once('views/main/error.php');
        }
        require_once('views/main/post/getProductsByIdCategory.php');
    }
}