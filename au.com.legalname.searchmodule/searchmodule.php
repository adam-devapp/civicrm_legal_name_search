<?php

require_once 'searchmodule.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function searchmodule_civicrm_config(&$config) {
  _searchmodule_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param array $files
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function searchmodule_civicrm_xmlMenu(&$files) {
  _searchmodule_civix_civicrm_xmlMenu($files);
}

function searchmodule_civicrm_preProcess($formName, &$form) {
  //var_dump($formName);
  //var_dump($form);
  //var_dump($form['_params']);
}



function searchmodule_civicrm_pre($op, $objectName, $id, &$params) {
    var_dump($params);
}

function searchmodule_civicrm_queryObjects(&$queryObjects, $type) {

  if ($type == 'Contact') {
    $queryObjects[] = new CRM_Contact_BAO_LegalNameSearch();
  }
  
}


/**
 * Implements hook_civicrm_apiWrappers
 */
        function searchmodule_civicrm_apiWrappers(&$wrappers, $apiRequest) {
          //&apiWrappers is an array of wrappers, you can add your(s) with the hook.
          // You can use the apiRequest to decide if you want to add the wrapper (eg. only wrap api.Contact.create)
          if ($apiRequest['entity'] == 'Contact' && $apiRequest['action'] == 'getquick') {
            $wrappers[] = new CRM_Utils_API_LegalSearchAPIWrapper();
          }
        }


/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function searchmodule_civicrm_install() {
  _searchmodule_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function searchmodule_civicrm_uninstall() {
  _searchmodule_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function searchmodule_civicrm_enable() {
  _searchmodule_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function searchmodule_civicrm_disable() {
  _searchmodule_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function searchmodule_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _searchmodule_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function searchmodule_civicrm_managed(&$entities) {
  _searchmodule_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * @param array $caseTypes
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function searchmodule_civicrm_caseTypes(&$caseTypes) {
  _searchmodule_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function searchmodule_civicrm_angularModules(&$angularModules) {
_searchmodule_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function searchmodule_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _searchmodule_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Functions below this ship commented out. Uncomment as required.
 *

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function searchmodule_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function searchmodule_civicrm_navigationMenu(&$menu) {
  _searchmodule_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'au.com.legalname.searchmodule')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _searchmodule_civix_navigationMenu($menu);
} // */
