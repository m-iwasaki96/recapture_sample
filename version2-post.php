<?php
// recaptureの検証処理
define("RECAPTURE_SECRET", "6LcTBowpAAAAABihWByC_y89iJIDt5yjtrw50RHk");
$token = $_POST['g-recaptcha-response'];
$requestUrl = sprintf("https://www.google.com/recaptcha/api/siteverify?secret=%s&response=%s", RECAPTURE_SECRET, $token);
$response = file_get_contents($requestUrl);
$recaptureResult = json_decode($response);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if ($recaptureResult->success) : ?>
        <p>成功</p>
        <p>入力した文字：<?php echo $_POST['sample'] ?></p>
    <?php else : ?>
        <p>失敗</p>
    <?php endif ?>
    <p><a href="/recapture">戻る</a></p>
</body>

</html>