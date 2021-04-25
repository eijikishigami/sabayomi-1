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
            <form action="research.php" method="post">
                <div>
                    <p for="age" class="">あなたはいま何歳ですか？<small>※サバ読みOK！</small></p>
                    <span class="label-attach">満</span>
                    <select name="age" id="age" class="age">
                        <?php for ($i = 1; $i <= 100; $i++) {
                        if ($i == 20) {
                            echo "<option value='$i' selected>$i</option>";
                        } else {
                            echo "<option value='$i'>$i</option>";
                        }
                    } ?>
                    </select>
                    <span class="label-attach">歳</span>
                </div>
                <div class="mt-4">
                    <p>お誕生日はいつですか？</p>
                    <select name="month" id="month" class="month">
                        <?php for ($i = 1; $i <= 12; $i++) :
                        echo "<option value='$i'>$i</option>";
                    endfor; ?>
                    </select>
                    <span class="label-attach">月</span>
                    <select name="day" id="day" class="day">
                        <?php for ($i = 1; $i <= 31; $i++) :
                        echo "<option value='$i'>$i</option>";
                    endfor; ?>
                    </select>
                    <span class="label-attach">日</span>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn research" id="research" onclick="">しらべる</button>
                </div>
            </form>
            <div class="mt-5">
                <h1>サバ読みサポートとは？</h1>
                <p>
                    年齢を入力すると生年月日、干支、入学卒業の年などを割り出します。<br>
                    年齢のサバを読んだ時の「干支は何どし？」「何年に大学卒業した？」
                    といった煩わしい質問の回答をサポートします。<br>
                    <br>良いサバ読みライフを<i class="far fa-smile-wink"></i></p>
                </section>
            </div>
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