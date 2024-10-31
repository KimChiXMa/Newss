<?php
class item extends Db{
    public function getAllItem(){
        $sql = self::$connection -> prepare("SELECT * FROM item");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}