
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--
        <title>jquery日历-jQuery插件库</title>
     -->
    <!--<link rel="stylesheet" href=__PUBLIC__/Home/css/calendar.css" media="screen">-->
    <style type="text/css">
        .footer{margin-top:100px;text-align:center;color:#666;font:bold 14px Arial}
        .footer a{color:#999;text-decoration:none}
        #wrapper{padding: 50px 0 0 325px;}#calendar{margin:25px auto; width: 200px;}
        /* Reset */
        .ui-datepicker,
        .ui-datepicker table,
        .ui-datepicker tr,
        .ui-datepicker td,
        .ui-datepicker th {
            margin: 0;
            padding: 0;  border: none;  border-spacing: 0;  }
        /* Calendar Wrapper */
        .ui-datepicker {  display: none;  width: 294px;  padding: 15px;  cursor: default;
            text-transform: uppercase;  font-family: Tahoma;  font-size: 12px;  background: rgba(0, 0, 0, 0.24);  -webkit-border-radius: 3px;  -moz-border-radius: 3px;  border-radius: 3px;  }
        /* Calendar Header */
        .ui-datepicker-header {  position: relative;  padding-bottom: 10px;  border-bottom: 1px solid #d6d6d6;  }
        .ui-datepicker-title { text-align: center; }
        /* Month */
        .ui-datepicker-month {  position: relative;  padding-right: 15px;  color: #000;  }
        .ui-datepicker-month:before {  display: block;  position: absolute;  top: 5px;  right: 0;  width: 5px;  height: 5px;  content: '';
            background: #a5cd4e;
            background: -moz-linear-gradient(top, #a5cd4e 0%, #6b8f1a 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#a5cd4e), color-stop(100%,#6b8f1a));
            background: -webkit-linear-gradient(top, #a5cd4e 0%,#6b8f1a 100%);
            background: -o-linear-gradient(top, #a5cd4e 0%,#6b8f1a 100%);
            background: -ms-linear-gradient(top, #a5cd4e 0%,#6b8f1a 100%);
            background: linear-gradient(top, #a5cd4e 0%,#6b8f1a 100%);
            -webkit-border-radius: 5px;  -moz-border-radius: 5px;  border-radius: 5px;  }
        .ui-datepicker-prev span,
        .ui-datepicker-next span{  display: block;  width: 5px;  height: 10px;  text-indent: -9999px;  background-image: url(img/arrows.png);  }
        .ui-datepicker-prev span { background-position: 0px 0px; }
        .ui-datepicker-next span { background-position: -5px 0px; }
        .ui-datepicker-prev-hover span { background-position: 0px -10px; }
        .ui-datepicker-next-hover span { background-position: -5px -10px; }
        /* Calendar "Days" */
        .ui-datepicker-calendar th {  padding-top: 15px;  padding-bottom: 10px;  text-align: center;  font-weight: normal;  color: #000;  }
        .ui-datepicker-calendar td {  padding: 0 7px;  text-align: center;  line-height: 26px;  }
        .ui-datepicker-calendar .ui-state-default {  display: block;  width: 26px;  outline: none;  text-decoration: none;  color: #fff;  border: 1px solid transparent;}
        /* Day Active State*/
        .ui-datepicker-calendar .ui-state-active {color: #6a9113;border-color: #6a9113;}
        /* Other Months Days*/
        .ui-datepicker-other-month .ui-state-default { color: #565656; }
    </style>
</head>
<body>
<div id="calendar" style="width:200px;"></div>
    <?=\yii\helpers\Html::jsFile('@web/js/jquery-1.9.1.min.js')?>
    <?=\yii\helpers\Html::jsFile('@web/js/jquery-ui-datepicker.min.js')?>

    <script type="text/javascript">
        $('#calendar').datepicker({
            inline: true,
            firstDay: 1,
            showOtherMonths: true,
            dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
        });
    </script>
</body>
</html>