<!-- 開始遊戲 -->

<?php
require 'createHero.php';

echo "數字選擇 1.繼續 2.創建新角色 3.查看對戰紀錄：";
$start = fgets(STDIN);
if ($start == 1) {
    echo "你要選擇的角色是？";
    // continueGame($hero);
} else if ($start == 2) {
    createHero();
    continueGame($hero);
} else if ($start == 3) {
    echo "你要查看的對戰紀錄是？";
} else {
    echo "請輸入1,2,3";
}

?>