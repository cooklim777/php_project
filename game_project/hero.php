<?php
require 'character.php';

class Hero extends Character
{
    public function addAttribute($attribute)
    {
        if ($attribute == 1) {
            $this->physical_attack++;
            echo "增加物理攻擊";
        } elseif ($attribute == 2) {
            $this->magic_attack++;
            echo "增加魔法攻擊";
        } elseif ($attribute == 3) {
            $this->physical_defense++;
            echo "增加物理防禦";
        } elseif ($attribute == 4) {
            $this->magic_defense++;
            echo "增加魔法防禦";
        } elseif ($attribute == 5) {
            $this->luck++;
            echo "增加幸運";
        } else {
            echo "請輸入有效數字";
        }
    }
}

class Warrior extends Hero
{
    public $hp = 20;
    public $physical_attack = 5;
}
class Mage extends Hero
{
    public $magic_attack = 5;
}

?>
?>