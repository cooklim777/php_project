<?php
require 'hero.php';
require 'mysql.php';
// createHero();

function createHero()
{
    echo "請輸入新創的角色名稱：";
    $name = fgets(STDIN);
    $profession = "";
    while ($profession !== "warrior" && $profession !== "mage") {
        echo "請輸入職業名稱(warrior/mage)：";
        $profession = trim(fgets(STDIN));
        echo $profession;
    }
    if ($profession === "warrior")
        $hero = new Warrior($name, $profession);
    elseif ($profession === "mage")
        $hero = new Mage($name, $profession);
    $hero->printAttributes();

    echo "你有10點點數可以加點，選擇加點";
    for ($i = 0; $i < 10; $i++) {
        echo "1.物理攻擊 2.魔法攻擊 3.物理防禦 4.魔法防禦 5.幸運";
        $add = fgets(STDIN);
        $hero->addAttribute($add);
    }
    $hero->printAttributes();

    $hp = $hero->hp;
    $mp = $hero->mp;
    $physical_attack = $hero->physical_attack;
    $magic_attack = $hero->magic_attack;
    $physical_defense = $hero->physical_defense;
    $magic_defense = $hero->magic_defense;
    $luck = $hero->luck;
    $skill = "Slash";
    $stage = $hero->stage;

    // $value = array_values($hero->getAttributes());
    // echo implode(',', $value);

    $sql = "INSERT INTO hero (name, Profession, HP, MP, Physical_Attack, Magic_Attack, Physical_Defense, Magic_Defense, Luck, Skill, Stage)
VALUES ('$name', '$profession', $hp, $mp, $physical_attack, $magic_attack, $physical_defense, $magic_defense, $luck, '$skill', $stage)";


    global $dblink;
    // 用mysqli_query方法執行(sql語法)將結果存在變數中
    $result = mysqli_query($dblink, $sql);
    $dblink->close();

}
?>