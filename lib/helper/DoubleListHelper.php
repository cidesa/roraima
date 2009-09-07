<?php
/**
 * object_admin_double_for_list: Función que reescribe el helper
 * object_admin_double_for_list, por necesidades especiales de la
 * implementación de Roraima
 *
 * @package    Roraima
 * @subpackage helper
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
use_helper('Form', 'Javascript', 'Helper');

function object_admin_double_for_list($criteria, $object, $method, $options = array(), $callback = null)
{
  $options = _parse_attributes($options);

  $options['multiple'] = true;
  $options['class'] = 'sf_admin_multiple';
  if (!isset($options['size']))
  {
    $options['size'] = 10;
  }
  $label_all   = __(isset($options['unassociated_label']) ? $options['unassociated_label'] : 'Unassociated');
  $label_assoc = __(isset($options['associated_label'])   ? $options['associated_label']   : 'Associated');

  // get the lists of objects
  list($all_objects, $objects_associated, $associated_ids) = _get_object_list_criteria($object, $method, $options, $callback, $criteria);

  $objects_unassociated = array();
  foreach ($all_objects as $object)
  {
    if (!in_array($object->getPrimaryKey(), $associated_ids))
    {
      $objects_unassociated[] = $object;
    }
  }


  // override field name
  unset($options['control_name']);
  $name  = _convert_method_to_name($method, $options);
  $name1 = 'unassociated_'.$name;
  $name2 = 'associated_'.$name;
  $select1 = select_tag($name1, options_for_select(_get_options_from_objects($objects_unassociated), '', $options), $options);
  $options['class'] = 'sf_admin_multiple-selected';
  $select2 = select_tag($name2, options_for_select(_get_options_from_objects($objects_associated), '', $options), $options);

  $html =
'<div>
  <div style="float: left">
    <div style="font-weight: bold; padding-bottom: 0.5em">%s</div>
    %s
  </div>
  <div style="float: left">
    %s<br />
    %s
  </div>
  <div style="float: left">
    <div style="font-weight: bold; padding-bottom: 0.5em">%s</div>
    %s
  </div>
  <br style="clear: both" />
</div>
';

  $response = sfContext::getInstance()->getResponse();
  $response->addJavascript(sfConfig::get('sf_prototype_web_dir').'/js/prototype');
  $response->addJavascript(sfConfig::get('sf_admin_web_dir').'/js/double_list');

  return sprintf($html,
    $label_all,
    $select1,
    submit_image_tag(sfConfig::get('sf_admin_web_dir').'/images/next.png', "style=\"border: 0\" onclick=\"double_list_move(\$('{$name1}'), \$('{$name2}')); return false;\""),
    submit_image_tag(sfConfig::get('sf_admin_web_dir').'/images/previous.png', "style=\"border: 0\" onclick=\"double_list_move(\$('{$name2}'), \$('{$name1}')); return false;\""),
    $label_assoc,
    $select2
  );
}


function object_admin_double_list_criteria($criteria, $object, $method, $options = array(), $callback = null)
{
  $options = _parse_attributes($options);

  $options['multiple'] = true;
  $options['class'] = 'sf_admin_multiple';
  if (!isset($options['size']))
  {
    $options['size'] = 10;
  }
  $label_all   = __(isset($options['unassociated_label']) ? $options['unassociated_label'] : 'Unassociated');
  $label_assoc = __(isset($options['associated_label'])   ? $options['associated_label']   : 'Associated');

  // get the lists of objects
  list($all_objects, $objects_associated, $associated_ids) = _get_object_list_criteria($object, $method, $options, $callback, $criteria);

  $objects_unassociated = array();
  foreach ($all_objects as $object)
  {
    if (!in_array($object->getPrimaryKey(), $associated_ids))
    {
      $objects_unassociated[] = $object;
    }
  }

  // override field name
  unset($options['control_name']);

  $name  = _convert_method_to_name($method, $options);

  $name1 = 'unassociated_'.$name;
  $name2 = 'associated_'.$name;

  $select1 = select_tag($name1, options_for_select(_get_options_from_objects($objects_unassociated), '', $options), $options);
  $options['class'] = 'sf_admin_multiple-selected';
  $select2 = select_tag($name2, options_for_select(_get_options_from_objects($objects_associated), '', $options), $options);

  $html =
'<div>
  <div style="float: left">
    <div style="font-weight: bold; padding-bottom: 0.5em">%s</div>
    %s
  </div>
  <div style="float: left">
    %s<br />
    %s
  </div>
  <div style="float: left">
    <div style="font-weight: bold; padding-bottom: 0.5em">%s</div>
    %s
  </div>
  <br style="clear: both" />
</div>
';

  $response = sfContext::getInstance()->getResponse();
  $response->addJavascript(sfConfig::get('sf_prototype_web_dir').'/js/prototype');
  $response->addJavascript(sfConfig::get('sf_admin_web_dir').'/js/double_list');

  return sprintf($html,
    $label_all,
    $select1,
    submit_image_tag(sfConfig::get('sf_admin_web_dir').'/images/next.png', "style=\"border: 0\" onclick=\"double_list_move(\$('{$name1}'), \$('{$name2}')); return false;\""),
    submit_image_tag(sfConfig::get('sf_admin_web_dir').'/images/previous.png', "style=\"border: 0\" onclick=\"double_list_move(\$('{$name2}'), \$('{$name1}')); return false;\""),
    $label_assoc,
    $select2
  );
}
function _dobleList($object, $method, $options, $criteria)
  {
  	$through_class = _get_option($options, 'through_class');
      if (!$criteria)
	  {
	  	$criteria = new Criteria();
	  }
      $code = '$objects = '.$through_class.'Peer::doSelect($criteria);';
      eval($code);
	  $objects_associated = array();
	  $ids = array();//array_map(create_function('$o', 'return $o->getPrimaryKey();'), $objects_associated);

  return array($objects, $objects_associated, $ids);
  }
function _get_propel_object_list_criteria($object, $method, $options, $criteria)
{
  // get the lists of objects
  $through_class = _get_option($options, 'through_class');

  $objects = sfPropelManyToMany::getAllObjects($object, $through_class, $criteria);
  $objects_associated = sfPropelManyToMany::getRelatedObjects($object, $through_class, $criteria);
  $ids = array_map(create_function('$o', 'return $o->getPrimaryKey();'), $objects_associated);

  return array($objects, $objects_associated, $ids);
}

function _get_object_list_criteria($object, $method, $options, $callback, $criteria)
{
  $object = $object instanceof sfOutputEscaper ? $object->getRawValue() : $object;

  // the default callback is the propel one
  if (!$callback)
  {
    $callback = '_get_propel_object_list_criteria';
  }

  return call_user_func($callback, $object, $method, $options, $criteria);
}