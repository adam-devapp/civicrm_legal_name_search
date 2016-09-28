<?php

class CRM_Contact_BAO_LegalNameSearch extends CRM_Contact_BAO_Query_Interface {

    /**
     * static field for all the export/import hrjob fields
     *
     * @var array
     * @static
     */
    static $_fields = array();

    /**
     * Function get the import/export fields for hrjob
     *
     * @return array self::$_hrjobFields  associative array of hrjob fields
     * @static
     */
    function &getFields() {
        return self::$_fields;
    }

    function select(&$query) {
    }

    function where(&$query) {

        $grouping = NULL;
        foreach (array_keys($query->_params) as $id) {
            if (empty($query->_params[$id][0])) {
                continue;
            }

            if ($query->_params[$id][0] == 'sort_name') {
                $this->whereClauseSingle($query->_params[$id], $query);
            }
        }

    }

    function whereClauseSingle(&$values, &$query) {

        // Replace existing sort name search to include legal name
        // Cant add, otherwise search will become AND (combining the filters)

        list($name, $op, $value, $grouping, $wildcard) = $values;

        $strtolower = function_exists('mb_strtolower') ? 'mb_strtolower' : 'strtolower';
        switch ($name) {
            case 'sort_name':
                $value      = trim($value);
                $dataType   = "String";
                $op = 'LIKE';
                $value = "%" . trim($strtolower($value), '%') . "%";
                $newQuery = "((( contact_a.sort_name LIKE \"$value\" ) OR  ( contact_a.nick_name LIKE \"$value\" ) OR  ( civicrm_email.email LIKE \"$value\") OR ( contact_a.legal_name LIKE \"$value\" )  )  )";
                $query->_where[$grouping][$grouping] = $newQuery;
        }


    }

    function from($name, $mode, $side) {
    }

    function setTableDependency(&$tables) {
    }

    public function registerAdvancedSearchPane(&$panes) {
    }

    public function getPanesMapper(&$panes) {
    }

    public function buildAdvancedSearchPaneForm(&$form, $type) {
    }

    public function setAdvancedSearchPaneTemplatePath(&$paneTemplatePathArray, $type) {
    }

    public function alterSearchBuilderOptions(&$apiEntities, &$fieldOptions) {
    }

}