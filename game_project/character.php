<?php
$hero = new Character('Gordom', 'age');
$value = array_values($hero->getAttributes());
echo implode(',', $value);
// 創造角色，有各種數值、擁有的技能、攻擊、施放魔法
class Character
{
    public $name;
    public $profession;
    public $hp = 10;
    public $mp = 10;
    public $physical_attack = 3;
    public $magic_attack = 3;
    public $physical_defense = 1;
    public $magic_defense = 1;
    public $luck = 0;
    public $level = 1;
    public $experience = 0;
    public $skillLibrary = [];
    public function __construct($name, $profession)
    {
        $this->name = $name;
        $this->profession = $profession;
    }
    public function getAttributes()
    {
        return [
            'Name' => $this->name,
            'Profession' => $this->profession,
            'HP' => $this->hp,
            'MP' => $this->mp,
            'Physical Attack' => $this->physical_attack,
            'Magic Attack' => $this->magic_attack,
            'Physical Defense' => $this->physical_defense,
            'Magic Defense' => $this->magic_defense,
            'Luck' => $this->luck,
            'Level' => $this->level,
            'Experience' => $this->experience,
            'Skill' => implode(', ', $this->skillLibrary)
        ];
    }

    public function printAttributes()
    {
        $attributes = $this->getAttributes();
        foreach ($attributes as $attribute => $value) {
            echo "{$attribute}: {$value}" . PHP_EOL;
        }
    }
    public function physical_attack()
    {
        return $this->physical_attack;
    }
    public function be_physical_attacked(int $damage)
    {
        $hp_decreased = $damage - $this->physical_attack;
        $this->hp -= $hp_decreased;
        return $hp_decreased;
        // echo "受到 $hp_decreased 傷害";
    }
}

