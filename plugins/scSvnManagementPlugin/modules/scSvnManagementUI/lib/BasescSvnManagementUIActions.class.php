<?php

/**
 * scSvnManagementUI actions.
 *
 * @subpackage scSvnManagementUI
 * @author     Schwarz Computer Systeme GmbH
 */

require_once(dirname(__FILE__) . '/../lib/svnClient/svnClient.class.php');
require_once(dirname(__FILE__) . '/../lib/fileTree/fileTree.class.php');


abstract class BasescSvnManagementUIActions extends sfActions
{
  
  /**
   * Instantiates an svnClient Object and loads parameters
   *
   */
  public function preExecute()
  {
  	$this->actions = array(
  						array(
  							'name' 		=>	'Info',	
  							'action' 	=>  'info'
  						),
  						array(
  							'name' 		=>	'Status',	
  							'action' 	=>  'status'
  						),
  						array(
  							'name' 		=>	'Update',	
  							'action' 	=>  'update'
  						),
  						array(
                'name'    =>  'Revert', 
                'action'  =>  'revert'
              )
  					);


  	$svnSettings = sfYaml::load(sfConfig::get('sf_plugins_dir').DIRECTORY_SEPARATOR.'scSvnManagementPlugin'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'svn.yml');
  	
  	if(empty($svnSettings['svnSettings']['workingCopyPath']))
  	  $this->workingDirectory = sfConfig::get('sf_root_dir');
  	else
  	  $this->workingDirectory = $svnSettings['svnSettings']['workingCopyPath'];

    if(empty($svnSettings['svnSettings']['logPath']))
      $this->logDirectory = sfConfig::get(sfConfig::get('sf_plugins_dir').DIRECTORY_SEPARATOR.'scSvnManagementPlugin'.DIRECTORY_SEPARATOR.'log');
    else
      $this->logDirectory = $svnSettings['svnSettings']['logPath'];
      
    $this->username = $svnSettings['svnSettings']['username'];
    $this->password = $svnSettings['svnSettings']['password'];
  	
  	$this->svnClient = new svnClient($this->workingDirectory, $this->logDirectory, $this->username, $this->password);
  	
  	if($this->getActionName() != 'info') 
  	{
	  	$this->svn_info = $this->svnClient->info();
	  	$this->forwardIf(isset($this->svn_info['Error']), 'scSvnManagementUI', 'info');
  	}
  	
  }
  
  /**
   * Forwards to the info-Action (svn info)
   *
   * @param sfWebRequest $request  current Request
   *
   * @return integer status        returns action value
   */
  public function executeIndex()
  {
	  $this->forward('scSvnManagementUI', 'info');
  }
  
  /**
   * Print information of the current working copy (svn info).
   *
   * @param sfWebRequest $request  current Request
   *
   * @return integer status        returns action value
   */
  public function executeInfo()
  {
  	$this->info = $this->svnClient->info();
  	if(isset($this->info['Error'])) {
  		return sfView::ERROR;
  	}
  	else return sfView::SUCCESS;
  }
  
  /**
   * Print the status of working copy files and directories (svn status).
   *
   * @param sfWebRequest $request  current Request
   *
   * @return integer status        returns action value
   */
  public function executeStatus()
  { 
    
    $result = $this->svnClient->status(true);
    $this->files = $this->svnClient->getAffectedFiles()->linearize();
    $this->files['messages'] = $result; 
    
  }

  public function executeSvnUpdate()
  {
    $head = $this->svnClient->infoHead();

    if(isset($head) && $head['Revision']>3){
      $status = $this->svnClient->update($head['Revision']);

      $this->files =  $this->svnClient->getAffectedFiles()->linearize();
      $this->files['messages'] = $status;

    }

  }

  /**
   * Performs 'svn update' to up/downgrade the working copy
   *
   * @param sfWebRequest $request  current Request
   *
   * @return integer status        returns action value
   */
  public function executeUpdate()
  {
    $request = $this->getRequest();
  	if($request->getMethod() == sfRequest::POST)
  	{
      $this->redirectIf($request->getParameter('commit','No') == 'No', 'scSvnManagementUI/update');
      $this->forward404Unless( ($revision=$request->getParameter('revision', 0)) );
      
      $status = $this->svnClient->update($revision);
      
      $this->files =  $this->svnClient->getAffectedFiles()->linearize();
      $this->files['messages'] = $status;
      	    
    }
  	else
  	{
      if($request->getParameter('to','0') > 0)
    	{
  	  	$updateTo = $request->getParameter('to', '0');
  	  	
  	    $to = $this->svnClient->log($updateTo);
  	    $from = $this->svnClient->info();
  	    
  	    $this->forward404Unless($to[0]['Revision']);
  	        
  	    $result = $this->svnClient->diff($from['Revision'], $to[0]['Revision']);
  	    $this->files = $this->svnClient->getAffectedFiles()->linearize();
        $this->files['messages'] = $result; 
  	    
  	    $this->fromRevision = $from;
  	    $this->toRevision = $to[0];
  
  	    $this->setTemplate('updatePreview');
  	    return sfView::SUCCESS;
    	}
    	else
    	{
  	  	$base = $this->svnClient->info();
  	  	$head = $this->svnClient->log('head');
  	  	
  	  	$logs = array();
  	  	
  	  	$begin = $base['Revision'] > 3 ? $base['Revision']-3: 1;
  	  	$this->workingCopy = $base['Revision'];
  	
  	  	for($k=$head[0]['Revision']; $k<=$head[0]['Revision']; $k++) {
  	  		$tmp = $this->svnClient->log($k);
  	  		$logs[] = $tmp[0];
  	  	}
  	  	krsort($logs);
  	  	$this->logs = $logs;
  	  	
  	  	$this->setTemplate('updateList');
  	  	return sfView::SUCCESS;
    	}
  	}

  }
  
  /**
   * Reverts certain file in the working copy (svn revert)
   *
   * @param sfWebRequest $request  current Request
   *
   * @return integer status        returns action value
   */
  public function executeRevert()
  {
	  //$this->dir = $this->dirToArray($this->workingDirectory);
	  $this->svnClient->status(false);
	  $fileTree = $this->svnClient->getAffectedFiles();
	   
	  $files = $fileTree->linearize();
	  
	  foreach($files['files'] as $key=>$file)
	    if(isset($file['options']['Item']))
	      if($file['options']['Item'][0] != 'modified' && $file['options']['Item'][0] != 'conflicted') {
	        $fileTree->removeFile($file['path']);	        
	      }

	  $files = $fileTree->linearize();
	  
    if($request->getParameter('commit'))
    {      
    	 if($request->getParameter('commit') != 'Yes')
    	   $this->forward('scSvnManagementUI', 'info');
    	 else {
    	 	 $this->forward404Unless($request->getMethod() == sfRequest::POST);

    	 	 foreach($files['files'] as $key => $file) {
    	 	 	 if($file['element'] == 'file' && !in_array($file['ID'], $request->getParameter('selected_files')))
    	 	 	   $fileTree->removeFile($file['path']);
    	 	 	 else if($file['element'] == 'file')
    	 	 	   $fileTree->addFile($file['path'], array('revert_status' => array($this->svnClient->revert($file['path']), 'ok')));
    	 	 }
    	 	 $fileTree->setOptionsFilter(array('revert_status'));
    	 	 $this->files = $fileTree->linearize();
    	 	 return sfView::SUCCESS;
    	 }    	 
    }
    
    $this->files = $files;
    return sfView::INPUT;
  }  
  
  /**
   * Delete/View the log-files.
   *
   * @param sfWebRequest $request  current Request
   *
   * @return integer status        returns action value
   */
  public function executeLog()
  {
    $request = $this->getRequest();
  	//sfApplicationConfiguration::getActive()->loadHelpers(array('Date'));
  	$fileTree = new scFileTree($this->logDirectory);
  	$this->logFiles = $this->loadLogFiles();
  	
  	foreach($this->logFiles as $file)
      {
        $fileTree->addFile($file, array('Date' => format_datetime(substr($file, 0, -4))));
      }     
  	
  	if($request->getParameter('commit') == 'Delete') 
  	{
  		$this->forward404Unless($request->getMethod() == sfRequest::POST);
  		
  		if(count($request->getParameter('selected_files')) > 0) 
  		{        
  			$files = $fileTree->linearize();
  			foreach($request->getParameter('selected_files') as $deleteFile) 
  		  {
  		  	unlink($this->logDirectory.'/'.$files['files'][$deleteFile]['path']);
  		  	$fileTree->removeFile($files['files'][$deleteFile]['path']);
  		  }  		
  		}
  	}  	
  	
  	if($request->getParameter('id')) 
  	{
  	  $logFile = $this->logDirectory.'/'.$request->getParameter('id', 0);
  	
  	  $this->forward404Unless(file_exists($logFile));
  	
  	  $this->logContent = file_get_contents($logFile);
  	}
  	else 
  	{  		  		  		  		
  		$this->files = $fileTree->linearize();
  		return sfView::INPUT;
  	}
  }
  
  /**
   */
  public function executeConfigError()
  {
    return;
  }
  
  /**
   * Load stored log files
   *
   */
  public function postExecute()
  {
  	$this->logFiles = $this->loadLogFiles();
  }
  
  /**
   * Load a directory structure recursive into an array
   *
   * @param string $path  Path do directory
   * 
   * @return array $files directory-structure of $path
   */
  private function dirToArray($path)
  {
    $files = array();
    
  	if ($handle = opendir($path)) {     
      while (($file = readdir($handle)) !== false) {
        if ($file != "." && $file != ".." && $file != '.svn')   
          if(is_dir($path.'/'.$file))   
            $files[$file] = $this->dirToArray($path.'/'.$file);
          else
            $files[] = $file;
      }
      closedir($handle);
    }
    return $files;
  }
  
  /**
   * Load stored log files
   *
   * @param sfWebRequest $request  current Request
   *
   */
  private function loadLogFiles()
  {
  	$logs = $this->dirToArray($this->logDirectory);
  	rsort($logs);
  	return $logs;
  }
}
?>