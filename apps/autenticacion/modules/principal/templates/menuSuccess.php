<?php use_helper('Javascript') ?>

<?php echo javascript_include_tag('tree.js') ?>
<?php echo javascript_include_tag('tree_items.js') ?>
<?php echo javascript_include_tag('tree_tpl.js') ?>

<table aling="center" >
<tr>
<table border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="6" valign="top"><?php echo image_tag('box02_tl.gif', 'size=6x6') ?></td>
    <td width="488" class="box02_tline"><?php echo image_tag('spacer.gif', 'size=5x5') ?></td>
    <td width="6" valign="top"><?php echo image_tag('box02_tr.gif', 'size=6x6') ?></td>
  </tr>
  <tr>
    <td class="box02_lline"><span class="box02_tline"><?php echo image_tag('spacer.gif', 'size=1x200') ?></span></td>
    <td valign="top" bgcolor="#FFFFFF" class="intd">
    <?php $menu = $sf_request->getParameter('m',''); ?>
    <?php if($menu=='compras') { ?>
	<?php echo javascript_tag("new tree (TREE_ITEMSCOM_ALM, tree_tpl);") ?>
	<?php } elseif($menu=='tesoreria') { ?>
	<?php echo javascript_tag("new tree (TREE_ITEMS_TER, tree_tpl);") ?>	
	<?php } elseif($menu=='nomina') { ?> 
	<?php echo javascript_tag("new tree (TREE_ITEMS_NOM, tree_tpl);"); ?>
	<?php } elseif($menu=='formulacion') { ?>
	<?php echo javascript_tag("new tree (TREE_ITEMSCOM_FOR, tree_tpl);");?>
    <?php } elseif($menu=='ingresos') { ?>
    <?php echo javascript_tag("new tree (TREE_ITEMS_ING, tree_tpl);");?> 
    <?php } elseif($menu=='obra') { ?>
    <?php echo javascript_tag("new tree (TREE_ITEMSCOM_OBR, tree_tpl);");?>
    <?php } elseif($menu=='bienes') { ?>
    <?php echo javascript_tag("new tree (TREE_ITEMSCOM_BIE, tree_tpl);");?> 
    <?php } elseif($menu=='hacienda') { ?> 
    <?php echo javascript_tag("new tree (TREE_ITEMSCOM_HAC, tree_tpl);");?>
    <?php } elseif($menu=='financiamiento') { ?> 
    <?php echo javascript_tag("new tree (TREE_ITEMSCOM_FINAN, tree_tpl);");?>
	<?php } elseif($menu=='documentos') { ?> 
    <?php echo javascript_tag("new tree (TREE_ITEMSCOM_DOCFINAN, tree_tpl);");?>
	<?php }?>
    
	</td>
    <td class="box02_rline">&nbsp;</td>
  </tr>
  <tr>
    <td valign="bottom"><?php echo image_tag('box02_bl.gif', 'size=6x6') ?></td>
    <td class="box02_bline"><?php echo image_tag('spacer.gif', 'size=5x5') ?></td>
    <td valign="bottom"><?php echo image_tag('box02_br.gif', 'size=6x6') ?></td>
  </tr>
</table>
</tr>
</table>

