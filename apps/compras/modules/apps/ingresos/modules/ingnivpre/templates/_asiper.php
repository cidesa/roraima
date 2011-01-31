<?php $hay=Ingresos::movimientos();

 if($cidefniv->getId()=='' and $hay == 0 )
 {
   echo radiobutton_tag('cidefniv[asiper]', 'S', true,array('onClick' => '$("cidefniv_numper").disabled=false'))        ."  Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
   echo radiobutton_tag('cidefniv[asiper]', 'N', false,array('onClick' => '$("cidefniv_numper").disabled=true'))."    No";
  }

 if($cidefniv->getId()!='') //and $hay == 1)
 {
    if($cidefniv->getAsiper()=='S')
    {
      echo radiobutton_tag('cidefniv[asiper]', 'S', true,array('disabled' => true ))        ."  Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('cidefniv[asiper]', 'N', false,array('disabled' => true ))."    No";
    }else{
      echo radiobutton_tag('cidefniv[asiper]', 'S', false,array('disabled' => true ))        ."  Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('cidefniv[asiper]', 'N', true,array('disabled' => true ))."    No";
    }
}
?>

