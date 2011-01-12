<?php

/**
 * scSvnManagementUI actions.
 *
 * @subpackage scSvnManagementUI
 * @author     Schwarz Computer Systeme GmbH
 */

abstract class BasescSvnManagementUIComponents extends sfComponents
{
  public function executeMenu()
  {
    $this->actions = array(
    array(
                'name'    =>  'Info', 
                'action'  =>  'info'
                ),
                array(
                'name'    =>  'Status', 
                'action'  =>  'status'
                ),
                array(
                'name'    =>  'Update', 
                'action'  =>  'update'
                ),
                array(
                'name'    =>  'Revert', 
                'action'  =>  'revert'
                )
                );
  }
}
