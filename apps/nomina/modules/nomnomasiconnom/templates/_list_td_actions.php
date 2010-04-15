<?php
/**
 * Funciones de la vista.
 *
 * @package    Roraima
 * @subpackage vistas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id$
 */
// date: 2008/01/09 11:11:08
?>
<td>
<ul class="sf_admin_td_actions">
  <li><?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('edit'))), 'nomnomasiconnom/edit?id='.$npasiconemp->getId().'&concepto='.$npasiconemp->getCodcon().'&nomina='.$npasiconemp->getCodnom()) ?></li>
  </ul>
</td>
