<!-- 開始遊戲 -->

<?php
require 'character.php';
echo "數字選擇 1.繼續 2.創建新角色 3.查看對戰紀錄：";
$start = fgets(STDIN);
if ($start == 1) {
    echo "你要選擇的角色是？";
} else if ($start == 2) {
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
} else if ($start == 3) {
    echo "你要查看的對戰紀錄是？";
} else {
    echo "請輸入1,2,3";
}

?>