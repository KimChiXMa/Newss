<?php
class item extends Db
{
    public function getAllItem()
    {
        $sql = self::$connection->prepare("SELECT * FROM items");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getNewItem($start, $len)
    {
        $sql = self::$connection->prepare("SELECT * FROM items ORDER BY `created_at` DESC LIMIT ?,?");
        $sql->bind_param("ii", $start, $len);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getAllItemByCate($cateid)
    {
        $sql = self::$connection->prepare("SELECT * FROM items WHERE category = ?");
        $sql->bind_param("i", $cateid);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getItemByCate($cateid, $page, $count)
    {
        //tính số thứ tự trang bắt đầu
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT * FROM items WHERE category = ? LIMIT ?,?");
        $sql->bind_param("iii", $cateid, $start, $count);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
