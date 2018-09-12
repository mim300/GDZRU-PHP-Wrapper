<?php
    global $resp;
    try {
        $resp = file_get_contents("http://gateway.resheba.biz".$_GET["url"]);
    } catch (Exception $e) {
        echo "Похоже, такого номера не существует";
        die();
    }
    $resp = json_decode($resp, true);
    global $title, $editions, $ytvid;
    if (!empty($resp["task"]["youtube_video_id"])) {
            $ytvid = '<h4>Видеорешение</h4><iframe width="600" height="460" src="https://www.youtube.com/embed/'.$resp["task"]["youtube_video_id"].'"></iframe>';
    } else $ytvid = "";
    $editions = $resp["editions"];
    $a = explode("/", $_GET["url"]);
    $curr = end($a);
    $urr = explode("/", $_GET["url"]);
    array_pop($urr);
    $urr = implode("/", $urr);
    if (strpos($curr, '-') !== false) {
        $a = explode("-", $curr);
        $curr = end($a);
        array_pop($a);
        $urr.="/";
        $urr.=implode("-", $a);
        $urr.="-";
    } else $urr .= "/";
    $curr = intval($curr);
    $prev = "location.href = 'showsol.php?url=".$urr.strval($curr - 1)."'";
    $next = "location.href = 'showsol.php?url=".$urr.strval($curr + 1)."'";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
    <link rel='stylesheet' type='text/css' href='https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="showbook.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>View solution</title>
</head>
<body bgcolor="#eee" style="text-align:center;padding: 16px;">
    <button onclick="<?=$prev?>" class="waves-effect waves-light btn"><i class="material-icons">arrow_back</i></button>
    <button onclick="<?=$next?>" class="waves-effect waves-light btn"><i class="material-icons">arrow_forward</i></button>
    <?php
        global $title, $editions, $ytvid;
        foreach ($editions as $edition) {
            echo "<h3>".$edition["title"]."</h3>";
            foreach ($edition["images"] as $image) {
                echo "<img style='width:100%' onclick='openImg(this)' src=".$image["url"].">";
            }
        }
        echo $ytvid;
    ?>
    <script>
    function openImg(el) {
        var width = window.innerWidth * 0.95;
        var height = window.innerHeight * 0.95;
        $("<div></div>").html('<iframe src="' + el.src+'" width="100%" height="99%" style="border:none;"></iframe>').dialog({draggable: false, resizable: false, width: width, height: height, modal: true, title: "Просмотр изображения", show: "fade", hide: 'puff', close: cleanup});
    }
    function cleanup() {
        $('.ui-dialog').remove();
    }
    </script>
</body>
</html>
