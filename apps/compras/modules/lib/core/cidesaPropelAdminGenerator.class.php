<?php
/**
 * cidesaPropelAdminGenerator: Clase para generar los formularios en base a la clases
 * del modelo de Propel
 *
 * @package    Roraima
 * @subpackage cidesa
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class cidesaPropelAdminGenerator extends sfPropelAdminGenerator {

  public function initialize($generatorManager)
  {
    parent::initialize($generatorManager);

    $this->setGeneratorClass('PropelCidesa');
  }
  
  public function getUrlCatalogo($column, $params = array())
  {
	    $catalogo = $this->getParameterValue('edit.fields.'.$column->getName().'.catalogo');   
		
		return $catalogo;
  }  
  
    /**
   * Returns HTML code for a column in edit mode.
   *
   * @param string  The column name
   * @param array   The parameters of catalogo
   *
   * @return string Url Popup
   */
  public function getColumnCatalogo($column, $params = array())
  {
        // user defined parameters
    $user_params = $this->getParameterValue('edit.fields.'.$column->getName().'.catalogo.parametros');
    $user_params = is_array($user_params) ? $user_params : sfToolkit::stringToArray($user_params);
    $params      = $user_params ? array_merge($params, $user_params) : $params;    
	
	$params = $this->getObjectTagParams($params, array());	

	$catalogoweb = $this->getParameterValue('edit.fields.'.$column->getName().'.catalogo.catalogoweb');
	$clase = $this->getParameterValue('edit.fields.'.$column->getName().'.catalogo.clase');
	$ajax = $this->getParameterValue('edit.fields.'.$column->getName().'.catalogo.ajax');
	$catalogoparams = $this->getParameterValue('edit.fields.'.$column->getName().'.catalogo.catalogoparams');
	$ajaxparams = $this->getParameterValue('edit.fields.'.$column->getName().'.catalogo.ajaxparams');
	$divupdate = $this->getParameterValue('edit.fields.'.$column->getName().'.catalogo.divupdate');
	$valid = $this->getParameterValue('edit.fields.'.$column->getName().'.catalogo.valid');
		
	return sprintf('Catalogo($%s, %s, %s,  \'%s\',  \'%s\',  \'%s\',  \'%s\',  \'%s\')', $this->getSingularName(),$ajax ,$params, $catalogoweb, $clase, $catalogoparams, $ajaxparams,$divupdate,$valid);
	
	//if(is_array($column)){
		//return sprintf('object_%s($%s, %s, %s)', $helperName, $this->getSingularName(), "array('".$this->getColumnGetter($column[0], false)."',".'true'.")", $params);
//	}else return sprintf('object_%s($%s, \'%s\', %s)', $helperName, $this->getSingularName(), $this->getColumnGetter($column, false), $params);
    
  }


  /**
   * Returns HTML code for a column in edit mode.
   *
   * @param string  The column name
   * @param array   The parameters
   *
   * @return string HTML code
   */
  public function getColumnEditTag($column, $params = array())
  {
    // user defined parameters
    $user_params = $this->getParameterValue('edit.fields.'.$column->getName().'.params');
    $user_params = is_array($user_params) ? $user_params : sfToolkit::stringToArray($user_params);
    $params      = $user_params ? array_merge($params, $user_params) : $params;

    if ($column->isComponent())
    {
      return "get_component('".$this->getModuleName()."', '".$column->getName()."', array('type' => 'edit', '{$this->getSingularName()}' => \${$this->getSingularName()}))";
    }
    else if ($column->isPartial())
    {
      return "get_partial('".$column->getName()."', array('type' => 'edit', '{$this->getSingularName()}' => \${$this->getSingularName()},'labels' => ".'$labels'.",'params' => ".'$params'."))";
    }

    // default control name
    $params = array_merge(array('control_name' => $this->getSingularName().'['.$column->getName().']'), $params);

    // default parameter values
    $type = $column->getCreoleType();
    if ($type == CreoleTypes::DATE)
    {
      $params = array_merge(array('rich' => true, 'calendar_button_img' => sfConfig::get('sf_admin_web_dir').'/images/date.png','onkeyup' => "javascript: mascara(this,'/',patron,true)"), $params);
    }
    else if ($type == CreoleTypes::TIMESTAMP)
    {
      $params = array_merge(array('rich' => true, 'withtime' => true, 'calendar_button_img' => sfConfig::get('sf_admin_web_dir').'/images/date.png'), $params);
    }

    // user sets a specific tag to use
    if ($inputType = $this->getParameterValue('edit.fields.'.$column->getName().'.type'))
    {
      if ($inputType == 'plain')
      {
        return $this->getColumnListTag($column, $params);
      }
      else
      {
        return $this->getPHPObjectHelper($inputType, $column, $params);
      }
    }

    // guess the best tag to use with column type
    return self::getCrudColumnEditTag($column, $params);
  }







 public function getCrudColumnEditTag($column, $params = array())
  {
    $type = $column->getCreoleType();

    if ($column->isForeignKey())
    {
      if (!$column->isNotNull() && !isset($params['include_blank']))
      {
        $params['include_blank'] = true;
      }

      return $this->getPHPObjectHelper('select_tag', $column, $params, array('related_class' => $this->getRelatedClassName($column)));
    }
    else if ($type == CreoleTypes::DATE)
    {
      // rich=false not yet implemented
      return $this->getPHPObjectHelper('input_date_tag', $column, $params, array('rich' => true,'onkeyup' => "javascript: mascara(this,'/',patron,true)"));
    }
    else if ($type == CreoleTypes::TIMESTAMP)
    {
      // rich=false not yet implemented
      return $this->getPHPObjectHelper('input_date_tag', $column, $params, array('rich' => true, 'withtime' => true));
    }
    else if ($type == CreoleTypes::BOOLEAN)
    {
      return $this->getPHPObjectHelper('checkbox_tag', $column, $params);
    }
    else if ($type == CreoleTypes::CHAR || $type == CreoleTypes::VARCHAR)
    {
      $size = ($column->getSize() > 20 ? ($column->getSize() < 80 ? $column->getSize() : 80) : 20);
      return $this->getPHPObjectHelper('input_tag', $column, $params, array('size' => $size));
    }
    else if ($type == CreoleTypes::INTEGER || $type == CreoleTypes::TINYINT || $type == CreoleTypes::SMALLINT || $type == CreoleTypes::BIGINT)
    {
      return $this->getPHPObjectHelper('input_tag', $column, $params, array('size' => 7, 'onKeyPress' => 'javascript:return validaEntero(event)'));
    }
    else if ($type == CreoleTypes::FLOAT || $type == CreoleTypes::DOUBLE || $type == CreoleTypes::DECIMAL || $type == CreoleTypes::NUMERIC || $type == CreoleTypes::REAL)
    {
      return $this->getPHPObjectHelper('input_tag', array($column,true), $params, array('size' => 7, 'onKeyPress' => 'return validaDecimal(event)', 'onBlur' =>'event.keyCode=13;return formatoDecimal(event,this.id)'));
    }
    else if ($type == CreoleTypes::TEXT || $type == CreoleTypes::LONGVARCHAR)
    {
      return $this->getPHPObjectHelper('textarea_tag', $column, $params, array('size' => '30x3'));
    }
    else
    {
      return $this->getPHPObjectHelper('input_tag', $column, $params, array('disabled' => true));
    }
  }



   public function getPHPObjectHelper($helperName, $column, $params, $localParams = array())
  {
    $params = $this->getObjectTagParams($params, $localParams);

	if(is_array($column)){
		return sprintf('object_%s($%s, %s, %s)', $helperName, $this->getSingularName(), "array('".$this->getColumnGetter($column[0], false)."',".'true'.")", $params);
	}else return sprintf('object_%s($%s, \'%s\', %s)', $helperName, $this->getSingularName(), $this->getColumnGetter($column, false), $params);

  }


  public function getButtonToAction($actionName, $params, $pk_link = false)
  {
    $params   = (array) $params;
    $options  = isset($params['params']) ? sfToolkit::stringToArray($params['params']) : array();
    $method   = 'button_to';
    $li_class = '';
    $only_for = isset($params['only_for']) ? $params['only_for'] : null;

    // default values
    if ($actionName[0] == '_')
    {
      $actionName     = substr($actionName, 1);
      $default_name   = strtr($actionName, '_', ' ');
      $default_icon   = sfConfig::get('sf_admin_web_dir').'/images/'.$actionName.'_icon.png';
      $default_action = $actionName;
      $default_class  = 'sf_admin_action_'.$actionName;

      if ($actionName == 'save' || $actionName == 'save_and_add' || $actionName == 'save_and_list')
      {
        $method = 'submit_tag_click';
        $options['name'] = $actionName;
      }

      if ($actionName == 'delete')
      {
        $options['post'] = true;
        if (!isset($options['confirm']))
        {
          $options['confirm'] = 'Are you sure?';
        }

        $li_class = 'float-left';

        $only_for = 'edit';
      }
    }
    else
    {
      $default_name   = strtr($actionName, '_', ' ');
      $default_icon   = sfConfig::get('sf_admin_web_dir').'/images/default_icon.png';
      $default_action = 'List'.sfInflector::camelize($actionName);
      $default_class  = '';
    }

    $name   = isset($params['name']) ? $params['name'] : $default_name;
    $icon   = isset($params['icon']) ? sfToolkit::replaceConstants($params['icon']) : $default_icon;
    $action = isset($params['action']) ? $params['action'] : $default_action;
    $url_params = $pk_link ? '?'.$this->getPrimaryKeyUrlParams() : '\'';

    if (!isset($options['class']))
    {
      if ($default_class)
      {
        $options['class'] = $default_class;
      }
      else
      {
        $options['style'] = 'background: #ffc url('.$icon.') no-repeat 3px 2px';
      }
    }

    $li_class = $li_class ? ' class="'.$li_class.'"' : '';

    $html = '<li'.$li_class.'>';

    if ($only_for == 'edit')
    {
      $html .= '[?php if ('.$this->getPrimaryKeyIsSet().'): ?]'."\n";
    }
    else if ($only_for == 'create')
    {
      $html .= '[?php if (!'.$this->getPrimaryKeyIsSet().'): ?]'."\n";
    }
    else if ($only_for !== null)
    {
      throw new sfConfigurationException(sprintf('The "only_for" parameter can only takes "create" or "edit" as argument ("%s")', $only_for));
    }

    if ($method == 'submit_tag_click')
    {
      $html .= '[?php echo submit_tag_click(__(\''.$name.'\'), '.var_export($options, true).') ?]';
    }
    else
    {
      $phpOptions = var_export($options, true);

      // little hack
      $phpOptions = preg_replace("/'confirm' => '(.+?)(?<!\\\)'/", '\'confirm\' => __(\'$1\')', $phpOptions);
      if ($actionName == 'create')
       $html .= '[?php echo button_to(__(\''.$name.'\'), \''.$this->getModuleName().'/'.$action."', ".$phpOptions.') ?]';
      else
        $html .= '[?php echo button_to(__(\''.$name.'\'), \''.$this->getModuleName().'/'.$action.$url_params.', '.$phpOptions.') ?]';
    }

    if ($only_for !== null)
    {
      $html .= '[?php endif; ?]'."\n";
    }

    $html .= '</li>'."\n";

    return $html;
  }



}

?>
