<?php

class Category
{

    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * @return array
     */
    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM category');

        foreach ($req->fetchAll() as $post) {
            $list[] = new Category($post['id'], $post['name']);
        }

        return $list;
    }

    /**
     * @return array
     */
    public static function getCategoryCountProduct()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM category');

        foreach ($req->fetchAll() as $category) {
            $product_count = Products::countFindByCategoryId($category['id']);
            $list[] = [
                'category_id' => $category['id'],
                'category_name' => $category['name'],
                'product_count' => $product_count,
            ];
        }

        return $list;
    }
}
