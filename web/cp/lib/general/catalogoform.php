<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?
	require_once("../../lib/bd/basedatosAdo.php");
	$bd=new basedatosAdo();
	$campo=$_GET['campo'];
	$sql=$_GET['sql'];
	$tb=$bd->select($sql);
?>
<table width="300" border="0" align="center">
  <tr bgcolor="#000099"> 
    <td width="294"> <div align="center"><font face="Verdana, Arial, Helvetica, sans-serif"><strong><font color="#FFFFFF" size="2">Codigo</font></strong></font></div></td>
  </tr>
  <?
    while(!$tb->EOF){
  ?>
  <tr> 
    <td><div align="center"><font face="Verdana, Arial, Helvetica, sans-serif"><a href="javascript:aceptar('<? print $tb->fields["campo1"];?>')"> 
        <?= $tb->fields["campo1"];?>
      </a></font></div></td>
  </tr>
  <?
  	$tb->MoveNext();
   }
 ?>
</table>
</body>
<script language="JavaScript">
 function aceptar(c)
 {
   f=opener.document.form1;
   f.<? print $campo; ?>.value=c;
   close();
 }
</script>
</html>
