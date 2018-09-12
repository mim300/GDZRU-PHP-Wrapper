<?php
    global $index;
    $index = json_decode(file_get_contents("index.json"), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .spoiler > input + .box > blockquote{display: none;}.spoiler > input:checked + .box > blockquote{display: block;}.spoiler > input[type="checkbox"]{cursor: pointer;border-color:transparent!important;border-style:none!important;background:transparent none!important;position:relative;z-index:1;margin:-10px 0 -30px -230px;}.spoiler > input[type="checkbox"]:focus{outline:none;}.spoiler span.close,.spoiler span.open{padding-left:22px;color: #00f!important;text-decoration: underline;}.spoiler > input + .box > span.close{display: none;}.spoiler > input:checked + .box > span.close{background: url(http://st0.bbcorp.ru/img/minus.png) 4px 60% no-repeat;display: inline;}.spoiler > input:checked + .box > span.open{display: none;}.spoiler > input + .box > span.open{background: url(http://st0.bbcorp.ru/img/plus.png) 4px 60% no-repeat;display: inline;}.spoiler blockquote,.spoiler{padding:1em; border-radius:15px; -webkit-border-radius:15px; -khtml-border-radius:15px; -moz-border-radius:15px; -o-border-radius:15px; -ms-border-radius:15px;}.spoiler{overflow-x:hidden; box-shadow: 0px 3px 8px #808080; border:#E5E5E5 solid 2px; -webkit-box-shadow:0px 3px 8px #808080; -khtml-box-shadow:0px 3px 8px #808080; -moz-box-shadow:0px 3px 8px #808080; -ms-box-shadow:0px 3px 8px #808080;}.spoiler blockquote{margin-top:12px; min-height: 23px; border:#CDCDCD 2px dashed;}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TaizoGDZ</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body bgcolor="#eee" style="text-align:center;padding: 16px;">
    <p id="description"></p>
    <form action="show.php" method="post">
    <div class="input-field col s12">
        <select name="class">
            <option value="" disabled selected>Выберите класс</option>
            <?php
                global $index;
                $classes = $index["classes"];
                foreach ($classes as $class) {
                    echo "<option value=\"".$class["id"]."\">".$class["title"]." класс</option>";
                }
            ?>
        </select>
        <label>Выбор класса</label>
    </div>
    <div class="input-field col s12">
        <select name="subject">
            <option value="" disabled selected>Выберите предмет</option>
            <?php
                global $index;
                $subjects = $index["subjects"];
                foreach ($subjects as $subject) {
                    echo "<option value=\"".$subject["id"]."\">".$subject["title"]."</option>";
                }
            ?>
        </select>
        <label>Выбор класса</label>
    </div>
    <button class="btn waves-effect waves-light" type="submit">Показать
        <i class="material-icons right">send</i>
    </button>
    </form>
    <div id="additional"><p>Дополнительные ссылки:</p></div>
  <script>
  $(document).ready(function() {
        $('select').material_select();
        $.ajax({url: "config.json", success: function (data) {
                $('#description').html(data["description"]);
                document.title = data.title;
                if (typeof data.additional !== "undefined" && data.additional.length !== 0 && data.additional.hasOwnProperty(0)) {
                    $("#additional").append('<p>'+data.additional_note+'</p>');
                    for (var o in data.additional) {
                        var link = data.additional[o];
                        $("#additional").append('<p><span style="font-weight: 600">'+link.txt+'</span>: <a href="'+link.lnk+'">клик</a></p>');

                    }
                } else {
                    $("#additional").append('<p><small>(пусто)</small></p>');
                }
            }})
    });
  </script>
</body>
</html>
