<?php
if ($mensaje!="")
{
?>
      <script type="text/javascript">
            mens='<? print $mensaje; ?>';
            campo='<? print $campo; ?>';
            if(campo=='npantpre_monto')
            {
            	$(campo).value="0,00";
                alert(mens);
                $(campo).focus();
            }else
            {
            	$(campo).value="0";
                alert(mens);
                $(campo).focus();
            }

      </script>
<?php
}
?>