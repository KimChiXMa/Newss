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
}
