<?php

require_once 'api/Wrapper.php';

/**
 * Class CRM_Utils_API_LegalSearchAPIWrapper
 */
class CRM_Utils_API_LegalSearchAPIWrapper implements API_Wrapper {

    /**
     * @var CRM_Utils_API_ReloadOption
     */
    private static $_singleton = NULL;

    /**
     * @return CRM_Utils_API_ReloadOption
     */
    public static function singleton() {
        if (self::$_singleton === NULL) {
            self::$_singleton = new CRM_Utils_API_LegalSearchAPIWrapper();
        }
        return self::$_singleton;
    }

    /**
     * @inheritDoc
     */
    public function fromApiInput($apiRequest) {
        return $apiRequest;
    }

    /**
     * @inheritDoc
     */
    public function toApiOutput($apiRequest, $result) {

     //  $result format
     //
     //   [id] => 12345
     //   [sort_name] => Last, First
     //   [email] => first.last@gmail.com
     //   [data] => Last, First :: first.last@gmail.com

        $search_term = @$apiRequest['params']['name'];

        if (strlen($search_term) > 0) {

            $additional_result = civicrm_api3('Contact', 'get', array(
                'debug' => 1,
                'sequential' => 1,
                'return' => "sort_name, email",
                'legal_name' => array('LIKE' => "%$search_term%"),
            ));

            // Increment count
            $result['count'] += $additional_result['count'];

            foreach ($additional_result['values'] as $key => $api_result) {

                $result['values'][] = array(
                    'id' => $api_result['contact_id'],
                    'sort_name' => $api_result['sort_name'],
                    'email' => $api_result['email'],
                    'data' =>  $api_result['sort_name'] . " :: " . $api_result['email']
                );
            }
        }

        return $result;

    }


}
