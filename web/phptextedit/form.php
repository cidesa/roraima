<form action="processscript.php" method="post">
<textarea rows="25" cols="40" name="content">
<?
$fn = "/home/lhernandez/fuentes/cidesa/prod/config/databases.yml";
print htmlspecialchars(implode("",file($fn)));
?> 
</textarea><br>
<input type="submit" value="Change!"> 
</form>
