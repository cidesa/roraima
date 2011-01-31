<?php

?>

<?php use_helper('Grid') ?>

<?
//echo grid_tag_v2($obj);
?>

<?php include_partial('almajuoc/grid', array('obj' => $obj)) ?>

<? if ($mensaje!="")
{
?>
      <script type="text/javascript">
            mens='<? print $mensaje; ?>';
            alert(mens);
        </script>
<?php
}
?>