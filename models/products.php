<?php

class Products
{

    public $id;
    public $category_id;
    public $name;
    public $price;
    public $date;

    public function __construct($id, $category_id, $name, $price, $date)
    {
        $this->id = $id;
        $this->category_id = $category_id;
        $this->name = $name;
        $this->price = $price;
        $this->date = $date;
    }

    /**
     * @return array
     */
    public static function all()
    {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM product');

        foreach ($req->fetchAll() as $post) {
            $list[] = new Products(
                $post['id'],
                $post['category_id'],
                $post['name'],
                $post['price'],
                $post['date']
            );
        }
        return $list;
    }

    /**
     * @param $category_id
     * @return int
     */
    public static function countFindByCategoryId($category_id)
    {
        $db = Db::getInstance();
        $category_id = intval($category_id);
        $req = $db->prepare('SELECT * FROM product WHERE category_id = :category_id');
        $req->execute(['category_id' => $category_id]);
        $count = $req->rowCount();
        return $count;
    }

    /**
     * @param $category_id
     * @return array
     */
    public static function getProductsByIdCategory($category_id)
    {
        $list = [];
        $db = Db::getInstance();
        $category_id = intval($category_id);
        $req = $db->prepare('SELECT * FROM product WHERE category_id = :category_id');
        $req->execute(['category_id' => $category_id]);
        foreach ($req->fetchAll() as $post) {
            $list[] = new Products(
                $post['id'],
                $post['category_id'],
                $post['name'],
                $post['price'],
                $post['date']
            );
        }
        return $list;
    }

    /**
     * @param $category_id
     * @param $param
     * @return array
     */
    public static function getProductsWithParam($category_id, $param)
    {
        $filter = '';
        switch ($param) {
            case 'low-price':
                $filter = 'ORDER BY price';
                break;
            case 'alphabet':
                $filter = 'ORDER BY name ASC';
                break;
            case 'new-products':
                $filter = 'ORDER BY date DESC';
                break;
        }

        $list = [];
        $db = Db::getInstance();
        $category_id = intval($category_id);
        $req = $db->prepare('SELECT * FROM product WHERE category_id = :category_id ' . $filter);
        $req->execute(['category_id' => $category_id]);
        foreach ($req->fetchAll() as $post) {
            $list[] = new Products(
                $post['id'],
                $post['category_id'],
                $post['name'],
                $post['price'],
                $post['date']
            );
        }
        return $list;
    }

}
