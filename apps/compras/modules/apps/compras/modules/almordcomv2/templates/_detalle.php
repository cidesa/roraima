
<div class="form-row">

  <div id="recargos" style="display:none">
    <fieldset id="sf_fieldset_none" class="">
      <div class="form-row">
        <?php
           echo input_hidden_tag('totartsinrec', '0');
           echo input_hidden_tag('actualfila', '0');
         ?>
        <div id="grid_recargo">
          <?
           echo grid_tag_v2($obj_recargos);
           ?>
        </div>
        <div align="center">
          <table>
            <tr>
              <th>
                <?php echo label_for('', __('Total'), 'class="required" Style="width:40px"') ?>
                <?php echo input_tag('totrecar', '0,00', 'size=14 class=grid_txtright readonly=true') ?>

              </th>
              <th>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              </th>
              <th>
                <div align="right">
                  <?php if ($caordcom->getOrdcom() == '') {  ?>
                    <?php echo link_to_function(image_tag('/images/salir.gif'), "salvarmontorecargos()") ?>
                  <?php } else if ($caordcom->getOrdcom() != '' && $caordcom->getCompro() == 'N') {  ?>
                    <?php echo link_to_function(image_tag('/images/salir.gif'), "salvarmontorecargos()") ?>
                  <?php } else { ?>
                    <?php echo link_to_function(image_tag('/images/salir.gif'), "$('recargos').hide();") ?>
                  <?php } ?>
                </div>
              </th>
            </tr>
          </table>
        </div>


      </div>
    </fieldset>
  </div>

  <? if ($caordcom->getOrdcom() == '' || ($caordcom->getOrdcom() != '' && $caordcom->getCompro() == 'N')) { ?>
    <div align="left" id="botonesmarcar">

      <fieldset> <legend><?php echo __('Aplicar recargo en lote a articulos seleccionados') ?></legend>
      <table>
        
        <tr>
        
          <th>
            <input type="button" name="Submit" value="Marcar" onClick="marcarTodo();"/>
          </th>
          <th>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </th>
          <th>
            <input type="button" name="Submit" value="Desmarcar" onClick="desmarcarTodo();"/>
          </th>
        
        </tr>
      </table>
      </fieldset>
    </div>
  <?php } else { ?>
    <div align="left" id="botonesmarcar">
    </div>
  <?php } ?>
    <div id="grid">
      <?php echo grid_tag_v2($obj); ?>
    </div>
    <table>
      <tr>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th><?php echo label_for('Totales', __('TOTALES'), 'class="required" ') ?></th>
        <th>&nbsp;&nbsp;</th>
        <th>
          <?php echo label_for('caordcom[totrecargo]', __($labels['caordcom{totrecargo}']), 'class="required"') ?>
          <div class="content<?php if ($sf_request->hasError('caordcom{totrecargo}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('caordcom{totrecargo}')): ?> <?php echo form_error('caordcom{totrecargo}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>

          <?php $value = object_input_tag($caordcom, array('getTotrecargo', true), array(
                                  'size' => 15,
                                  'readonly' => true,
                                  'class' => 'grid_txtright',
                                  'control_name' => 'caordcom[totrecargo]',
                              ));
                      echo $value ? $value : '&nbsp;' ?>
        </th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>
          <?php echo label_for('caordcom[totorden]', __($labels['caordcom{totorden}']), 'class="required"') ?>
          <div class="content<?php if ($sf_request->hasError('caordcom{totorden}')): ?> form-error<?php endif; ?>">
          <?php if ($sf_request->hasError('caordcom{totorden}')): ?>
            <?php echo form_error('caordcom{totorden}', array('class' => 'form-error-msg')) ?>
          <?php endif; ?>

          <?php $value = object_input_tag($caordcom, array('getTotorden', true), array(
                                            'size' => 15,
                                            'readonly' => true,
                                            'class' => 'grid_txtright',
                                            'control_name' => 'caordcom[totorden]',
                                        ));
                                echo $value ? $value : '&nbsp;' ?>
        </th>
      </tr>
    </table>
    <div id="div_recargo">
    </div>
</div>

