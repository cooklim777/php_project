
<?php
    /**
     * 強型別 or 弱型別
     * 空白在網頁中會自動被壓縮
     * php 的特殊字元 需使用跳脫字元
     */
    $lastMonthCost = 100;
    $thisMonthCost = 300;

        if (is_numeric($lastMonthCost) && is_numeric($thisMonthCost)) {
            if ($thisMonthCost == $lastMonthCost) {
                echo "<div>&nbsp;&nbsp;&nbsp;0.00%</div>";
            } else {
                $rate = ($thisMonthCost - $lastMonthCost) / $lastMonthCost * 100;
                // format XXXX.YY%
                $formattedRate = number_format($rate, 2) . "%";
                // $formattedRate = (string) $formattedRate;
                $formattedRate = str_pad($formattedRate, 8, ' ', STR_PAD_LEFT);
                // $formattedRate = str_replace(' ', '&nbsp;', $formattedRate);
                if ($rate > 0) {
                    $text = mb_convert_encoding(" (ゝ∀･)b", "UTF-8", "auto");
                    echo "$formattedRate $text";
                } else {
                    // $text = mb_convert_encoding(" (#`Д´)ﾉ", "UTF-8", "auto");
                    $text = " (#`Д´)ﾉ";
                    echo "$formattedRate $text";
                }
            }


        } else {
            echo "請輸入數字！";
        }
    
    ?>