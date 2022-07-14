<html>
    <head>
        <title>PNR STATUS</title>
        <style type="text/css">
            @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css");
            *{
                margin: 0;
                padding: 0;
            }
            body{
                background-image: url(train2.jpg);
                background-position: center;
                background-size: cover;
                font-family: 'Montserrat', sans-serif;
                font-weight: 700;
                letter-spacing: 1.4px;
            }
            ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color:orange;
                text-align: right;
            }
            li {
              float: left;
              padding:10px 30px;
            }
            li a {
              display: block;
              color: white;
              text-align: center;
              padding: 10px 60px;
              text-decoration: none;
             }
             li a:hover {
               background-color: #111111;
             }
            .main{
                padding: 55px 50px;
                width: 350px;
                background-color: rgba(0,0,0,0.3);
                /*margin: auto;*/
                
                margin-left: 500px;
                margin-top: 60px;
                color: #FFFFFF;
                /*padding: 10px 0px 10px 0px;*/
                text-align: center;
                border-radius: 20px;


        }
        form{
            padding: 10px;
           text-align: center;
        }
        #name{
            width: 100%;
            height: 100px;
        }
        .name{
            margin-left: 25px;
            margin-top: 30px;
            color: white;
            font-size: 18px;
            font-weight: 700;
            
        }
        .main h1{
            text-align: center;
            color: whitesmoke;
            width: 320px;
            margin-left: 5px;
        }
        .PNR{
            width:60%;
            padding:10px 10px;
            margin:5px 0;
            margin-right: 35px;
            border-left: 0;
            border-top: 0;
            border-right: 30px;
            border-bottom: 0px solid #999;
            outline:none;
        }
        #submit{
            height: 35px;
            width: 100px;
            margin-right: 40px;
            color: cornsilk;
            background-color: coral;
            border-radius: 15px;
        }
        #submit:hover{
            cursor: pointer;
            color: black;
            background-color: lavenderblush;
        }
            </style>
    </head>
    <body>
        <ul id='Main Menu'>
            <li><a href="home.php" target="_self">Home</a></li>
            <li><a href="pnr.php" target="_blank">PNR Status</a></li>
            <li><a href="book.php" target="_blank">Book Your Seat</a></li>
            <li><a href="contact.php" target="_blank">Contact Us</a></li>
	    <li><a href="logout.php" target="_blank">Logout</a></li>
        </ul>
        <br>
        <div class="main"> 
            <form >
                <div><h1>PNR STATUS</h1></div>
                <div class="name">
                    <input class="PNR" type="search" name="pnr" placeholder="PNR NUMBER" required><br><br>
                    <input id = "submit" type="submit" SUBMIT>
                    </div>
            </form>
    </body>
</html>
<?php

$search = $_POST['pnr'];

$servername = "localhost";
$username = "root";
$password = "";
$db = "railway";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from pnr where trainnumber like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo $row["trainname"]."  ".$row["trainnumber"]."  ".$row["route"]."<br>";
	
}
} else {
	echo "0 records";
}

$conn->close();

?>
                   