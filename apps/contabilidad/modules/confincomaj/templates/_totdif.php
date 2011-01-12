<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
  <?php $value = object_input_tag($contabc, 'getTotdif', array (
  'disabled' => false,
  'control_name' => 'contabc[totdif]',
  'readOnly' => true,
)); echo $value ? $value : '&nbsp;' ?>

<script language="Javascript">
  var ids='<?php echo $contabc->getId();?>';
  if (ids!="")
  {
    if ($('contabc_reftra').value!="") { $('divreftra').show(); }
    else { $('divreftra').hide(); }
    actualizarDiferencia();
  }else { $('divreftra').hide(); }

    function actualizarDiferencia(id)
    {
      var acumdeb=0;
      var acumcre=0;
      var am=obtener_filas_grid('a',1);

       var l=0;
       while (l<am)
       {
        var coldeb="ax_"+l+"_5";
        var colcre="ax_"+l+"_6";
        if ($(coldeb) && $(colcre))
        {
            if ($(coldeb).value!="")
            {
              var num1=toFloat(coldeb);
              if ($(coldeb).value!='0,00')
              {
                acumdeb= acumdeb + num1;
              }
              $(coldeb).value=format(num1.toFixed(2),'.',',','.');
            }

            if ($(colcre).value!="")
            {
              var num2=toFloat(colcre);
              if ($(colcre).value!='0,00')
              {
                acumcre= acumcre + num2;
              }
              $(colcre).value=format(num2.toFixed(2),'.',',','.');
            }
        }
        l++;
       }
      var diferencia= acumcre-acumdeb ;
      $('contabc_totdeb').value=format(acumdeb.toFixed(2),'.',',','.');
      $('contabc_totcre').value=format(acumcre.toFixed(2),'.',',','.');
      $('contabc_totdif').value=format(diferencia.toFixed(2),'.',',','.');

    }

</script>