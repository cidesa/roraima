<?php
if ($mensaje!="")
{
?>
      <script type="text/javascript">
            mens='<? print $mensaje; ?>';
            alert(mens);
            $('npvacdiadis_codnom').value="";
            $('npvacdiadis_nomnom').value="";
            $('npvacdiadis_codnom').focus();
      </script>
<?php
}
?>