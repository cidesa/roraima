<?php

/**
 * cidesaSecurityConfigHandler: Clase para generar los privilegios automáticos de
 * todos los formularios
 *
 * @package    Roraima
 * @subpackage cidesa
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class cidesaSecurityConfigHandler extends sfYamlConfigHandler
{
  /**
   * Executes this configuration handler.
   *
   * @param array An array of absolute filesystem path to a configuration file
   *
   * @return string Data to be written to a cache file
   *
   * @throws <b>sfConfigurationException</b> If a requested configuration file does not exist or is not readable
   * @throws <b>sfParseException</b> If a requested configuration file is improperly formatted
   * @throws <b>sfInitializationException</b> If a view.yml key check fails
   */
  public function execute($configFiles)
  {
    // parse the yaml
    $myConfig = $this->parseYamls($configFiles);

    $modulo = strtolower(sfContext::getInstance()->getModuleName());
    $app = strtolower(sfConfig::get('sf_app'));

    $myConfig['all'] = sfToolkit::arrayDeepMerge(
      isset($myConfig['default']) && is_array($myConfig['default']) ? $myConfig['default'] : array(),
      isset($myConfig['all']) && is_array($myConfig['all']) ? $myConfig['all'] : array()
    );

    unset($myConfig['default']);

    // change all of the keys to lowercase
    $myConfig = array_change_key_case($myConfig);

    if($app!='autenticacion'){
    $myConfig['index'] = array
        (
            'is_secure' => 1,
            'credentials' => array
                (
                    0 => array
                        (
                            0 => 'admin',
                            1 => $modulo.'_8',
                            2 => $modulo.'_15',
                            3 => $modulo.'_11',
                            4 => $app.'_8',
                            5 => $app.'_15',
                            6 => $app.'_11',
                        )

                )

        );

    $myConfig['list'] = array
        (
            'is_secure' => 1,
            'credentials' => array
                (
                    0 => array
                        (
                            0 => 'admin',
                            1 => $modulo.'_8',
                            2 => $modulo.'_15',
                            3 => $modulo.'_11',
                            4 => $app.'_8',
                            5 => $app.'_15',
                            6 => $app.'_11',
                        )

                )

        );


    $myConfig['delete'] = array
        (
            'is_secure' => 1,
            'credentials' => array
                (
                    0 => array
                        (
                            0 => 'admin',
                            1 => $modulo.'_15',
                            2 => $app.'_8',
                            3 => $app.'_15',
                            4 => $app.'_11',

                        )

                )

        );

    $myConfig['save'] = array
        (
            'is_secure' => 1,
            'credentials' => array
                (
                    0 => array
                        (
                            0 => 'admin',
                            1 => $modulo.'_15',
                            2 => $modulo.'_11',
                            3 => $app.'_8',
                            4 => $app.'_15',
                            5 => $app.'_11',
                        )

                )

        );

    $myConfig['edit'] = array
        (
            'is_secure' => 1,
            'credentials' => array
                (
                    0 => array
                        (
                            0 => 'admin',
                            1 => $modulo.'_8',
                            2 => $modulo.'_15',
                            3 => $modulo.'_11',
                            4 => $app.'_8',
                            5 => $app.'_15',
                            6 => $app.'_11',
                        )

                )

        );

    $myConfig['create'] = array
        (
            'is_secure' => 1,
            'credentials' => array
                (
                    0 => array
                        (
                            0 => 'admin',
                            1 => $modulo.'_11',
                            2 => $modulo.'_15',
                            3 => $app.'_8',
                            4 => $app.'_15',
                            5 => $app.'_11',

                        )

                )

        );

    }

    $myConfig['all'] = array
        (
            'is_secure' => 1,
            'credentials' => array
                (
                    0 => array
                        (
                            0 => 'admin',
                            1 => $modulo.'_8',
                            2 => $modulo.'_15',
                            3 => $modulo.'_11',
                            4 => $app.'_8',
                            5 => $app.'_15',
                            6 => $app.'_11',
                        )

                )

        );

    // compile data
    $retval = sprintf("<?php\n".
                      "// auto-generated by cidesaSecurityConfigHandler\n".
                      "// date: %s\n\$this->security = %s;\n",
                      date('Y/m/d H:i:s'), var_export($myConfig, true));

    return $retval;
  }
}
