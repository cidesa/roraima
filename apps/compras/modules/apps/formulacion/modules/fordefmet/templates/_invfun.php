<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<? if ($fordefmet->getInvfun()=='I')  {
  ?><?php echo radiobutton_tag('fordefmet[invfun]', 'I', true)        ."InversiÃ³n".'&nbsp;&nbsp;';
          echo radiobutton_tag('fordefmet[invfun]', 'F', false)."   Funcionamiento";?>
    <?
}else{
  echo radiobutton_tag('fordefmet[invfun]', 'I', false)        ."InversiÃ³n".'&nbsp;&nbsp;';
  echo radiobutton_tag('fordefmet[invfun]', 'F', true)."   Funcionamiento";
} ?>