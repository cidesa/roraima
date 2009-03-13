<?php
function grid_tag($obj,$objelim = array())
{
  $name=$obj["name"];
  $filas=$obj["filas"];
  $cabeza=$obj["cabeza"];
  $eliminar=$obj["eliminar"];
  $titulos=$obj["titulos"];
  $ancho=$obj["ancho"];
  $alignf=$obj["alignf"];
  $alignt=$obj["alignt"];
  $campos=$obj["campos"];
  $catalogos=$obj["catalogos"];
  $ajax=$obj["ajax"];
  $montos=$obj["montos"];
  $filatotal=$obj["filatotal"];
  $totales=$obj["totales"];
  $html=$obj["html"];
  $js=$obj["js"];
  $datos=$obj["datos"];
  $vacia=$obj["vacia"];
  $oculta=$obj["oculta"];
  $cuantos2=count($montos);
  $tiposobj= $obj["tiposobj"];
  $combo= $obj["combo"];
  $checkbox= $obj["checkbox"];
  $boton = $obj["boton"];
  $default = $obj["default"];
  $funcionajax = $obj["funcionajax"];

  $filas = 0;
  
  use_helper('PopUp','Javascript','Object','SubmitClick', 'Linktoapp');
  javascript_include_tag('tools');
  
  
  
  /////////////////
  // Inicio Grid //
  /////////////////
  $tag = ' <div id="gridout"> 
	<div class="grid" id="grid_'.$name.'">			
	             <table id="tabla_'.$name.'">
	             <thead><tr>';
  //////////////////////////////////////////////////////////////
  // Filas Eliminadas (para mantener estado luego del submit) //
  //////////////////////////////////////////////////////////////
  $val_elim = '';
  if(is_array($objelim)){
	foreach($objelim as $elim){
	  
	  try{
		if(is_object($elim)){
		  $getid = $elim->getId();
		}else{
		  $getid = $elim[0];	    
		}
	    $val_elim .= $getid.'-';	    
	  }catch(Exception $ex){
	    
	  }
 
    }
  }
  ///////////////////////////////////////////
  // Columna para Boton eliminar registros //
  ///////////////////////////////////////////
  if ($eliminar)
  {
    $tag .= '<th></th>';
  }
  $i=0;
  $tagciclo1='';
  $tagSelects='';
  //'.$anchos[$i].'

  
  /*  
        {
           header: "Name",
           dataIndex: 'tcol-0',
           width: 220,
           editor: new Ed(new fm.TextField({
               allowBlank: false
           }))
        }
*/  
  
  $ext_columns = '[';
  $ext_fields = '[';
    
  /////////////////////////////
  // Restos de las Columnas  //
  /////////////////////////////
  $prueba = 1;
  //while ($i<$prueba)  
  while ($i<count($titulos))
  {
    $ext_columns .= '{';
    
    $ext_columns .= "header: '".$titulos[$i]."',";
    
    $ext_columns .= "dataIndex: 'tcol-$i',";

    switch ($tiposobj[$i]){
    case 'f':
        $ext_columns .= 'width: 95,';
        $ext_columns .= 'renderer: formatDate,';
        $ext_columns .= "editor: new Ext.grid.GridEditor(new Ext.form.DateField({ 
              format: 'd/m/y' 
            }))";
        break;
    case 't':
        $ext_columns .= "width: 400,";
        $ext_columns .= "editor: new Ext.grid.GridEditor(new Ext.form.TextField({ 
              allowBlank: false 
            }))";
        break;
    case 'm':
        $ext_columns .= "width: 70,";
        $ext_columns .= "align: 'right',";
        $ext_columns .= "renderer: 'usMoney',";      
        $ext_columns .= "editor: new Ext.grid.GridEditor(new Ext.form.NumberField({ 
              allowBlank: false, 
              decimalSeparator : ',', 
              value : '0,00' 
            }))";
        break;
   case 'c':
        $ext_columns .= "width: 130,";     
        $ext_columns .= "editor: new Ext.grid.GridEditor(new Ext.form.ComboBox({
              typeAhead: true,
              triggerAction: 'all',
              transform:''combo$name_$i',
              lazyRender:true
            }))";
        break;              
    case 'k':
        $ext_columns .= "width: 55,";
        $ext_columns .= "renderer: formatBoolean,";      
        $ext_columns .= "editor: new Ext.grid.GridEditor(new Ext.form.Checkbox({
              checked: ".$checkbox[$i]."
            }))";
    }    
    
      ///////////////
      // Catalogos //
      ///////////////
      if ($catalogos[$i][0]!="") {
 	    $clase = $catalogos[$i][0];
 	    $frame = $catalogos[$i][1];
 	    $metodo = $catalogos[$i][2];
 	      	
 	    $url = cross_app_link_to('herramientas','catalogo').'/clase/'.$clase.'/frame/'.$frame;
 	    if($metodo<>'') $url .= '/metodo/'.$metodo;
       	if(is_array($catalogos[$i][3])){
 	      $p = 0;
          foreach($catalogos[$i][3] as $key => $obj){
            $p++;
            if(!is_numeric($key)){
              $url .= '/obj'.($p).'/'.$name.'x_'.$i.'_'.$obj.'/campo'.$p.'/'.$key;
            }else{
              $url .= '/obj'.($p).'/'.$name.'x_'.$i.'_'.$obj.'/campo'.$p.'/'.$campos[$i];
            }
          }
 	    }else {$url .= '/obj1/'.$name.'x_'.$i.'_'.$imasuno.'/campo'.$p.'/'.$campos[$i];}
 	      	
 	    $ext_columns .= "},{width: 50,";
        $ext_columns .= "editor: new Ext.grid.GridEditor(new Ext.Button({ 
            cls: 'x-btn-text-icon',
            iconCls: '$url', 
            text: '...',
            scope: clickCatalogo,
            handler: clickCatalogo
             }))";
 	  }else {
 	    $ext_columns .='';
 	  }
 	  
 	  ///////////
      // Boton //
      ///////////
      $btnobj = '';
      if($boton[$i] != ''){
        //$btnobj = button_tag_click('...',$boton[$i],array('name' => $name.'b_'.$i.'_'.$imasuno, 'html' => 'id="'.$name.'b_'.$i.'_'.$imasuno.'"'));
      }else $btnobj = '';
    
    if (!$oculta[$i]) {
      $tagfila = '<th>'.$titulos[$i].'</th>';
    }
    else {
      $tagfila ='';
    }
    
    $tagciclo1=$tagciclo1.$tagfila;
    $i++;
    
    //if($i==$prueba) $ext_columns .= '}';    
    if($i==count($titulos)) $ext_columns .= '}';
    else $ext_columns .= '},';
    
  }

  $tagb =	'</tr></thead>';

  /////////////////////
  // Cuerpo del Grid //
  /////////////////////
  $i=0;
  $contdatos=count($datos);
  $filas=$contdatos+$filas;
  $tagciclo2='';

  $tagb .= '<tbody>';
  
  while ($i<$contdatos){
    
    $tagf = '<tr>';
	if ($eliminar) {
	  $tagf .= '<td></td>';
	}
 	   
	$j=0;
	$acumtagw='';
    while ($j<count($campos)) {
      $jmasuno=$j+1;
 	  $campo=$campos[$j];

 	  ///////////////////////////////////////////////
      // Obteniendo datos a mostrar ($get, $getid) //
      ///////////////////////////////////////////////
 	  if (trim($campo)!="") {
        if (!$vacia[$j]) {
          if(!is_array($datos[$i])){
            $metodo = 'get'.$campo;
            switch ($tiposobj[$j]){
              case 'f':
                $get = $datos[$i]->$metodo('d/m/Y');
                break;
              case 'm':
                $get = $datos[$i]->$metodo(true);
                break;
              default:
                $get = $datos[$i]->$metodo();
            }
            $getid = $datos[$i]->getId();
          }else{
            if(array_key_exists(strtolower($campo),$datos[$i])) $get = $datos[$i][strtolower($campo)];
            else {
              switch ($tiposobj[$j]){
                case 'f':
                  $get = date('d/m/Y');
                  break;
                case 'm':
                  $get = '0,00';
                  break;
                default:
                  $get = 'No encontrado';
              }
            } 
            $getid = $datos[$i]['id'];
          }
 	    }
 	  }else {
        $get="";
        if(!is_array($datos[$i])){
          $getid = $datos[$i]->getId();
        }else{
          $getid = $datos[$i]['id'];
        }
 	  }

 	  if ($j==1) {
 	    $tagw ='     <td>'.$getid.'</td>';
 	  }else {
 	    //////////////////////////////////////////////////////////////////////////////////////////
 	    // Se crean los diferentes objetos para los diferentes tipos de datos a usar en el grid //
        //////////////////////////////////////////////////////////////////////////////////////////
 	    if (!$oculta[$j]) {
 	      if(is_array($html[$j])) $taghtml = implode(" ", $html[$j]);
 	      else  $taghtml = $html[$j];
 	      switch ($tiposobj[$j]){
 	        case 'f':
              $tagw ='     <td>';
              
              $tagw .= date("Y-m-d",strtotime($get));
              $tagw .= '</td>';
              break;
 	        case 't':
              $tagw = '     <td>';
              $tagw .= $get;
              $tagw .= '</td>';              
              break;
 	        case 'm':
              $tagw = '     <td>';
              $tagw .= $get;
              $tagw .= '</td>';                            
              break;
	        case 'c':
              $tagw = '     <td>';
              $tagw .= $get;
              $tagw .= '</td>';
              $tagSelects .= options_for_select('combo'.$name.'_'.$j,$combo[$j],$get);
              break;              
 	        case 'k':
              $tagw = '     <td>';
              $tagw .= $tagw .= $get;
              $tagw .= '</td>';
 	      }
 	    }else {
 	      $tagw ='';
 	    }
 	  }
      $acumtagw = $acumtagw.$tagw;
      $j++;
    } // while

    $tagf2=				'</tr>';


    
    if(!strpos($getid,$val_elim.'ZZ')) $tagciclo2 .= $tagf.$acumtagw.$tagf2;
	$i++;
  } // while

/*  
        {
           header: "Name",
           dataIndex: 'tcol-0',
           width: 220,
           editor: new Ed(new fm.TextField({
               allowBlank: false
           }))
        }
*/  
  
  $tag2='		             </tbody></table>
			             </div> </div>';                               
  
  $tagt = $tag.$tagciclo1.$tagb.$tagciclo2.$tag2;

  /////////////////////////////////////////////////////
  // Crear js con la configuración para el Grid EXT  //
  /////////////////////////////////////////////////////

  $ext_columns .= ']';
  $ext_fields .= ']';
  
  
  $js_ext = javascript_tag('

	Ext.onReady(function() {

		alert("Configuracion");
		configuracion = new Ext.grid.ColumnModel('.$ext_fields.','.$ext_fields.');
		alert("Crear Grid");
		var grid = new Ext.grid.TableGrid("tabla_'.$name.'",configuracion);
		grid.render(); 

    });

 ');
  
  return $tagt.$tagSelects.$js_ext;
}

?>

