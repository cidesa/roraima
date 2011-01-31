<?php
if ($mensaje!="")
{
?>
      <script type="text/javascript">
            mens='<? print $mensaje; ?>';
            alert(mens);
            $('npasicarnom_codnom').value="";
            $('npasicarnom_nomnom').value="";
            $('npasicarnom_codnom').focus();
      </script>
<?php
}
?>