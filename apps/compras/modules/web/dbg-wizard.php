<?php
    
/*
$Id: dbg-wizard.php,v 1.01 2007/03/12 01:27:42 snichol Exp $

NuSphere PHP Debugger (DBG) Helper script 

Copyright (c) 2007 NuSphere Corporation

This library is free software; you can redistribute it and/or
modify it under the terms of the GNU Lesser General Public
License as published by the Free Software Foundation; either
version 2.1 of the License, or (at your option) any later version.

This library is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
Lesser General Public License for more details.

You should have received a copy of the GNU Lesser General Public
License along with this library; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

If you have any questions or comments, please contact:

NuSphere Corporation
http://www.nusphere.com

*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>

<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="content-language" content="en">
<meta name="author" content="NuSphere Corporation">
<meta http-equiv="Reply-to" content="sales@nusphere.com">
<meta name="generator" content="PhpED 4.5">
<meta name="description" content="NuSphere PHP Debugger (DBG) Helper script">
<meta name="revisit-after" content="15 days">

<STYLE TYPE="text/css">
<!-- 
body {
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: 10pt;
text-align: left;
color: #444444;
margin: 0px;
}

div.text_desc {
    border-color: gray;
    border-style: solid;
    border-width: thin;
    text-align: left;
    margin-top: 2px;
}

    
H1, H3, H4, H5, H6, H7 {
font-family: Verdana, Arial, Helvetica, sans-serif;
font-weight: bold;
font-size: 13pt;
text-align: center;
color: #444444;
}
H2 {
font-family: Verdana, Arial, Helvetica, sans-serif;
font-weight: bold;
font-size: 8pt;
text-align: left;
color: #444444;
}
P {
font-size: 100%;
font-family: Verdana, Arial, Helvetica, sans-serif;
text-align: justify;
color: #444444;
 padding-left: 1pixels;
    padding-right: 1pixels;
}
UL.plain {
list-style-type: disc;
font-family: Verdana, Arial, Helvetica, sans-serif;
text-align: left;
color: #444444;
font-weight: normal;
font-style: normal;

}
UL.plain LI {
list-style-type: disc;
text-decoration:none;
}


strong { 
font-weight: bold;
}
.headline-link {
font-size: 12pt;
font-family: Arial Narrow, Arial, Helvetica, sans-serif;
text-align: left;
line-height:33px; 
font-weight:300;
color: #FF8000;
font-style: normal;
font-weight: bold;
text-decoration:none;
}

a.headline-link:link {text-decoration:none;}


}
--> </STYLE>

<title>NuSphere PHP Debugger (DBG) Helper</title>

</head>
<body>

<h1>
   Thank you for using NuSphere! I am your DBG (PHP Debugger) Helper Script. 
</h1>
<div class="text_desc">
<p>
I will try to help you with setting up your PhpED project and installing DBG - NuSphere
PHP Debugger. I'll do my best and suggest the ways to configure things, but if you still having problems, please don't forget:
NuSphere's team is committed to making you successful. Here is the list of resources you can use:
<ul class="plain">
<li> <a class="headline-link" href="http://support.nusphere.com/index.php">NuSphere Support Forums</a></li>
<li> <a class="headline-link" href="http://support.nusphere.com/viewtopic.php?t=2135"> Overview of DBG debugger and Project Mappings </a></li>
<li> <a class="headline-link" href="http://support.nusphere.com/viewtopic.php?t=576 "> DBG debugger installation on the server </a></li>
<li> and you can always ask us a question using <a class="headline-link" href="http://shop.nusphere.com/contact_us/index.php "> NuSphere Contact Us Form</a></li>
</ul> 
</P>
</div>

<!-- Begin System INFO -->
<div class="text_desc">
<h1> What did I find out about your system </h1>
<p>
I assume that you placed me in the directory of your main php script
and on your PhpED machine pointed your browser to me - like this: <i>&lt;URL of your web site&gt;</i>/dbg-wizard.php
</P>  
<p>
I see that:
<?php     

//Grab system info 

function is_ssl() {
if ( !isset($_SERVER['HTTPS']) || strtolower($_SERVER['HTTPS']) != 'on' ) 
   return false;
else
   return true;
}

function is_thread_safety_enabled() {
    ob_start();

   phpinfo(INFO_GENERAL);    
   
   $string = ob_get_contents();
   ob_end_clean();    
   
   $pieces = explode("<h2", $string);
   
   $settings = array();
   
   foreach($pieces as $val)
   {
       preg_match("/<a name=\"module_([^<>]*)\">/", $val, $sub_key);
       
       preg_match_all("/<tr[^>]*>
                                           <td[^>]*>(.*)<\/td>
                                           <td[^>]*>(.*)<\/td>/Ux", $val, $sub);
       preg_match_all("/<tr[^>]*>
                                           <td[^>]*>(.*)<\/td>
                                           <td[^>]*>(.*)<\/td>
                                           <td[^>]*>(.*)<\/td>/Ux", $val, $sub_ext);
                               
       foreach($sub[0] as $key => $val)
       {
           if (strstr (strip_tags($sub[1][$key]), "Thread")) {
                   $result = strip_tags($sub[2][$key]);
                   return $result == "enabled ";
           }
       }
       return false;
       
       

   }
} 
 
function is_32bit() {
    $a=0x7FFFFFFFFF;
    if (($a >> 24) == 0x7FFF) {
    return false;
    } else {
    return true;
    }
}


    
function parsePHPModules() {
 
 ob_start();
 phpinfo(INFO_MODULES);
 $s = ob_get_contents();
 ob_end_clean();
 
 $s = strip_tags($s,'<h2><th><td>');
 $s = preg_replace('/<th[^>]*>([^<]+)<\/th>/',"<info>\\1</info>",$s);
 $s = preg_replace('/<td[^>]*>([^<]+)<\/td>/',"<info>\\1</info>",$s);
 $vTmp = preg_split('/(<h2>[^<]+<\/h2>)/',$s,-1,PREG_SPLIT_DELIM_CAPTURE);
 $vModules = array();
 for ($i=1;$i<count($vTmp);$i++) {
  if (preg_match('/<h2>([^<]+)<\/h2>/',$vTmp[$i],$vMat)) {
   $vName = trim($vMat[1]);
   $vTmp2 = explode("\n",$vTmp[$i+1]);
   foreach ($vTmp2 AS $vOne) {
   $vPat = '<info>([^<]+)<\/info>';
   $vPat3 = "/$vPat\s*$vPat\s*$vPat/";
   $vPat2 = "/$vPat\s*$vPat/";
   if (preg_match($vPat3,$vOne,$vMat)) { // 3cols
     $vModules[$vName][trim($vMat[1])] = array(trim($vMat[2]),trim($vMat[3])); 
   } elseif (preg_match($vPat2,$vOne,$vMat)) { // 2cols
     $vModules[$vName][trim($vMat[1])] = trim($vMat[2]); 
   } 
   } 
   
  } 
 } 
 return $vModules;
}

function getModuleSetting($pModuleName,$pSetting) {
        $vModules = parsePHPModules();
        return $vModules[$pModuleName][$pSetting];
}
     
function is_zend_extension_ts($php_ini) {
        $array_lines = file($php_ini);
        $section = '';
        foreach ($array_lines as $filedata)
        {
            $dataline = trim($filedata);
            $firstchar = substr($dataline, 0, 1);
            $commentchar = ";";
            if ($firstchar!=$commentchar && $dataline!='' &&
                substr( $dataline, 0, strlen( "zend_extension" ) ) === "zend_extension") 
                return true;
                
        }
        return false;

     }

    $php_version_string = phpversion();
    $php_version = explode('.', phpversion());
    $dbg_module_version = $php_version[0].".".$php_version[1]."."."x";
    
    
    
    $webserver = $_SERVER['SERVER_SOFTWARE'];

    
    $server_name = $_SERVER["SERVER_NAME"];
    $running_srv = (strstr($webserver, "Srv")===false)?false:true;
    $OS = PHP_OS ."\n";
    $dbg_OS_path = "<i>&lt;PhpED install path&gt;</i>\\debugger\\server\\";
    //make some initialization  - will overide if it is windows
    $on_windows = false;
    $dbg_module =  "dbg.so-".$dbg_module_version;
    $dir_delimeter = "/";
    
    if (stristr(PHP_OS, 'winnt')|| stristr(PHP_OS, 'win32'))
        {
            $dbg_OS_path .= "Windows\\x86";
            if (!is_32bit())
                $dbg_OS_path .="_64";
            if (!is_thread_safety_enabled())
                $dbg_OS_path .= "_NTS";
                
            $dbg_module =  "php_dbg.dll-".$dbg_module_version;
            $on_windows = true;
            $dir_delimeter = "\\";
            $full_name_dbg = $dbg_OS_path.$dir_delimeter.$dbg_module;
            
        }
        elseif (stristr(PHP_OS, 'darwin') || stristr(PHP_OS, 'mac'))
        {
            $dbg_OS_path .= "MacOsX\\";
            $full_name_dbg = $dbg_module." located in the tarball in ".$dbg_OS_path;
            
        }
        elseif (stristr(PHP_OS, 'linux'))
        {
            $dbg_OS_path .= "Linux\\"; 
            $full_name_dbg = $dbg_module." located in the tarball in ".$dbg_OS_path;
            
        }
        elseif (stristr(PHP_OS, 'freebsd')  )
        {
            $dbg_OS_path .= "FreeBSD\\";
            $full_name_dbg = $dbg_module." located in the tarball in ".$dbg_OS_path;
            
        }
        else //we don't support anything else, only Sun is left here
        {
            $dbg_OS_path .= "SunOS\\";
            $full_name_dbg = $dbg_module." located in the tarball in ".$dbg_OS_path;
            
        }
 
    $client_IP_address = $_SERVER["REMOTE_ADDR"];
    $server_IP_address = $_SERVER["SERVER_ADDR"];
    if ($client_IP_address == $server_IP_address || $server_name =="localhost")
        $local_webserver = true;
    else
        $local_webserver = false;
    $port = $_SERVER["SERVER_PORT"];
    $remote_path = realpath(dirname(__FILE__))."/";
   
   
    $remote_root = realpath($_SERVER['DOCUMENT_ROOT'])."/";
    
    $php_ini = get_cfg_var("cfg_file_path");
    
    $zend_extension_ts_loaded = is_zend_extension_ts($php_ini);
    $extensions_dir = ini_get("extension_dir");
     
    $dbg_installed = extension_loaded('dbg');
    if ($dbg_installed)
      $dbg_version = getModuleSetting("dbg", "Version");
     
    // replace slashes on Windows, PHP gives everything in Linux/Unix format
    if ($on_windows) {
      $extensions_dir =  str_replace("/", "\\", $extensions_dir); 
      $remote_root =  str_replace("/", "\\", $remote_root);
      $remote_path =  str_replace("/", "\\", $remote_path);
    }
    $url_path = strstr( $remote_path, $remote_root);
    
    $outside_of_root =  ($url_path === false)? true:false;
    if (!$outside_of_root) {
        $url_path = substr ($remote_path, strlen($remote_root));
        $url_path =  str_replace("\\", "/", $url_path);
    }
    $protocol = (is_ssl())?"https://":"http://";
    $remote_url = $protocol.$server_name;
    if ($port !="" && !(!is_ssl() && $port =="80") && !(is_ssl() && $port =="443"))
        $remote_url .=":".$port;
    if (!$outside_of_root && $url_path !="")
        $remote_url .="/".$url_path;
    else if ($url_path =="" )
        $remote_url .="/"; 
    
    
   
 ?>
 <ul class="plain">
<li> <?php echo('<strong>PHP Version:</strong> '.$php_version_string) ?></li>
<li> <?php print '<strong>Web Server:</strong> '.$webserver ?></li>
<li> <?php print '<strong>Server Name:</strong> '. $server_name ?></li>
<li  <?php print ' <strong>OS:</strong> '. $OS ?></li>
<li> <?php print ' <strong>Your Client IP Address:</strong> '. $client_IP_address ?></li> 
<li <?php print ' <strong>Your Server IP Address:</strong> '. $server_IP_address ?></li>
<li <?php print ' <strong>Port:</strong> '. $port ?></li>   
<?php if ($local_webserver) 
    print ("<li > <strong> <font color=\"magenta\">Your Web Server is on the same machine with PhpED</font></strong></li>");
else
    print ("<li> <strong><font color=\"magenta\">Your Web Server and PhpED are on different machines</font></strong></li>");
?> 
     
<li> <?php print ' <strong>Path to website files:</strong> '.$remote_path ?></li>        
<li> <?php print ' <strong>Document Root is:</strong> '.$remote_root ?></li>        
<li> <?php print ' <strong>Your PHP.INI file is </strong>'.$php_ini ?></li> 
<li> <?php print ' <strong>PHP extensions directory is </strong>'.$extensions_dir ?></li> 
<li> <?php 
    if ($dbg_installed) {
        print ' <strong>DBG (PHP DEBUGGER) Version '.$dbg_version.' is </strong> INSTALLED';
        $version_array = explode(".",$dbg_version);
         
    }
    else
        print ' <strong>DBG (PHP DEBUGGER) is</strong> NOT INSTALLED';
    
       
       
        ?>
    
</li>  
      
</ul>

</div>

<!-- END System INFO -->
<!-- Begin Srv Warning -->  
<?php if ($running_srv) { ?>
<div class="text_desc">
<h1> You ran this script under Srv </h1>
<p>
    I have detected that you are running me with Srv - PhpED internal Web Server. 
    Srv is perfect for local debugging and if that's what you are planning to do - you are all set! 
    However, if your intention is to debug and run the scripts in your Apache or IIS Web Server
     environment you need to place me in the directory that is served by those servers and execute me again. 
    </P>
    </div>
<?php } ?>
<!-- Begin DBG Install instructions -->
<?php if (!$dbg_installed && !$running_srv) { ?>
<div class="text_desc">
<h1> How to install Server side DBG module </h1>
<p>
I noticed that DBG (PHP DEBUGGER) is<strong> NOT INSTALLED </strong>on your server <strong><? echo $server_name ?>.</strong>
</P> 
<p>
Your DBG Module is: <strong> <?php print ($full_name_dbg) ?> </strong><br>
  To install it, please do the following:
  <ul class="plain">
  <li> Copy <?php print ($full_name_dbg) ?> into  <?php print($extensions_dir) ?> 
       on your server <?php print($server_name) ?>. No NEED TO CHANGE THE NAME OF THE MODULE!!</li>
  <li> Add the following lines to <?php print($php_ini) ?><br>
       <div align="center"><table width="90%"  align="center" cellspacing="1" cellpadding="2" border="0">
       <tr><td align="left" >
       <font color="#FF8000" size="2pt">
       <?php 
       if (!$zend_extension_ts_loaded) 
             print ( "<strong>extension=". $dbg_module."</strong></font>"); 
       else {
            // print    ("substring is ".substr($extensions_dir, -1, 1))."and delimieter is ".$dir_delimeter."<br>";
             if (substr($extensions_dir, -1, 1)==$dir_delimeter)
                $zend_extension_path =  $extensions_dir.$dbg_module;
             else
                $zend_extension_path =  $extensions_dir.$dir_delimeter.$dbg_module;
             
             if (is_thread_safety_enabled())
                $zend_ext_key = "zend_extension_ts";
             else   
                $zend_ext_key = "zend_extension"; 
             print ( "<strong>".$zend_ext_key."=".$zend_extension_path."</strong></font><br>");
             print("<font size='1pt'> NOTE: this line should appear before any other zend_extension(s)");
             print ("<br>Note: if debugger module is loaded using this way, please make sure extension=dbg.so (or extension=php_dbg.dll) line is removed or commented out.</font>"); 
      }
             
       ?>
       </td></tr>
        
        <tr> 
         <td align="left"> <font color="#FF8000" size="2pt"> <strong>&#91;debugger&#93;</strong>
         <br />
         <strong>debugger.hosts_allow=
         <?php print ($client_IP_address);
               print (" localhost"); ?>
         </strong>
         <br />
         <strong>debugger.hosts_deny=ALL </strong>
         <br />
         <strong>debugger.ports=7869, 10000/16</strong> </td> 
       </tr></font></table></div>
      </li>
      <li> debugger.hosts_allow has should be in format debugger.hosts_allow= host1 host2 host3, where host1, host2 and host3are host names or IP or network addresses
           allowed to start debug sessions. 
           If you run debug session through 
           <a href="http://support.nusphere.com/viewtopic.php?t=580" target="_blank">an SSH tunnel</a>
           , you need to list just one local IP address only (localhost).
      </li>

      <li>  Restart web server (SIG_HUP or httpd reload won't help!) </li>
      <li> Launch phpinfo and check its output. Make sure that one of the topmost headers contains 
<br />
      <span style="font-style: italic">Zend Engine v1.3.0, Copyright (c) 1998-2003 Zend Technologies with DBG v3.2.7 , (C) 2000, 2007 by Dmitri Dmitrienko </span>
  </li>
    
</ul>
    

</p>
</div>

<?php } ?>
<!-- End    DBG Install instructions -->

<!-- End   Srv Warning --> 
<!-- Begin Project settings instructions -->
<?php if (!$running_srv) {?>
<div class="text_desc">
<h1> How to setup your PhpED Project Properties </h1>
<p>
  I can suggest the following settings for your Project to debug PHP scripts on Server <?php print ($server_name) ?> :<br>
  You can create new Project by selecting File->New Project or by selecting  New Project in the Workspace Pop up Menu<br>
  In the Project Properties Dialog set:
</P>
<p> 
 <ul class="plain">
 <!-- Begin Project Root Directory -->
 <li> <strong>Project -> Root Directory:</strong>  
 <?php if (!$local_webserver) { ?>
  
                <ul class="plain">
                <li><p>Select the location where you will store the copies of the files from
               <?php print ($remote_path." from your server ".$server_name);?> .<br>
                    Note: if you are using Samba or some other file sharing system, 
                       you can simply point Root Directory to <?php print ($remote_path) ?> instead of copying it
                    </p> 
                </li>
               </ul>
  </li>
  <?php }  // end of if (!$local server) ?>
  <?php if ($local_webserver) { 
              print ($remote_path);
   }  // end of if ($local server)
  ?>
  <!-- End of Project Root Directory -->
  <!-- Begin Run Mode -->
  <li> <strong>Mapping -> Run Mode:</strong> HTTP Mode (3-rd party WEB server)</li>
  <!-- End Run Mode -->
  <!-- Begin Remote URL -->
  <li> <strong>Mapping -> Remote URL:</strong>  <?php  print ($remote_url); ?> </li>
  <!-- End Remote URL -->
        
  <!-- Begin Remote Root -->
  <li> <strong>Mapping -> Remote Root Directory:</strong>  
        <?php print ($remote_path);
                     if ($local_webserver) print (" , same as Project -> Root Directory.");
        ?>  
  </li>
  
  <!-- End Remote Root -->
  </ul>
  </p>
  </div>
  <?php } ?>
  <!-- End of Project Settings -->
  

</body>
</html>