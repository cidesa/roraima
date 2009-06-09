<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date', 'Catalogo') ?>
<?php
$msg='';
$msg2='';
if ($fcsollic->getId()!='')
{
	if ($fcsollic->getStasol()=='A')
	{
		$msg="APROBADA";
		if ($fcsollic->getStalic()=='V') $msg2="VIGENTE";
		else
		{
	      if ($fcsollic->getStalic()=='E') $msg2="VENCIDA";
		  elseif ($fcsollic->getStalic()=='C') $msg2="CANCELADA";
		  elseif ($fcsollic->getStalic()=='S') $msg2="SUSPENDIDA";
		}
	}
	else $msg="NEGADA";
?>

<div id="estado" style="color:#E06C6C;">
<?php echo "<strong>".$msg."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$msg2."</strong>"; ?>
</div>
<?php
}
