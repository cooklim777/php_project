<?php
/**
 * 強型別 or 弱型別
 * 空白在網頁中會自動被壓縮
 * php 的特殊字元 需使用跳脫字元
 */
// $lastMonthCost = 100;
// $thisMonthCost = 10;
// for ($i = 0; $i < 40; $i++) {
//     $thisMonthCost = 60 + $i * 2;
//     caculateCostGrowth($lastMonthCost, $thisMonthCost);
//     echo "\n";
// }
// caculateCostGrowth("text", 177);
caculateCostGrowth(100000, 95001);
echo "\n";
// caculateCostGrowth(100000, 1);
// echo "\n";
// caculateCostGrowth(200, 177);
// echo "\n";
// caculateCostGrowth(9999, 9999);
// echo "\n";
// caculateCostGrowth(1000, 12345);
function caculateCostGrowth($lastMonthCost, $thisMonthCost)
{
    if (!is_numeric($lastMonthCost) || !is_numeric($thisMonthCost)) {
        throw new Exception("請輸入數字！");
    }
    if ($lastMonthCost * $thisMonthCost < 0) {
        throw new Exception("怎麼會有負的費用！！");
    }

    if ($thisMonthCost === $lastMonthCost) {
        echo "   0.00%";
    } else {
        $rate = ($thisMonthCost - $lastMonthCost) / $lastMonthCost * 100;
        // format XXXX.YY%
        $formattedRate = number_format($rate, 2) . "%";
        // $formattedRate = (string) $formattedRate;
        $formattedRate = str_pad($formattedRate, 8, ' ', STR_PAD_LEFT);
        // $formattedRate = str_replace(' ', '&nbsp;', $formattedRate);
        $text = "";

        $rate = number_format($rate, 2);
        // echo $rate;
        // 例外處裡
        if ($rate >= 10000) {
            echo "花太多錢了吧 破表了！！！";
        }


        if ($rate >= 5) {
            $text = "(#`Д´)ﾉ";
        } elseif ($rate <= -5) {
            // $text = mb_convert_encoding(" (#`Д´)ﾉ", "UTF-8", "auto");
            $text = "(ゝ∀･)b";
        } else {
            $text = "^o^/";
        }
        echo "$formattedRate $text";
    }
}

?>