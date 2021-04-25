<?php
require_once('convertible-year.php');
require_once('culc-eto.php');

const ENTRY_JR_HI_SCL_YEAR_AGE = 13;
const GRADUATE_JR_HI_SCL_YEAR_AGE = 16;
const ENTRY_HI_SCL_YEAR_AGE = 16;
const GRADUATE_HI_SCL_YEAR_AGE = 19;
const ENTRY_UNIV_YEAR_AGE = 19;
const GRADUATE_UNIV_YEAR_AGE = 23;

$age = $_POST['age'];
$now = new DateTime('now');
// $now = new DateTime('2021-04-25');

$birth_month = $_POST['month'];
$birth_day = day_trim($birth_month, $_POST['day']);
$birth_year = new Convertible_Year(culc_year($now, $age, $birth_month, $birth_day, 0));
$eto = Culc_Eto::culc($birth_year->get_west())->get_name();
$entry_jr_hi_scl_year = new Convertible_Year(culc_school_year($now, $age, $birth_month, $birth_day, ENTRY_JR_HI_SCL_YEAR_AGE));
$graduate_jr_hi_scl_year = new Convertible_Year(culc_school_year($now, $age, $birth_month, $birth_day, GRADUATE_JR_HI_SCL_YEAR_AGE));
$entry_hi_scl_year = new Convertible_Year(culc_school_year($now, $age, $birth_month, $birth_day, ENTRY_HI_SCL_YEAR_AGE));
$graduate_hi_scl_year = new Convertible_Year(culc_school_year($now, $age, $birth_month, $birth_day, GRADUATE_HI_SCL_YEAR_AGE));
$entry_univ_year = new Convertible_Year(culc_school_year($now, $age, $birth_month, $birth_day, ENTRY_UNIV_YEAR_AGE));
$graduate_univ_year = new Convertible_Year(culc_school_year($now, $age, $birth_month, $birth_day, GRADUATE_UNIV_YEAR_AGE));
$school_grade = culc_school_grade($now, $age, $birth_month, $birth_day);
$society_history_hi_scl = culc_society_history($now, $age, $birth_month, $birth_day, GRADUATE_HI_SCL_YEAR_AGE); // 高卒社会人歴
$society_history_univ = culc_society_history($now, $age, $birth_month, $birth_day, GRADUATE_UNIV_YEAR_AGE); // 大卒社会人歴

function day_trim(int $month, int $day): int{
    switch ($month) {
        case 2:
            if ($day > 29) {
                return 28;
            }
            break;
        case 4:
        case 6:
        case 9:
        case 11:
            if ($day > 30)
            return 30;
            break;
    }
    return $day;
}

function culc_year(DateTime $now, int $now_age, int $birth_month, int $birth_day, int $culc_age): int {
    $now_year = $now->format('Y');
    $result = $now_year - ($now_age - $culc_age);
    $birth_md = ($birth_month * 100) + $birth_day;
    if ($now->format('md') < $birth_md) {
        $result -= 1;
    }
    return $result;
}

function is_leap_year($year): bool {
    return $year%4 == 0 && $year%100 != 0 || $year%400 == 0;
}

function is_illegal_date($year, $month, $day): bool {
    if ($month == 2 && $day == 29 && !is_leap_year($year)) {
        return true;
    }
    return false;
}

function culc_school_year(DateTime $now, int $now_age, int $birth_month, int $birth_day, int $culc_age): int {
    if (($birth_month * 100) + $birth_day <= 401) {
        // 誕生日が4月1日以前である場合
        $culc_year = culc_year($now, $now_age, $birth_month, $birth_day, $culc_age - 1);
    } else {
        $culc_year = culc_year($now, $now_age, $birth_month, $birth_day, $culc_age);
    }
    return $culc_year;
}

function culc_school_grade(DateTime $now, int $now_age, int $birth_month, int $birth_day): string {

    $now_md = $now->format('md');
    if ($now_md <= 401) {
        $now_md += 1200;    // 4月1日以前は繰り上げ。ex:3/25→15/25
    }
    $birth_md = ($birth_month * 100) + $birth_day;
    if ($birth_md <= 401) {
        $birth_md += 1200;    // 4月1日以前は繰り上げ。ex:3/25→15/25
    }
    if ($now_md < $birth_md) {
        // まだ誕生日がきていない場合
        $now_age++;
    }

    if ($now_age >= GRADUATE_UNIV_YEAR_AGE) {
        return '大学卒業以降';
    } else if ($now_age >= ENTRY_UNIV_YEAR_AGE) {
        $school_name = '大学';
        $school_grade = $now_age - ENTRY_UNIV_YEAR_AGE + 1;
    } else if ($now_age >= ENTRY_HI_SCL_YEAR_AGE) {
        $school_name = '高校';
        $school_grade = $now_age - ENTRY_HI_SCL_YEAR_AGE + 1;
    } else if ($now_age >= ENTRY_JR_HI_SCL_YEAR_AGE) {
        $school_name = '中学';
        $school_grade = $now_age - ENTRY_JR_HI_SCL_YEAR_AGE + 1;
    } else {
        return '小学校卒業以前';
    }

    return $school_name . $school_grade . '年生';
}

function culc_society_history(DateTime $now, int $now_age, int $birth_month, int $birth_day, $graduate_age): string {
    $now_md = $now->format('md');
    if ($now_md <= 401) {
        $now_md += 1200;    // 4月1日以前は繰り上げ。ex:3/25→15/25
    }
    $birth_md = ($birth_month * 100) + $birth_day;
    if ($birth_md <= 401) {
        $birth_md += 1200;    // 4月1日以前は繰り上げ。ex:3/25→15/25
    }
    if ($now_md < $birth_md) {
        // まだ誕生日がきていない場合
        $now_age++;
    }

    if ($now_age < $graduate_age) {
        return '卒業以前';
    } else {
        $society_year = $now_age - $graduate_age + 1;
    }

    return '社会人' . $society_year . '年目';
}

?>

<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/b8a7fea4d4.js"></script>
    <title>年齢から生年月日、干支、入学年、卒業年など計算|年齢サバ読みサポート</title>
</head>

<body>
    <header>
        <div class="container">
            <h1 class="page-title">年齢サバ読みサポート</h1>
            <p class="page-desc">年齢を入力すると生年月日、干支、入学卒業の年などを割り出します</p>
        </div>
    </header>
    <main>
        <div class="container">
            <div>
                <p>
                    <?php
                        echo $now->format('Y年m月d日'), "現在</br>";
                        echo "あなたが{$age}歳({$birth_month}月{$birth_day}日生まれ)だとすると、、、";
                    ?>
                </p>
                <?php
                    if (is_illegal_date($birth_year->get_west(), $birth_month, $birth_day)) {
                        echo "<p class='error'>誕生日が正しくありません！</p>";
                    }
                ?>
            </div>
            <div>
                <h1>生まれ年</h1>
                <p class="answer">
                    <?php
                        echo "{$birth_year->get_west()}年({$birth_year->get_jp()})生まれ。{$eto}どし。";
                    ?>
                </p>
            </div>
            <div>
                <h1>現在の学年</h1>
                <p><?php echo $school_grade; ?></p>
            </div>
            <div>
                <h1>現在の社会人歴</h1>
                <div>
                    <p>高卒の場合、<?php echo $society_history_hi_scl ?></p>
                    <p>大卒(現役卒業)の場合、<?php echo $society_history_univ ?></p>
                </div>
            </div>
            <div>
                <h1>入学・卒業年月</h1>
            </div>
            <div>
                <h2>中学入学</h2>
                <p>
                    <?php
                        echo "{$entry_jr_hi_scl_year->get_west()}年({$entry_jr_hi_scl_year->get_jp()})4月入学";
                    ?>
                </p>
            </div>
            <div>
                <h2>中学卒業</h2>
                <p>
                    <?php
                        echo "{$graduate_jr_hi_scl_year->get_west()}年({$graduate_jr_hi_scl_year->get_jp()})3月卒業";
                    ?>
                </p>
            </div>
            <div>
                <h2>高校入学</h2>
                <p>
                    <?php
                        echo "{$entry_hi_scl_year->get_west()}年({$entry_hi_scl_year->get_jp()})4月入学";
                    ?>
                </p>
            </div>
            <div>
                <h2>高校卒業</h2>
                <p>
                    <?php
                        echo "{$graduate_hi_scl_year->get_west()}年({$graduate_hi_scl_year->get_jp()})3月卒業";
                    ?>
                </p>
            </div>
            <div>
                <h2>大学入学</h2>
                <p>
                    <?php
                        echo "{$entry_univ_year->get_west()}年({$entry_univ_year->get_jp()})4月入学";
                    ?>
                </p>
            </div>
            <div>
                <h2>大学卒業(4年制)</h2>
                <p>
                    <?php
                        echo "{$graduate_univ_year->get_west()}年({$graduate_univ_year->get_jp()})3月卒業";
                    ?>
                </p>
            </div>
            <div id="page_back"><a href="#" onclick="history.back()"></a></div>
            <div id="page_top"><a href="#"></a></div>
        </div>
    </main>
    <footer>
        <p class="copy-right">©︎ 2021 ESE</p>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>