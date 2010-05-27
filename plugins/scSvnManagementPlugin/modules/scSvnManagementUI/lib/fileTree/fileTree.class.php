<?php 
class scFile
{
  private $name;
  private $options;
  
  public function __construct($filename, $options=array())
  {
  	$this->name = trim($filename, '/');
  	$this->options = $options; 
  }
  
  public function getName() { return $this->name; }
  public function getOptions() { return $this->options; }
  public function setName($name) { $this->name = $name; }
  public function setOptions($options) { $this->options = $options; }
}

class scFileTree
{
	private $tree;
	private $currentDepth;
	private $currentPath;
	private $export;	
	private $rootDir;
	
	public function __construct($rootDir=null)
	{
		$this->tree = array();
		$this->currentDepth = 0;
		$this->currentPath = array();
		$this->reset_export_vars();
				
		if($rootDir==null)
		  $this->rootDir =  exec('pwd');
		else
		  $this->rootDir = $rootDir;
	}
	
	public function addFile($filePath, $fileOptions=array())
	{		
		$filePath = trim($filePath, '/.');
		
		if(is_dir($this->rootDir.'/'.$filePath))
		  $filePath .= '/.';
		  
		$this->tree = array_merge_recursive($this->tree, $this->dirToArray($filePath, $fileOptions));
	}
  public function removeFile($filePath)
  {
  	$filePath = trim($filePath, '/.');
  	
  	if(is_dir($this->rootDir.'/'.$filePath))
      $filePath .= '/.';
  	
  	$this->array_delete($this->tree, $this->dirToArray($filePath));
  	
  }
  
  public function outputFileTree()
  {
  	echo '<pre>';
  	echo print_r($this->tree);
  	echo '</pre>';
  }  
  
  public function setOptionsFilter($newFilter)
  {  	
  	$this->optionsFilter = $newFilter;
  }
  
  public function linearize($currentTree=null, $depth = 0, $path='root', $fullpath='')
  {
  	$counter = 0;
  	
  	if($currentTree == null) {  	  
  	  $this->reset_export_vars();
  	   
  	  if(count($this->tree) == 0) 
  	     return $this->export;
  	   	 
  	  $this->linearize($this->tree);
  	  ksort($this->export['files']);
  	  
  	  if(isset($this->optionsFilter))
  	    $this->export['info']['status'] = $this->optionsFilter;
  	  $this->export['info']['rootDir'] = $this->rootDir;
  	    
  	  return $this->export;
  	}
  	    	
  	  
  	foreach($currentTree as $key => $value) 
  	{
  		if(is_array($value)) 
  		{
  		  $this->export['files'][$path.'_'.$key] = array(
  		                                      'ID'      => $path.'_'.$key,
  		                                      'element' => 'dir',
  		                                      'name'    => $key,  		                                      
  		                                      'depth'   => $depth
  		                                      );
  		  $this->linearize($value, $depth+1, $path.'_'.$key, ((empty($fullpath)) ? $key : $fullpath.'/'.$key));
  		}  
  		else 
  		{
  			$this->export['files'][$path.'_'.$value->getName()] = array(
  			                                    'ID'      => $path.'_'.$value->getName(),
                                            'element' => 'file',
                                            'name'    => $value->getName(),
  			                                    'options' => $value->getOptions(),
                                            'depth'   => $depth,
  			                                    'path'    => empty($fullpath) ? $value->getName() : $fullpath.'/'.$value->getName() 			
                                            );
       $this->export['info']['status'] = array_unique(
                                          array_merge(
                                            array_keys($value->getOptions()), 
                                            $this->export['info']['status']
                                           ));                                      
         
  		}
  		//$counter++;
  	}
  	
  	return;
  }
  
  private function reset_export_vars()
  {
    $this->export['info'] = array('status' => array() );
    $this->export['files'] = array();
  }
  
  private function array_delete(&$array, $delete)
	{
	  if(is_array($delete))
	  {
	    foreach($delete as $key=>$value)
	    {
	    	if(is_array($value))
	      {          
	      	if(array_key_exists($key, $array)) 
	        {
	        	if($this->array_delete($array[$key], $delete[$key]) == 0)
		        {
		          unset($array[$key]);
		        }
	        }
	      }
	      else
	      {
	      	foreach($array as $index=>$file_in_dir)
	      	{
	      		if(is_object($file_in_dir)) {
		      		if($file_in_dir->getName() == $value->getName()) {
		      		  unset($array[$index]);	      
		      		  break;
		      		}
	      		}
	      	}
	      }        
	    }
	  }
	  else
	  {
	    unset($array[array_search($delete, $array)]);
	  }
	  return count($array);
	}
	
  private function strip_first_pathname(&$path)
  {
    if( ($slash_position = strpos($path, '/')) == false) {
      return false;
    }
    $first = substr($path, 0, $slash_position);
    $path = substr($path, $slash_position+1);
    
    return $first;
  }
  
  private function dirToArray($path, $fileOptions=array())
  {
    $files = array();
    
    if( ($file = $this->strip_first_pathname($path)) !== false) 
    {
      $files[$file] = $this->dirToArray($path, $fileOptions);                      
    }
    else
    { 
      $files[] = new scFile($path, $fileOptions);
    }    
    return $files;
  }

}
?>