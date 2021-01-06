<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_shopping";

try{
    $conn= new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO product (description,price,cat_id,quantity,picture) VALUES 
    ('ARIES WOMAN Tshirts And Hoodies',80,
    5,150,'C:/Users/ME/Desktop/p/course/Final project../images/Tshirts/t1.jpg'),

    ('Printed woman TShirt',100,
    5,300,'C:/Users/ME/Desktop/p/course/Final project../images/Tshirts/t2.jpg'),

    ('PullDog Printed Tshirt',150,
    5,200,'C:/Users/ME/Desktop/p/course/Final project../images/Tshirts/t3.jpg'),

    ('HALLOWEEN PRINTED WOMAN TSHIRTS',50,
    5,250,'C:/Users/ME/Desktop/p/course/Final project../images/Tshirts/t4.jpg')";
    $conn -> exec($sql);
    echo "INSERTED d5 successfully"; 

}
catch(PDOException $e){
    echo "connection Failed" .$e->getMessage();
}
?>