<?php $hay=Formulacion::movimientos();

 if($foringdefniv->getId()=='' and $hay == 0 )
 {
   echo radiobutton_tag('foringdefniv[asiper]', 'S', true,array('onClick' => '$("foringdefniv_numper").disabled=false'))        ."  Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
   echo radiobutton_tag('foringdefniv[asiper]', 'N', false,array('onClick' => '$("foringdefniv_numper").disabled=true'))."    No";
  }

 if($foringdefniv->getId()!='') //and $hay == 1)
 {
    if($foringdefniv->getAsiper()=='S')
    {
      echo radiobutton_tag('foringdefniv[asiper]', 'S', true,array('disabled' => true ))        ."  Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('foringdefniv[asiper]', 'N', false,array('disabled' => true ))."    No";
    }else{
      echo radiobutton_tag('foringdefniv[asiper]', 'S', false,array('disabled' => true ))        ."  Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('foringdefniv[asiper]', 'N', true,array('disabled' => true ))."    No";
    }
}
?>

