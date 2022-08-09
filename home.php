<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>hamo</title>
</head>
<body dir='rtl'>
    <?php
    #الاتصال مع قواعد البيانات 
    $host='localhost';
    $user='root';
    $pass='';
    $db='student';
    $con= mysqli_connect($host,$user,$pass,$db);
    $res= mysqli_query($con,"select * from student");
    # buttons variables
    $id='';
    $name='';
    $adress='';
    if(isset($_POST['id'])) {
        $id= $_POST['id'];
    } 
    
    if(isset($_POST['adress'])){
        $adress=$_POST['adress'];
    }
    $sqls='';
    if(isset($_POST['add'])){
        $sqls = "insert into student value($id,'$name','$adress')";
        mysqli_query($con,$sqls);
        header("location: home.php");
    }
    if(isset($_POST['del'])){
        $sqls = "delete from student where name='$name'";
        mysqli_query($con,$sqls);
        header("location: home.php");
    }
    ?>
    <div id='mother'>
        <form method="post">
            <!-- لوحة التحكم -->
            <aside>
                <div id="div">
                    <img src="https://th.bing.com/th/id/OIP.GMnWU99pmgkjVzn74sPdgAHaHa?w=219&h=219&c=7&r=0&o=5&pid=1.7" alt="لوجو الموقع" width= "100px";>
                    <h3>لوحة المدير</h3>
                    <label>رقم الطالب:</label><br>
                    <input type="text" name='id' id="id"><br>
                    <label>اسم الطالب :</label><br>
                    <input type="text" name="name" id="name"><br>
                    <label>عنوان الطالب :</label><br>
                    <input type="text" name="adress" id="adress"><br><br>
                    <button name="add">اضافة الطالب</button>
                    <button name="de">حذف الطالب</button>
                </div>
            </aside>
             <!-- عرض بيانات الطلاب  -->
                <main>
                    <table id="tbl">
                        <tr>
                            <th>الرقم التسلسلي</th>
                            <th> اسم الطالب </th>
                            <th>عنوان الطالب </th>
                        </tr>
                        <?php
                        while ($row = mysqli_fetch_array($res)) {
                            echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['adress']."</td>";
                            echo "</tr>";
                        }
                        ?>
                    </table>
                </main>
        </form>
    </div>
</body>
</html>