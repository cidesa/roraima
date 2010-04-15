<?php
/**
 * wait: este helper lo unico que hace es colocar el div que usan el js tools.js
 * para mostrar el mensaje "Cargando..." cuando se ejecuta un Ajax.
 * Este helper es llamado en todos los templates de cada aplicacion, de manera
 * que todos los formularios lo ejecutan.
 *
 * @package    Roraima
 * @subpackage helper
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
  function wait(){

    return '<div id="cargando" style="display:none" align="center" >'.image_tag('cargando.gif', '').__('Cargando....').'</div>';

  }

?>