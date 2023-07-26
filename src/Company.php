<?php

namespace Cmercado93\SupporttrioSdk;

use Cmercado93\SupporttrioSdk\Http\Api;

class Company
{
    protected function __construct() {}

    /**
     * @param array $params
     * @throws \Exception
     * @return array
     */
    public static function add(array $params) : array
    {
        return Api::getInstance()->post('company_add', $params);
    }

    /**
     * @param int $id
     * @throws \Exception
     * @return array
     */
    public static function delete(int $id) : array
    {
        $params = [
            'id' => $id,
        ];

        return Api::getInstance()->get('company_delete', $params);
    }

    /**
     * @param array $ids
     * @throws \Exception
     * @return array
     */
    public static function bulkDelete(array $ids) : array
    {
        $ids = implode(",", array_values($ids));

        $params = [
            'ids' => $ids,
        ];

        return Api::getInstance()->get('company_delete_list', $params);
    }

    /**
     * @param array $params
     * @throws \Exception
     * @return array
     */
    public static function edit(array $params) : array
    {
        return Api::getInstance()->post('company_edit', $params);
    }

    /**
     * @param array $ids
     * @throws \Exception
     * @return array
     */
    public static function list(array $ids)
    {
        $ids = implode(",", array_values($ids));

        $params = [
            'ids' => $ids,
        ];

        return Api::getInstance()->get('company_list', $params);
    }

    /**
     * @param int $id
     * @throws \Exception
     * @return array
     */
    public static function view(int $id) : array
    {
        $params = [
            'id' => $id,
        ];

        return Api::getInstance()->get('company_view', $params);
    }
}
