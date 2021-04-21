<?php
require_once('convertible-year.php');

$age = $_POST['age'];
$now = new DateTime('now');
$birth_month = $_POST['month'];
$birth_day = $_POST['day'];
$birth_year = new Convertible_Year(culc_year($now, $age, $birth_month, $birth_day, 0));

function culc_year($now, $now_age, $birth_month, $birth_day, $culc_age) {
    $now_year = $now->format('Y');
    $result = $now_year - ($now_age - $culc_age);
    $birth_md = ($birth_month * 100) + $birth_day;
    if ($now->format('md') < $birth_md) {
        $result -= 1;
    }
    return $result;
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
        <h1 class="page-title">年齢サバ読みサポート</h1>
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
            </div>
            <div>
                <h1>生まれ年</h1>
                <p>
                    <?php
                        echo "{$birth_year->get_west()}年({$birth_year->get_jp()})生まれ";
                    ?>
                </p>
            </div>
            <div>
                <h1>現在の学年</h1>
                <p>高校3年生</p>
            </div>
            <div>
                <h1>現在の社会人歴</h1>
                <p>高卒の場合、社会人０年目</p>
                <p>大卒(現役卒業)の場合、社会人０年目</p>
            </div>
            <div>
                <h1>入学・卒業年月</h1>
            </div>
            <div>
                <h2>中学入学</h2>
                <p>2016年(平成28年)4月入学</p>
            </div>
            <div>
                <h2>中学卒業</h2>
                <p>2019年(平成31年)3月卒業</p>
            </div>
            <div>
                <h2>高校入学</h2>
                <p>2019年(平成31年)4月入学</p>
            </div>
            <div>
                <h2>高校卒業</h2>
                <p>2022年(令和4年)3月卒業</p>
            </div>
            <div>
                <h2>大学入学(現役)</h2>
                <p>2022年(令和4年)4月入学</p>
            </div>
            <div>
                <h2>大学卒業(4年制・現役)</h2>
                <p>2026年(令和8年)3月卒業</p>
            </div>
        </div>
    </main>
    <footer>
    </footer>
    <div id="page_top"><a href="#"></a></div>

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