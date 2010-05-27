<?php
require_once(dirname(__FILE__) . '/../fileTree/fileTree.class.php');
/**
 * svnClient Class.
 *
 * @subpackage svnClient
 * @author     Schwarz Computer Systeme GmbH
 */

class svnClient
{
  private $workingDirectory;
  private $logDirectory;
  private $shellCmd;
  private $shellOut;
  private $writeLog;
  private $username;
  private $password;
  private $fileTree;
  public  $error;

  /**
   * Constructs a new svnClient Object
   * 
   * @param string $workingDirectory    Path of your working directory
   * @param string $logDirectory        Path of your log directory
   * @param string $username            The Username to access the Repository
   * @param string $password            The Passwort to access the Repository
   * @param array  $writeLogForCommands List of commands which should be logged to files.
   *
   */
  public function __construct($workingDirectory, $logDirectory, $username = null, $password = null, $writeLogForCommands = array('update', 'revert'))
  {
    $this->workingDirectory = $workingDirectory.(substr($workingDirectory, -1) != DIRECTORY_SEPARATOR ? DIRECTORY_SEPARATOR : '');
    $this->logDirectory = $logDirectory.(substr($logDirectory, -1) != DIRECTORY_SEPARATOR ? DIRECTORY_SEPARATOR: '');
    $this->username = $username;
    $this->password = $password;

    $this->writeLog = $writeLogForCommands;
    
    $this->fileTree = new scFileTree($this->workingDirectory);
  }
  
  /**
   * Add files and directories to the working Copy and schedule them for addition to the repository
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */
  public function add()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Show author and revision information in-line for the specified files or URLs
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */
  public function  blame()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Output the contents of the specified files or URLs
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */
  public function  cat()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Check out a working copy from a repository
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */
  public function  checkout()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Recursively clean up the working copy
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */
  public function  cleanup()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Send changes from your working copy to the repository.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */
  public function  commit()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Copy a file or directory in a working copy or in the repository.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */
  public function copy()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Delete an item from a working copy or the repository.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */
  public function  delete()
  {
    throw new sfException("Not yet implemented");
  }

  /**
   * Display the differences between two paths.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */
  public function  diff($revision1, $revision2)
  {
    $output = $this->execute('diff', '-r'.$revision1.':'.$revision2.' --summarize');

    return $this->parse_status($output);
  }
  
  /**
   * Export a clean directory tree.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */  
  public function  export()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Recursively commit a copy of PATH to URL.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */  
  public function  import()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Print information about PATHs.
   *  
   * @return array $info output of svn_info as array
   */  
  public function  info()
  {
    $xmlOutput = $this->executeXml('info', '', true, true);
    
    if($xmlOutput !== false) {

      $info['Revision']       = $xmlOutput->getElementsByTagName('entry')->item(0)->getAttribute('revision');
      $info['Schedule']       = $xmlOutput->getElementsByTagName('schedule')->item(0)->nodeValue;

      $info['Last Changed Revision'] 	= $xmlOutput->getElementsByTagName('commit')->item(0)->getAttribute('revision');
      $info['Last Changed Author']  	= $xmlOutput->getElementsByTagName('author')->item(0)->nodeValue;

      $info['Date'] 			= strtotime(str_replace('T', ' ', substr($xmlOutput->getElementsByTagName('date')->item(0)->nodeValue,0, stripos($xmlOutput->getElementsByTagName('date')->item(0)->nodeValue, ':')+3)));

    }
    else {
      $info = array('Error' => $this->shellOut);
    }

    return $info;
  }

  /**
   * Print information about PATHs.
   *
   * @return array $info output of svn_info as array
   */
  public function  infoHead()
  {
    $xmlOutput = $this->executeXml('info', '-r HEAD', true, true);

    if($xmlOutput !== false) {

      $info['Revision']       = $xmlOutput->getElementsByTagName('entry')->item(0)->getAttribute('revision');
      //$info['Schedule']       = $xmlOutput->getElementsByTagName('schedule')->item(0)->nodeValue;

      $info['Last Changed Revision'] 	= $xmlOutput->getElementsByTagName('commit')->item(0)->getAttribute('revision');
      $info['Last Changed Author']  	= $xmlOutput->getElementsByTagName('author')->item(0)->nodeValue;

      $info['Date'] 			= strtotime(str_replace('T', ' ', substr($xmlOutput->getElementsByTagName('date')->item(0)->nodeValue,0, stripos($xmlOutput->getElementsByTagName('date')->item(0)->nodeValue, ':')+3)));

    }
    else {
      $info = array('Error' => $this->shellOut);
    }

    return $info;
  }

  /**
   * List directory entries in the repository.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */  
  public function  svn_list()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Display commit log messages.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */  
  public function  log($revision='base', $limit=5)
  {
    $log = array();
    $xmlOutput = $this->executeXml('log', '-r '.$revision.' --limit '.$limit);

    if(is_object($xmlOutput)) 
    {
	    foreach($xmlOutput->getElementsByTagName('logentry') as $logentry) {
	      $log[] = array(
					'Revision' 	=>	$logentry->getAttribute('revision'),
					'Author' 	=>	$logentry->getElementsByTagName('author')->item(0)->nodeValue,
					'Date'		=>	strtotime(str_replace('T', ' ', $logentry->getElementsByTagName('date')->item(0)->nodeValue)),
					'Message'	=> 	$logentry->getElementsByTagName('msg')->item(0)->nodeValue
	      );
	    }
    }
    else $log[] = null;
    
    return $log;
  }
  
  /**
   * Apply the differences between two sources to a working copy path.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */  
  public function  merge()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Create a new directory under version control.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */  
  public function  mkdir()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Move a file or directory.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */  
  public function  move()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Remove a property from an item.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */  
  public function  propdel()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Edit the property of one or more items under version control.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */  
  public function  propedit()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Print the value of a property.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */  
  public function  propget()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * List all properties.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */  
  public function  proplist()
  {
    throw new sfException("Not yet implemented");
  }
  
   /**
   * Set PROPNAME to PROPVAL on files, directories, or revisions.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */  
  public function  propset()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Remove â€œconflictedâ€� state on working copy files or directories.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */  
  public function  resolved()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Undo all local edits. 
   *
   * @return string $status 'reverted' (sucess) or Output of svn revert command (error)    
   */  
  public function  revert($path)
  {
    $status = $this->execute('revert', $this->workingDirectory.$path, false, false, false);
    if(strncmp($status, 'Reverted', 8) == 0)
      return 'reverted';
    else
      return $status;
  }

  /**
   * Print the status of working copy files and directories.
   *
   * @param boolean $showUpdates  get working-revision and server out of date information
   * @param boolean $verbose      get full revision-information on every item.
   *
   * @return array  status        revision-information of working copy
   */
  public function status($showUpdates = false, $verbose = false)
  {
    $output = $this->execute('status', $showUpdates ? '-u' : NULL);
        
    return $this->parse_status($output, $showUpdates);
  }
  
  /**
   * Update working copy to a different URL.
   * - NOT YET IMPLEMENTED - 
   *
   * @throws sfException
   */  
  public function  svn_switch()
  {
    throw new sfException("Not yet implemented");
  }
  
  /**
   * Update your working copy.
   * @param integer $revision The revision you want to up/downgrade to
   *
   * @return array $update updated files
   */  
  public function  update($revision)
  {
    $Column[0] = array(
		      ' ' =>  array('no modification', 'nomod'),
				  'A' =>  array('added', 'add'),
    			'D' =>  array('deleted', 'del'),
    			'U' =>  array('updated', 'mod'),
    			'C' =>  array('conflict', 'conflict'),
    			'G' =>  array('Merged', 'mod')
    );
    $Column[2] = array(
				' ' =>	'',
				'B' =>  array('lock has been broken or stolen', 'no')		
    );

    $output = $this->execute('update', '-r '.$revision);


    foreach($output as $line)
    {
      	
      if(strncmp($line, 'At revision', 11) == 0  || strncmp($line, 'svn:', 4) == 0 || empty($line)) {
        $messages[] = $line;        
        break;
      }
      if(strncmp($line, 'Updated to revision', 19) == 0) {
        $messages[] = $line;   
        break;
      }
            
      if(strncmp($line, 'Restored', 8) == 0) {
      	$this->fileTree->addFile(substr(substr($line, 5), strlen($this->workingDirectory)),
                               array(
                                  'Item'         => 'Restored',
                                  'Properties'   => null,
                                  'Lock'        => null,
                               ));
        continue;
      }
      
      $this->fileTree->addFile(substr(substr($line, 5), strlen($this->workingDirectory)),
                               array(
                                  'Item'         => $Column[0][$line{0}],
                                  'Properties'   => $Column[0][$line{1}],
                                  'Lock'         => $Column[2][$line{2}],
                               ));
    }

    return $messages;

  }
  
  /**
   * Get all files affected by last SVN action.
   *
   * @return class fileTree
   */  
  public function getAffectedFiles()
  {
    return $this->fileTree;
  }

  /**
   * Parse Output of 'svn status' command.
   */  
  private function parse_status($output, $showUpdates=false)
  {
    $messages = array();
    //The first column indicates that an item was added, deleted, or otherwise changed
    $Column[0] = array(
          ' ' => array('no modification', 'nomod'),
					'A' => array('added', 'add'),
					'D' => array('deleted', 'del'),
					'M' => array('modified', 'mod'),
					'C' => array('conflict', 'conflict'),
					'X' => array('unversioned, but is used by externals', 'ext'),
					'I' => array('ignored', 'ign'),
					'?' => array('not under version control', 'unversioned'),
					'!' => array('missing', 'missing'),
					'~' => array('directory expected', 'dir')
    );

    // The second column tells the status of a file's or directory's properties
    $Column[1] = array(
					' ' => array('no modification', 'nomod'),
					'M' => array('modified', 'mod'),
					'C' => array('conflict', 'conflict')
    );

    // The third column is populated only if the working copy directory is locked.
    $Column[2] = array(
					' ' => array('not locked', 'nolock'),
					'L' => array('locked', 'lock')
    );

    // The fourth column is populated only if the item is scheduled for addition-with-history
    $Column[3] = array(
					' ' => '',
					'+' => array('history scheduled with commit', 'add')
    );

    // The fifth column is populated only if the item is switched relative to its parent
    $Column[4] = array(
					' ' => array('child of parent directory', ''),
					'S' => array('switched', '')
    );

    // The out-of-date information appears in the eighth column
    $Column[7] = array(
					' ' => array('up to date', 'up2date'),
					'*' => array('out of date', 'outofdate')
    );

    foreach($output as $line)
    {
      if(empty($line)) continue;
      if(strncmp($line, 'Status', 6) == 0) {
        $messages[] = $line;
        break;
      }
      if(strncmp($line, 'Authentication ', 14) == 0
      || strncmp($line, 'Username', 8) == 0
      || strncmp($line, 'svn:', 4) == 0) {
      	$messages[] = $line;
      }
      else {             
       $this->fileTree->addFile(substr(substr($line, $showUpdates ? 20 : 7), strlen($this->workingDirectory)),
              array(
  							'Item' 		=> $Column[0][$line{0}],
  							'Properties'=> $Column[1][$line{1}],
  							'Lock' 		=> $Column[2][$line{2}],
  							'History'	=> $Column[3][$line{3}]
  							//'Switch' 	=> $Column[4][$line{4}],
  							//'UpToDate' 	=> ($showUpdates) ? $Column[7][$line{7}] : NULL, 		
	  					)
        );
      }
    }    
    return $messages;    
  }

  /**
   * Executes an svn-command and returns the result
   * 
   * @param string $command       The command to be executed
   * @param string $options       Additional parameters for the command
   * @param bool   $addWorkingDir Add the path of the working copy to the command
   * @param bool   $returnArray   Return an array or a string
   *
   * @return array/string         Output of command
   */  
  private function execute($command, $options=NULL, $addWorkingDir=true, $authentication=true, $returnArray=true)
  {
    $auth = '';
    if($authentication) {
    	if(!empty($this->username))
	      $auth .= ' --username '.escapeshellarg($this->username).' ';
	      
	    if(!empty($this->password))
	      $auth .= ' --password '.escapeshellarg($this->password).' ';

	    $auth .= '  --non-interactive --trust-server-cert ';
    }
    
    $this->shellCmd = 'svn '.$command.' '.$options.' '.(($addWorkingDir)?$this->workingDirectory:'');
    $this->shellOut = shell_exec($this->shellCmd.$auth.' 2>&1');

    if(in_array($command, $this->writeLog))
    {
      $this->writeLogFile();
    }
    
    if(strncmp($this->shellOut, 'svn:', 4)==0)
      return false;
    if(empty($this->shellOut)) return false;

    return $returnArray ? explode("\n", $this->shellOut) : $this->shellOut;
  }

  /**
   * Executes an svn-command with the --xml option and returns the result as DomDocument
   * 
   * @param string $command       The command to be executed
   * @param string $options       Additional parameters for the command
   * @param bool   $addWorkingDir Add the path of the working copy to the command
   *
   * @return DomDocument         Output of command
   */  
  private function executeXml($command, $options=NULL, $addWorkingDir=true, $authentication=true)
  {
    $auth = '';
    if($authentication) {
	    if(!empty($this->username))
	      $auth .= ' --username '.escapeshellarg($this->username).' ';
	      
	    if(!empty($this->password))
	      $auth .= ' --password '.escapeshellarg($this->password).' ';

      $auth .= '  --non-interactive --trust-server-cert ';
    }
      
    $this->shellCmd = 'svn '.$command.' '.$options.' --xml '.(($addWorkingDir)?$this->workingDirectory:'');
    $this->shellOut = shell_exec($this->shellCmd.$auth.' 2>&1');
    
    if(empty($this->shellOut)) return false;

    if(in_array($command, $this->writeLog))
    {
      $this->writeLogFile();
    }

    if(strncmp($this->shellOut, '<?xml', 5)==0)      
    {  
      $xmlDoc = new DOMDocument();
      $xmlDoc->loadXML($this->shellOut);

      return $xmlDoc;
      
    }
    else return false;
  }

  /**
   * Writes output of last executed command to a log file 
   *
   */  
  private function writeLogfile()
  {
    $logFileName = time().'.log';

    if (!($logFile = fopen($this->logDirectory.$logFileName, 'a'))) {
      return;
    }
    fprintf($logFile, "%s\n", date('r'));
    fprintf($logFile, "%'-80s\n", '-');
    fprintf($logFile, ">> %s\n", $this->shellCmd);
    fprintf($logFile, "%'-80s\n", '-');
    fprintf($logFile, "%s\n", $this->shellOut);
    fprintf($logFile, "%'-80s\n", '-');
  }  
}
?>