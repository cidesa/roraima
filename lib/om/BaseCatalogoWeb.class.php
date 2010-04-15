<?php
/**
 * BaseCatalogoWeb: Clase para la generación de catalogos
 *
 * @package    Roraima
 * @subpackage cidesa
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class BaseCatalogoWeb
{


  protected $maxlista = 10;
  protected $columnas;
  protected $pager;
  protected $mapa_tabla;
  protected $opciones;
  protected $clase = '';
  protected $metodo = '';
  protected $metodoPeer;
  protected $c;
  protected $filters;

  public function BaseCatalogoWeb()
  {
    $this->maxlista = 10;
  }


  /*
   * Construye la información necesaria del catálogo
   *
   * @param array $fdatos Contiene 2 campos uno llamado 'metodo' y otro 'clase'
   * @param array $objetos Arreglo con los objetos a actualziar. key = campo, value = objetos html
   * @return bool verdadero si encontro datos.
   */
  public function Construir($fdatos,$objetos,$opciones = array(),$params = array())
  {
    $objs = array();
    $this->opciones = $opciones;
    $this->params = $params;

    // $objs[][0] = Nombre del campo que tiene la información a ser devuelta.
    // $objs[][1] = Nombre del objeto donde se colocará la información del campo

    foreach ($objetos as $obj) {
      $arr = spliti('_',$obj);
      if(count($arr)>1){
        $objs[] = array($fdatos,$arr[1]);
      }
    }

    if(is_callable(array($this,$fdatos['metodo']))){

      $this->clase = ucfirst(strtolower($fdatos['clase'])) ;

      $this->metodo = $fdatos['metodo'] ;
      $eval = '$clase = new '.$this->clase.';';
      eval($eval);
      $this->clasePeer = $clase->getPeer();

      $this->mapa_tabla = $this->clasePeer->getTableMap();
      $metodo = $this->metodo;

      if(count($this->params)>0) $this->$metodo($this->params);
      else $this->$metodo();

    }else{

      $this->clase = ucfirst(strtolower($fdatos['clase'])) ;

      $eval = '$clase = new '.$this->clase.';';
      eval($eval);
      $this->clasePeer = $clase->getPeer();

      $this->mapa_tabla = $this->clasePeer->getTableMap();

      $this->columnas =  $this->clasePeer->getColumsNames();
      $this->c = new Criteria();
    }

  }

  public function getPager()
  {
    if(!isset($this->c)) $this->c = new Criteria();

    $this->processSort();

    $this->processFilters();

    // pager
    $this->pager = new sfPropelPager($this->clase, $this->maxlista);

    $this->addSortCriteria();
    $this->addFiltersCriteria();
    $this->pager->setCriteria($this->c);
    $this->pager->setPage($this->getOpciones('page',1));
    $this->pager->init();

    //print '<pre>';
    //print_r($this->pager);
    //print '</pre>';

    return $this->pager;
  }

  public function getCampos(){return $this->columnas;}

  protected function processFilters()
  {
    if (isset($this->opciones['filters']))
    {
      $filters = $this->opciones['filters'];

      foreach ($filters as $key => $campo) {

        $creoletype = $this->getColumCreoleType($key);

        if($creoletype == CreoleTypes::DATE){
          if (isset($filters[$key]['from']) && $filters[$key]['from'] !== '')
          {
            $filters[$key]['from'] = sfI18N::getTimestampForCulture($filters[$key]['from'], 'es_VE');
          }
          if (isset($filters[$key]['to']) && $filters[$key]['to'] !== '')
          {
            $filters[$key]['to'] = sfI18N::getTimestampForCulture($filters[$key]['to'], 'es_VE');
          }
        }elseif($creoletype == CreoleTypes::NUMERIC){

        }
      }
      $this->filters = $filters;
      $this->opciones['filters'] = $filters;

    }
  }

  protected function processSort()
  {
    /*
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/caajuoc/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/caajuoc/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/caajuoc/sort'))
    {
    }
  */
  }

  protected function addFiltersCriteria()
  {

    if(isset($this->filters) && is_array($this->filters)){


    foreach ($this->filters as $key => $objhtml) {

      $creoletype = $this->getColumCreoleType($key);

      if (isset($this->filters[$key.'_is_empty']))
      {
        $eval = '$criterion = $this->c->getNewCriterion('.$this->clase.'Peer::'.strtoupper($key).', "");';
        eval($eval);
        $eval = '$criterion->addOr($this->c->getNewCriterion('.$this->clase.'Peer::'.strtoupper($key).', null, Criteria::ISNULL));';
        eval($eval);
        $c->add($criterion);
      }else
      {
         if($creoletype == CreoleTypes::DATE){
          if (isset($this->filters[$key]))
          {
            if (isset($this->filters[$key]['from']) && $this->filters[$key]['from'] !== '')
            {
              $eval = '$criterion = $this->c->getNewCriterion('.$this->clase.'Peer::'.strtoupper($key).', date("Y-m-d", $this->filters[$key]["from"]), Criteria::GREATER_EQUAL);';
              eval($eval);
            }
            if (isset($this->filters[$key]['to']) && $this->filters[$key]['to'] !== '')
            {
              if (isset($criterion))
              {
                $eval = '$criterion->addAnd($this->c->getNewCriterion('.$this->clase.'Peer::'.strtoupper($key).', date("Y-m-d", $this->filters[$key]["to"]), Criteria::LESS_EQUAL));';
                eval($eval);
              }
              else
              {
                $eval = '$criterion = $this->c->getNewCriterion('.$this->clase.'Peer::'.strtoupper($key).', date("Y-m-d", $this->filters[$key]["to"]), Criteria::LESS_EQUAL);';
                eval($eval);
              }
            }
            if (isset($criterion))
            {
              $this->c->add($criterion);
            }
          }
         }else{
          if (isset($this->filters[$key]) && $this->filters[$key] !== '')
          {
            $campos = array();
            $campo = '';
            eval('$campos = '.$this->clase.'Peer::getFieldNames();');

            if(in_array(ucfirst(strtolower($key)),$campos)){
              eval('$campo = '.$this->clase.'Peer::'.strtoupper($key).';');
              if (array_key_exists($campo,$this->columnas)){
                $eval = '$this->c->add('.$this->clase.'Peer::'.strtoupper($key).', "%".strtr("%".$this->filters[$key]."%", "*", "%")."%", Criteria::LIKE);  $this->c->setIgnoreCase(true);';
                eval($eval);
              }
            }
          }
         }
      } //
    } // foreach
    }
  }

  protected function addSortCriteria()
  {
    if ($sort_column = $this->getOpciones('sort'))
    {
      $eval = '$sort_column = '.$this->clase.'Peer::translateFieldName(strtolower($sort_column), BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);';
      eval($eval);
      if ($this->getOpciones('type') == 'asc')
      {
        $this->c->addAscendingOrderByColumn($sort_column);
      }
      else
      {
        $this->c->addDescendingOrderByColumn($sort_column);
      }
    }
  }

  public function getOpciones($opc, $default = '')
  {
    if(isset($this->opciones[$opc])) return $this->opciones[$opc]; else return $default;
  }

  public function getColumCreoleType($campo)
  {
      try{
        $col = $this->clasePeer->translateFieldName(strtolower($campo), BasePeer::TYPE_FIELDNAME,BasePeer::TYPE_COLNAME);
        return $this->mapa_tabla->getColumn($col)->getCreoleType();
      }catch(Exception $ex){
        return CreoleTypes::VARCHAR;
      }
  }

  public function getColumName($colum)
  {
    return $this->columnas[$colum];
  }

  public function getColumsNames()
  {
    return $this->columnas;
  }

  public function getArrayFieldsNames()
  {
    $col = $this->columnas;
    $columnas = array();
    foreach($col as $key => $value)
    {
      $punto = strpos($key,'.');
      $tabla = substr($key,0,$punto);
      $campo = substr($key,$punto+1);
      $columnas[ucfirst(strtolower($campo))] = $value;
    }
    return $columnas;
  }

}


?>
