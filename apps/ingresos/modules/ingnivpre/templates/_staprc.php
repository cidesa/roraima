<?php
 $hay=Ingresos::movimientos();

 if($cidefniv->getId()=='' and $hay == 0 ){
   echo radiobutton_tag('cidefniv[staprc]', 'S', true,array())        ."  Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
   echo radiobutton_tag('cidefniv[staprc]', 'N', false,array())."   No";
   }

 if($cidefniv->getId()!='' ) //and $hay == 1 )
 {
   if($cidefniv->getStaprc()=='S')
   {
      echo radiobutton_tag('cidefniv[staprc]', 'S', true,array('disabled' => true))        ."  Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('cidefniv[staprc]', 'N', false,array('disabled' => true))."   No";
   }else{
      echo radiobutton_tag('cidefniv[staprc]', 'S', false,array('disabled' => true))        ."  Si".'&nbsp;&nbsp;&nbsp;&nbsp;';
      echo radiobutton_tag('cidefniv[asiper]', 'N', true,array('disabled' => true))."   No";
   }
 }
 ?>