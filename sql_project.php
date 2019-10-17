<!DOCTYPE html>
<html>
<body>
<?php

//prob1

//connects to database

$link = mysql_connect('ecsmysql', 'cs332t25', 'ahnaibec');
if (!$link){
    die('could not connect: ' .mysql_error());
}
echo 'Connected successfully<p>';




//displays prof names and social numbers


mysql_select_db("cs332t25", $link);
$result=mysql_query("SELECT * FROM Professor", $link);

echo "PROFESSORS: ", "<br>", "<br>","<br>";

for($i=0; $i<mysql_numrows($result); $i++)
{
    echo"<br>";
    echo "SSN: ", mysql_result($result,$i,"ssn")," ";
    echo "NAME: ", mysql_result($result,$i,"name")," ";
}
?>

<!---- user input -->


<form action="index.php" method="post">

    Enter professor's social security number:<br>

    <input type="text" name="ssn">
    <input type="submit"/>
</form>
<?




//=======================================
//needs join mysql for class Title using foriegnkey
//==========================================


//displays info from query

mysql_select_db("cs332t25", $link);
$query = 'SELECT * FROM Section WHERE ssn='.$_POST["ssn"];
$result=mysql_query($query,$link);

for($i=0; $i<mysql_numrows($result); $i++)
{

    echo "\r\n";

    echo "Class room: ", mysql_result($result,$i,"room")," ";
    echo "Meeting days: ", mysql_result($result,$i,"day")," ";
    echo "Class starttime: ", mysql_result($result,$i,"begintime")," ";
    echo "Class endtime: ", mysql_result($result,$i,"endtime")," ";
    echo "<br>";

}
echo  "<br>", "<br>","<br>";

?>







<?

//prob2

// displays classes and sections



mysql_select_db("cs332t25", $link);
$result=mysql_query("SELECT * FROM Section", $link);


echo "COURSES AND SECTIONS: ", "<br>", "<br>","<br>";

for($i=0; $i<mysql_numrows($result); $i++)
{
    echo "Course: ", mysql_result($result,$i,"cnum")," ";
    echo "Section: ", mysql_result($result,$i,"snum")," ";
    echo "<br>";
}
?>


<!-- user input -->

<form action="index.php" method="post">

    Enter a course number:<br>

    <input type="text" name="cnum">
    <input type="submit"/>
    <br>
    Enter a section number:<br>

    <input type="text" name="snum">
    <input type="submit"/>
</form>






</body>
</html>