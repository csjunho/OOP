<?php
$data = json_decode(file_get_contents('php://input'), true);
$content = $data["content"];

$connect = mysqli_connect("52.79.115.92","root","oop","cafeteria");
$date = date('w');
if(!$connect) {
    echo "MySQL Connection Error : ";
    echo mysqli_connect_error();
    exit();
}

mysqli_set_charset($connect,"utf8");

$sql="select * from weeklymenu";
$sql2 = "select * from foodcourt";
$result = mysqli_query($connect,$sql);
$result2 = mysqli_query($connect,$sql2);
$row2 = mysqli_fetch_row($result2);
if($result){

if($content == "학생정식")
{
echo <<< EOD
{
        "message": {
                "text" : "원하시는 메뉴를 선택해주세요."
                },
        "keyboard":{
                "type" : "buttons",
                "buttons" :[
                "아침",
		"토스트",
                "점심",
                "저녁"
                ]
        }

}

EOD;
}

else if($content == "한식")
{
$ro = str_replace('\r\n','\n',$row2[3]);
$ro = substr(json_encode($ro),1,-1);

echo <<< EOD
{
        "message":{
                "text" : "$ro"
                },
        "keyboard":{
                "type" : "buttons",
                "buttons" :[
                "학생정식",
                "한식",
                "중식",
                "양식",
                "밥버거"
                ]
        }
}
EOD;
}

else if($content == "중식")
{
$ro = str_replace('\r\n','\n',$row2[2]);
$ro = substr(json_encode($ro),1,-1);

echo <<< EOD
{
        "message":{
                "text" : "$ro"
                },
         "keyboard":{
                "type" : "buttons",
                "buttons" :[
                "학생정식",
                "한식",
                "중식",
                "양식",
                "밥버거"
                ]
        }
}
EOD;
}

else if($content == "양식")
{
$ro = str_replace('\r\n','\n',$row2[4]);
$ro = substr(json_encode($ro),1,-1);

echo <<< EOD
{
         "message":{
                "text" : "$ro"
                },

         "keyboard":{
                "type" : "buttons",
                "buttons" :[
                "학생정식",
                "한식",
                "중식",
                "양식",
                "밥버거"
                ]
        }
}
EOD;
}

else if($content == "밥버거")
{
$ro = str_replace('\r\n','\n',$row2[0]);
$ro = substr(json_encode($ro),1,-1);

echo <<< EOD
{
        "message":{
                "text" : "$ro"
        },
         "keyboard":{
                "type" : "buttons",
                "buttons" :[
                "학생정식",
                "한식",
                "중식",
                "양식",
                "밥버거"
                ]
        }
}
EOD;
}

else if($content == "토스트")
{
$row = mysqli_fetch_row($result);
$row = mysqli_fetch_row($result);
$ro = str_replace('\r\n','\n',$row[($date+6)%7]);
$ro = substr(json_encode($ro),1,-1);
echo <<< EOD
{
	"message":{
		"text" : "$ro"
	},
	"keyboard":{
		"type" : "buttons",
		"buttons" :[
		"학생정식",
		"한식",
		"중식",
		"양식",
		"밥버거"
		]	
	}
}
EOD;
}

else if($content == "아침")
{
$row = mysqli_fetch_row($result);
$ro = str_replace('\r\n','\n',$row[($date+6)%7]);
$ro = substr(json_encode($ro),1,-1);
echo <<< EOD
{
        "message":{
                "text" :"$ro"
        },
        "keyboard":{
                "type" : "buttons",
                "buttons" :[
                "학생정식",
                "한식",
                "중식",
                "양식",
                "밥버거"
                ]
        }
}
EOD;
}

else if($content == "점심")
{
$row = mysqli_fetch_row($result);
$row = mysqli_fetch_row($result);
$row = mysqli_fetch_row($result);
$ro = str_replace('\r\n','\n',$row[($date+6)%7]);
$ro = substr(json_encode($ro),1,-1);
echo <<< EOD
{
        "message":{
                "text" : "$ro"
        },
        "keyboard":{
                "type" : "buttons",
                "buttons" :[
                "학생정식",
                "한식",
                "중식",
                "양식",
                "밥버거"
                ]
        }
}
EOD;
}
else if($content == "저녁")
{
$row = mysqli_fetch_row($result);
$row = mysqli_fetch_row($result);
$row = mysqli_fetch_row($result);
$row = mysqli_fetch_row($result);
$ro = str_replace('\r\n','\n',$row[($date+6)%7]);
$ro = substr(json_encode($ro),1,-1);
echo <<< EOD
{
        "message":{
                "text" : "$ro"
        },
        "keyboard":{
                "type" : "buttons",
                "buttons" :[
                "학생정식",
                "한식",
                "중식",
                "양식",
                "밥버거"
                ]
        }
}
EOD;
}
}
else {
    echo "SQL 문 에러 발생 :";
    echo mysqli_error($link);
}
mysqli_close($connect);
?>

