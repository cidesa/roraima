<table>
    <tr>
        <th>
            <h2 class="h2" onclick="javascript: return $('divCargos Presupuestados').toggle();"><?php echo __('Cargos Presupuestados') ?></h2>
            <fieldset id="sf_fieldset_cargos_presupuestados" class="">

            <div class="form-row" id="divCargos Presupuestados">
            <div id="divcanpres">

              <?php $value = get_partial('canpres', array('type' => 'edit', 'npcarpre' => $npcarpre,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>

            </div>
            <br/>
            </div>
            </fieldset>
        </th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>
            <h2 class="h2" onclick="javascript: return $('divCargos Asignados').toggle();"><?php echo __('Cargos Asignados') ?></h2>
                <fieldset id="sf_fieldset_cargos_asignados" class="">

                <div class="form-row" id="divCargos Asignados">
                <div id="divcanasig">

                  <?php $value = get_partial('canasig', array('type' => 'edit', 'npcarpre' => $npcarpre,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>

                </div>
                <br/>
                </div>
                </fieldset>
        </th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>
            <h2 class="h2" onclick="javascript: return $('divCargos Vacantes').toggle();"><?php echo __('Cargos Vacantes') ?></h2>
            <fieldset id="sf_fieldset_cargos_vacantes" class="">

            <div class="form-row" id="divCargos Vacantes">
            <div id="divcanvaca">
              
              <?php $value = get_partial('canvaca', array('type' => 'edit', 'npcarpre' => $npcarpre,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>

            </div>
            <br/>
            </div>
            </fieldset>
        </th>
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>
            <h2 class="h2" onclick="javascript: return $('divMontos de los Cargos').toggle();"><?php echo __('Montos de los Cargos') ?></h2>
            <fieldset id="sf_fieldset_montos_de_los_cargos" class="">

            <div class="form-row" id="divMontos de los Cargos">
            <div id="divmontos">

              <?php $value = get_partial('montos', array('type' => 'edit', 'npcarpre' => $npcarpre,'labels' => $labels,'params' => $params)); echo $value ? $value : '&nbsp;' ?>

            </div>
            <br/>
            </div>
            </fieldset>
        </th>
    </tr>
</table>