<?php
require 'hero.php';
continueGame($hero);
function continueGame($hero)
{
    echo "選擇你的角色";
    //串接DB原有角色

    echo "數字選擇 1.進到下一關 2.存擋 3.查看目前英雄能力：";
    $start = fgets(STDIN);
    if ($start == 1) {
        echo "進入 ($hero->stage+1)關";
    } else if ($start == 2) {
        // save();
    } else if ($start == 3) {
        $hero->printAttributes();
    } else {
        echo "請輸入1/2/3";
    }
}

?>