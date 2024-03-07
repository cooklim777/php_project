<html>

<head>
    <title>計算花費成長率</title>
</head>

<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div>上一期花費：</div>
        <input type="text" name="lastMonthCost">
        <div>這一期花費：</div>
        <input type="text" name="thisMonthCost">
        <input type="submit" name="submit" value="計算你的錢錢！！">
    </form>



    <?php
    /**
     * 強型別 or 弱型別
     * 空白在網頁中會自動被壓縮
     * php 的特殊字元 需使用跳脫字元
     */
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lastMonthCost = $_POST["lastMonthCost"];
        $thisMonthCost = $_POST["thisMonthCost"];

        if (is_numeric($lastMonthCost) && is_numeric($thisMonthCost)) {
            if ($thisMonthCost == $lastMonthCost) {
                echo "<div>&nbsp;&nbsp;&nbsp;0.00%</div>";
            } else {
                $rate = ($thisMonthCost - $lastMonthCost) / $lastMonthCost * 100;
                // format XXXX.YY%
                $formattedRate = number_format($rate, 2) . "%";
                // $formattedRate = (string) $formattedRate;
                $formattedRate = str_pad($formattedRate, 8, ' ', STR_PAD_LEFT);
                $formattedRate = str_replace(' ', '&nbsp;', $formattedRate);
                if ($rate > 0) {
                    $text = mb_convert_encoding(" (ゝ∀･)b", "UTF-8", "auto");
                    echo "<p>$formattedRate $text</p>";
                } else {
                    // $text = mb_convert_encoding(" (#`Д´)ﾉ", "UTF-8", "auto");
                    $text = " (#`Д´)ﾉ";
                    echo "<p>$formattedRate $text</p>";
                }
            }


        } else {
            echo "請輸入數字！";
        }
    }
    ?>
</body>

</html>