<?php
/**
 * Helper for Javascript Tabbed Panes
 * 
 * Example Usage
 * <code>
 *  <?php use_helper('tabs') ?>
 *  <?php tabMainJS("tp1","tabPane1", "tabPage1", 'General');?>
 *            This is text of tab 1. This is text of tab 1. This is text of tab 1. 
 *      <?php tabPageOpenClose("tp1", "tabPage2", 'Security');?>
 *            This is text of tab 2. This is text of tab 2. This is text of tab 2. 
 *  <?php tabInit();?>
 * </code>
 * 
 * @package    Helpers
 * @author     Jason Ibele
 * @version    SVN: $Id: tabsHelper.php 4 2006-07-19 14:00:47Z jason.ibele $
 */
 
$response = sfContext::getInstance()->getResponse();
$response->addJavascript('/sf/calendar/calendar.js');
$response->addJavascript('/js/tabpane.js');
$response->addStylesheet('/css/tab.webfx.css');
$response->addStylesheet('/sf/calendar/skins/aqua/theme.css');
 
/**
 * Opens a new TabPane object and creates first tab
 *
 * @param string $mid         JavaScript variable name to use for webFXTabPane object
 * @param string $id          Main container div ID
 * @param string $page_id     Name for div ID, each needs to be unique
 * @param string $H2_title    The title for the tab
 * @param string $main_class  Optional class name for main Div (note this must match original class definitions)
 * @param string $page_class  Optional class name for page Div (note this must match original class definitions)
 */
function tabMainJS($mid, $id, $page_id, $H2_title, $main_class='tab-pane', $page_class='tab-page')
{
  echo '<div class="'.$main_class.'" id="'.$id.'">'."\n\t";
  echo '<script type="text/javascript">'."\n\t";
  echo $mid.' = new WebFXTabPane( document.getElementById( "'.$id.'" ) );'."\n\t";
  echo '</script>'."\n\t";
  echo '<div class="'.$page_class.'" id="'.$page_id.'">'."\n\t";
  echo '<h2 class="tab">'.$H2_title.'</h2>'."\n\t";
  echo '<script type="text/javascript">'.$mid.'.addTabPage( document.getElementById( "'.$page_id.'" ) );</script>'."\n";
}
 
/**
 * Closes and existing pane div and opens a new one with required JS
 *
 * @param string $mid         JavaScript variable to use for webFXTabPane object
 * @param string $page_id     Name for div ID, each needs to be unique
 * @param string $H2_title    The title for the tab
 * @param string $page_class  Optional class name for page Div (note this must match original class definitions)
 */
function tabPageOpenClose($mid, $page_id, $H2_title, $page_class='tab-page')
{
  echo '</div>'."\n\t";
  echo '<div class="'.$page_class.'" id="'.$page_id.'">'."\n\t";
  echo '<h2 class="tab">'.$H2_title.'</h2>'."\n\t";
  echo '<script type="text/javascript">'.$mid.'.addTabPage( document.getElementById( "'.$page_id.'" ) );</script>'."\n";
}
 
/**
 * Initiates the javascript for tabs and closes the remaining divs
 *
 * @param string $mid    JavaScript variable to use for webFXTabPane object
 * @param string $n      selected index of tab you want to force as set
 */
function tabInit($mid='', $n='')
{
  echo "\t".'</div>'."\n\t";
  echo '<script type="text/javascript">'."\n\t";
  echo 'setupAllTabs();'."\n\t";
 
  if($n){ // n = selected index of tab you want to force as set
    echo $mid.'.setSelectedIndex('.$n.');';
  }
 
  echo '</script>'."\n";
  echo '</div>'."\n";
}
 
?>