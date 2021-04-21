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
        <p class="page-desc">年齢を入力すると生年月日、干支、入学卒業の年などを割り出します</p>
    </header>
    <main>
        <div class="container">
            <div>
                <p for="age" class="">あなたはいま何歳ですか？<small>※サバ読みOK！</small></p>
                <div class="input-block">
                    <span class="label-attach">満</span>
                    <input type="number" name="age" id="age">
                    <span class="label-attach">歳</span>
                </div>
            </div>
            <div class="mt-4">
                <p>お誕生日はいつですか？</p>
                <input type="number" name="month" id="month">月
                <input type="number" name="day" id="day">日
            </div>
            <div class="mt-4">
                <button class="btn">しらべる</button>
            </div>
            <div class="mt-5">
                <h1>サバ読みサポートとは？</h1>
                <p>
                    年齢を入力すると生年月日、干支、入学卒業の年などを割り出します。<br>
                    年齢のサバを読んだ時の<br>
                    「干支は何どし？」<br>
                    「何年から社会人？」<br>
                    などの質問の回答をサポートします。
                    素晴らしいサバ読みライフを。</p>
                </section>
            </div>
        </div>
    </main>
    <footer>
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