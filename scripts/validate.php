<?php 
/**
 * Script para crear el validator (edit.yml) en base al generator
 *
 * @package    Roraima
 * @subpackage scripts
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
?>


<?php

include('/usr/share/php/symfony/util/sfYaml.class.php');

function Error()
{
        echo "\n";
        echo "NOMBRE: \n";
        echo "        php - Invoca el php \n";
        echo "        validate.php \n";

        echo "\n";
        echo "SYNOPSIS: \n";
        echo "        php validate [app] [modulo]\n";

        echo "\n";
        echo "DESCRIPCION: \n";
        echo "        validate.php, Genera el archivo edit.yml \n";

        //echo "      Archivo_Origen ";
  //echo "       USO: php trimeador_script.php fuente.utf8.sql destino.utf8.sql \n";
        //echo "Informacion : php trimeador_script.php fuente.utf8.sql -i \n";
        echo "\n";

}


function Escribir($archivo, $cadena){
  fwrite($archivo, $cadena.chr(13).chr(10));
}

function getValidators(){

  $validators = array();
  $validators['Vunico'] = "
Vunico_%v3:
    class: sfPropelUniqueValidator
    param:
        class:        [clase]
        column:       [campo]
        unique_error: El registro ya Existe intente con otro.
";

  $validators['Vfechaperiodo'] = "
Vfechaperiodo_%v3:
    class: CidesaDateValidator
    param:
        class:        Cpdefniv
        columnmin:    fecini
        columnmax:    feccie
        min_error:    La Fecha Especificada no puede ser Menor a la Fecha de Inicio del Período
        max_error:    La Fecha Especificada no puede ser Mayor a la Fecha de Fin del Período
        date_error:   Fecha Inválida
";

  $validators['Vexista'] = "
Vexista_%v3:
    class: CidesaExistValidator
    param:
        class:        [clase]
        column:       [campo]
        unique_error: El Código del Proveedor debe Existir.
";

  $validators['Vstring'] = "
Vstring_%v1_%v2_%v3:
    class: sfStringValidator
    param:
        min:       %v1
        min_error: La descripción no puede tener menos de %v1 caracteres
        max:       %v2
        max_error: La descripción no puede pasar mas de %v2 caracteres
";


  $validators['Vdecimal'] = "
Vdecimal_%v3:
    class: sfNumberValidator
    param:
        type:         decimal
        type_error:   Por favor, Introduzca Números Decimales
        nan_error:    Por Favor, introduzca un Número Decimal
        min:          0.0
        min_error:    El valor tiene que ser mayor que cero
";


  $validators['Vfecha'] = "
Vfecha_%v3:
    class: sfRegexValidator
    param:
        match:      yes
        pattern:    /^(3[01]|2?[0-9]|1?[0-9]|0?[1-9]|[12]d)\/(0?[1-9]|1[012])\/(\d{4})$/
        match_error: La Fecha  introducida es invalida
";

  $validators['Vcorrelativo'] = "
Vcorrelativo_%v3:
    class: CidesaStringValidator
    param:
        values:    [ '/^[0-9]*$/' ]
";

  $validators['Vporcentaje'] = "
Vporcentaje_%v3:
    class: CidesaStringValidator
    param:
        values:    [ '/^(0*100{1,1}\,?((?<=\,)0*)?%?$)|(^0*\d{0,2}\,?((?<=\,)\d*)?%?)$/' ]
";

  $validators['Ventero'] = "
Ventero_%v3:
    class: CidesaStringValidator
    param:
        values:    [ '/^[0-9]*$/' ]
";

  return $validators;
}

if (($argc==3) && (($argv[1]!='') && ($argv[2]!=''))) {

  $generator = 'apps/'.$argv[1].'/modules/'.$argv[2].'/config/generator.yml';
  $edit_yml = 'apps/'.$argv[1].'/modules/'.$argv[2].'/validate/edit.yml';

  $config = sfYaml::load($generator);

  if($config){

    $displays = $config['generator']['param']['edit']['display'];
    $campos = array();
    foreach($displays as $kc => $c){
      if(is_array($c)){
        foreach($c as $c_){
          $campos[] = $c_;
        }
      }else{
        $campos[] = $c;
      }
    }
    $modelo = strtolower($config['generator']['param']['model_class']);
    $fields = $config['generator']['param']['fields'];

    $archivo = fopen($edit_yml,'w+');

    Escribir($archivo,"methods:");
    Escribir($archivo,"  post:");
    foreach($campos as $c){
      if(substr($c,0,1)!='_') Escribir($archivo,'   - "'.$modelo.'{'.$c.'}"');
    }

    Escribir($archivo,'');
    Escribir($archivo,'');
    Escribir($archivo,'names:');
    Escribir($archivo,'');
    $i = 0;
    foreach($campos as $c){
      if(substr($c,0,1)!='_'){
        Escribir($archivo,'  '.$modelo.'{'.$c.'}:');
        if($fields[$c]['validate']) Escribir($archivo,'    required:  Yes');
        else Escribir($archivo,'    required:  No');

        if($fields[$c]['msj_error']) $error = $fields[$c]['msj_error'];
        else $error = "Modificar Mensaje de Error!!!!!!!";

        Escribir($archivo,'    required_msg: '.$error);

        if($fields[$c]['validate']){
          $validate = $fields[$c]['validate'];
          Escribir($archivo,'    validators: '.$validate.'_'.$i);
        }

        Escribir($archivo,'');
        Escribir($archivo,'');
        $i++;
      }
    }

    $validators = getValidators();
    $i = 0;
    foreach($campos as $c){
      if(substr($c,0,1)!='_'){
        if($fields[$c]['validate']) $validate = $fields[$c]['validate'];
        else $validate = "ElValidator";

        if(strstr($validate,'Vstring')){
          $vals = explode('_',$validate);

          $cadena = str_replace('%v1',$vals[1],$validators['Vstring']);
          $cadena = str_replace('%v2',$vals[2],$cadena);
          $cadena = str_replace('%v3',$i,$cadena);
          Escribir($archivo,$cadena);
        }else{
          $cadena = str_replace('%v3',$i,$validators[$validate]);
          Escribir($archivo,$cadena);
        }

        Escribir($archivo,'');
        $i++;
      }
    }

    fclose($archivo);
  print("Archivo edit.yml creado\n");
  print("\n");

} else {
  Error();
}

}else{
  print "Archivo Generator no encotrado. ($generator)";
  print("\n");
}

?>