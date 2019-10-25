<?php
/***************************************************
 * 會員註冊行為：
 * 1.建立連線資料庫的參數
 * 2.判斷是否有送來表單資料
 * 3.建立所需的SQL語法
 * 4.將表單資料以變數形式填入SQL語法中
 * 5.執行資料庫連線並送出SQL語法
 * 6.判斷SQL語法是否執行成功，執行下一步
 ***************************************************/

echo $acc=$_POST['acc'];
echo "<br>";
echo $pw=$_POST['pw'];
echo "<br>";
echo $name=$_POST['name'];
echo "<br>";
echo $address=$_POST['address'];
echo "<br>";
echo $tel=$_POST['tel'];
echo "<br>";
echo $birthday=$_POST['birthday'];
echo "<br>";
echo $email=$_POST['email'];
echo "<br>";

//insert into user () values ();

$dsn="mysql:host=localhost;charset=utf8;dbname=mydb";
$pdo=new PDO($dsn, 'root', '1234');

$sql="insert into user (`acc`, `pw`, `name`, `address`, `tel`, `birthday`, `email`)
values('$acc','$pw','$name','$address','$tel','$birthday','$email')";

echo "sql語法是:".$sql;
// echo $pdo->query($sql); 

//$pod->exec($sql) 用在不需要回傳資料的情形下  例如:insert,delet,
//echo $pod->exec($sql);  // 1是表示成功 0則是失敗
//判斷是否成功新增；
if($pdo->exec($sql)){   //exec()結果只有0 or 1,u,也就是字串
    //echo "新增資料成功";
    header("location:index.php?s=1"); //header()內部為網址
}
else{
    //echo "新增資料失敗";
    header("location:reg.php?s=2");
}
?>