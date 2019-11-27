<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
    </head>
    <body>
      <div id="app">
        <p v-html="message"></p>
      </div>
      <script type="text/javascript">
      var app = new Vue({
        el: '#app',
        data: {
        message: '<?php
              $mysqli = new mysqli("localhost","root","crayon25","player");
              if($mysqli->connect_errno)
                die("無法建立資料連接:".$mysqli->connect_error);
            
              $mysqli->query("SET NAMES utf8");
              $result = $mysqli->query("SELECT * FROM score");
              $LAPt=0;
              $LA2PtM=0;
              $LA3PtM=0;
              $LAFtM=0;
              $RAPt=0;
              $RA2PtM=0;
              $RA3PtM=0;
              $RAFtM=0;
              
              
              echo"<table border ='1'align='center'><tr align='center'>";
              while($field = $result->fetch_field())
                if($field->name != "ID")
                echo"<td>".$field->name."</td>";
              echo"</tr>";
            
              while($row = $result->fetch_row()){
                echo"<tr>";
                  for($i = 1;$i<$result->field_count;$i++){
                    if($row[1] === "GSW"){
                      echo"<td>".$row[$i]."</td>";
                      $LA2PtM=$LA2PtM+$row[3];
                      $LA3PtM=$LA3PtM+$row[5];
                      $LAFtM=$LAFtM+$row[7];
                    }
                  }
                echo"</tr>";
              }
              echo"</table><br>";
              $LAPt=($LA2PtM*2+$LA3PtM*3+$LAFtM)/15;
              echo "總分:$LAPt";
          ?>'
        }
      })
      </script>
    </body>
</html>
