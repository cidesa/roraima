<?php
if ($mensaje!="")
{
?>
      <script type="text/javascript">
            mens='<? print $mensaje; ?>';
            alert(mens);
            $('npdefpreliq_codnom').value="";
            $('npdefpreliq_nomnom').value="";
            $('npdefpreliq_codcon').value=""
            $('npdefpreliq_codnom').focus();
           
      </script>
<?php
}
?>