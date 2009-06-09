<?php

/**
 * Facaputip actions.
 *
 * @package    siga
 * @subpackage Facaputip
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class FacaputipActions extends autoFacaputipActions
{

  public function editing()
  {
	  $this->configGrid();
	  if ($this->fctipapu->getExoapu()=="N")
      {
        $this->fctipapu->setExoapu("");
      }

  }

  public function validateEdit()
  {
    $this->coderr =-1;
    $this->fctipapu = $this->getFctipapuOrCreate();
    $this->updateFctipapuFromRequest();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if ($this->getRequestParameter('id')=="")
      {
        $result=array();
        $sql = "SELECT anovig FROM fctipapu WHERE anovig ='".$this->getRequestParameter('fctipapu[anovig]')."' and tipapu='".$this->getRequestParameter('fctipapu[coduso]')."'";
        if (Herramientas::BuscarDatos($sql,&$result))
        {
          $this->coderr=701;
          return false;
        }
      }
     }
     return true;
  }

  public function deleting($fctipapu)
  {
   if ($fctipapu->getId()!="")
   {
	$c = new Criteria();
	$c->add(FctipapudetPeer::TIPAPU,$fctipapu->getTipapu());
	FctipapudetPeer::doDelete($c);
    $fctipapu->delete();
    return -1;
   }
  }


  public function configGrid($reg = array(),$regelim = array())
  {
    $c = new Criteria();
    $c->add(FctipapudetPeer::TIPAPU,$this->fctipapu->getTipapu());
    $per = FctipapudetPeer::doSelect($c);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facaputip/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->obj = $this->columnas[0]->getConfig($per);
    $this->fctipapu->setGrid($this->obj);
  }

  public function executeAjax()
  {
    $filas = array ();
    $simbolosrepetidos = array ("++","*+","/+","--","-+","*-","**","*/","//","/*","/-","+*","+/");
    $errorenformula=false;
    $formula = array ();
    $error="";
    $codigo = strtoupper($this->getRequestParameter('fctipapu[parapu]'));
    $fctipapu = $this->getRequestParameter('fctipapu');
	$this->fctipapu = $this->getFctipapuOrCreate();
	$this->getRequestParameter('ajax','');
    $this->updateFctipapuFromRequest();
	$this->configGrid();
	$grid = Herramientas::CargarDatosGridv2($this,$this->obj);

	//valido que las variables del grid esten en la formula
	$x=$grid[0];
    $j=0;
    while ($j<count($x))
    {
        if ($x[$j]->getTipvar()!="")
        {
           $filas[]=$x[$j]->getTipvar();
        }
	 $j++;
    }
    $cadena_modificada= str_replace("+","_",strtoupper($codigo));
    $cadena_modificada=str_replace("*","_",$cadena_modificada);
    $cadena_modificada=str_replace("-","_",$cadena_modificada);
    $cadena_modificada=str_replace("/","_",$cadena_modificada);
    $formula=explode("_", $cadena_modificada);
    $formula_sin_vacios = array_values(array_diff($formula, array('')));
    $j=0;
    while ($j<count($formula_sin_vacios))
    {
	   if (in_array($formula_sin_vacios[$j],$filas)) $errorenformula=false;
	   else
       {
	     $errorenformula=true;
	     break;
       }
	 $j++;
    }
    if ($errorenformula) $error="Variable  Desconocida, Verifique";
    else
    {
	    //Valido si hay signos repetidos
	   $x=0;
	   while ($x<=strlen($codigo))
	   {
	     $simbolo=substr($codigo,$x,2);
		 if (in_array($simbolo,$simbolosrepetidos))
	     {
			 $errorenformula=true;
		     break;
	     }
		 else $errorenformula=false;
	     $x++;
	   }
	   if ($errorenformula) $error="Signos Repetidos, Verifique";
	   else
       {
       	   //verifico si la cadena tiene solonumeros y letras
		   $buscarcaracter= str_replace("+","",strtoupper($codigo));
		   $buscarcaracter= str_replace("-","",strtoupper($buscarcaracter));
		   $buscarcaracter= str_replace("*","",strtoupper($buscarcaracter));
		   $buscarcaracter= str_replace("/","",strtoupper($buscarcaracter));
		   if (ereg("^[a-zA-Z0-9_]+$",$buscarcaracter)) $errorenformula=false;
		   else $errorenformula=true;
		   if ($errorenformula) $error="Caracter no permitido en formula, Verifique";
	   }
    }
    $javascript="alert('".$error."');";
    if ($errorenformula)
       $output = '[["javascript","'.$javascript.'",""],["","",""],["","",""]]';
    else
       $output = '[["","",""],["","",""],["","",""]]';

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $this->configGrid($grid[0],$grid[1]);
  }

  public function saving($fctipapu)
  {
    $fctipapu->save();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    Hacienda::salvar_grid_Fcaputip($fctipapu, $grid);
	return -1;
  }

  protected function updateFctipapuFromRequest()
  {
    $fctipapu = $this->getRequestParameter('fctipapu');

    if (isset($fctipapu['tipapu']))
    {
      $this->fctipapu->setTipapu($fctipapu['tipapu']);
    }
    if (isset($fctipapu['anovig']))
    {
      $this->fctipapu->setAnovig($fctipapu['anovig']);
    }
    if (isset($fctipapu['destip']))
    {
      $this->fctipapu->setDestip($fctipapu['destip']);
    }
    if (isset($fctipapu['unipar']))
    {
      $this->fctipapu->setUnipar($fctipapu['unipar']);
    }
    if (isset($fctipapu['frepar']))
    {
      $this->fctipapu->setFrepar($fctipapu['frepar']);
    }
    if (isset($fctipapu['parapu']))
    {
      $this->fctipapu->setParapu($fctipapu['parapu']);
    }
    if (isset($fctipapu['grid']))
    {
      $this->fctipapu->setGrid($fctipapu['grid']);
    }

    if (isset($fctipapu['tipapu']))
    {
      $this->fctipapu->setTipapu($fctipapu['tipapu']);
    }
    if (isset($fctipapu['anovig']))
    {
      $this->fctipapu->setAnovig($fctipapu['anovig']);
    }
    if (isset($fctipapu['destip']))
    {
      $this->fctipapu->setDestip($fctipapu['destip']);
    }
    if (isset($fctipapu['pormon']))
    {
      $this->fctipapu->setPormon($fctipapu['pormon']);
    }
    if (isset($fctipapu['alimon']))
    {
      $this->fctipapu->setAlimon($fctipapu['alimon']);
    }
    if (isset($fctipapu['statip']))
    {
      $this->fctipapu->setStatip($fctipapu['statip']);
    }
    if (isset($fctipapu['unipar']))
    {
      $this->fctipapu->setUnipar($fctipapu['unipar']);
    }
    if (isset($fctipapu['frepar']))
    {
      $this->fctipapu->setFrepar($fctipapu['frepar']);
    }
    if (isset($fctipapu['parapu']))
    {
      $this->fctipapu->setParapu($fctipapu['parapu']);
    }
    if (isset($fctipapu['exoapu']))
    {
      $this->fctipapu->setExoapu($fctipapu['exoapu']);
    }

    if (isset($fctipapu['tipapu']))
    {
      $this->fctipapu->setTipapu($fctipapu['tipapu']);
    }
    if (isset($fctipapu['anovig']))
    {
      $this->fctipapu->setAnovig($fctipapu['anovig']);
    }
    if (isset($fctipapu['destip']))
    {
      $this->fctipapu->setDestip($fctipapu['destip']);
    }

    $this->fctipapu->setPormon("P");

    if (isset($fctipapu['alimon']))
    {
      $this->fctipapu->setAlimon($fctipapu['alimon']);
    }
    if (isset($fctipapu['statip']))
    {
      $this->fctipapu->setStatip($fctipapu['statip']);
    }
    if (isset($fctipapu['unipar']))
    {
      $this->fctipapu->setUnipar($fctipapu['unipar']);
    }
    if (isset($fctipapu['frepar']))
    {
      $this->fctipapu->setFrepar($fctipapu['frepar']);
    }
    if (isset($fctipapu['parapu']))
    {
      $this->fctipapu->setParapu($fctipapu['parapu']);
    }
    if (isset($fctipapu['exoapu']))
    {
      $this->fctipapu->setExoapu("S");
    }
    else
    {
      $this->fctipapu->setExoapu("N");
    }

  }



}
