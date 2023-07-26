<?php

namespace Cmercado93\SupporttrioSdk;

use Cmercado93\SupporttrioSdk\Http\Api;

class Ticket
{
    protected function __construct() {}

    /**
     * @return int
     */
    protected static function getRand()
    {
        return mt_rand(1201000, 9871000);
    }

    /**
     * @param array $params
     * @throws \Exception
     * @return array
     */
    public static function submit(array $params) : array
    {
        $params['h'] = static::getRand();

        return Api::getInstance()->post('ticket_submit', $params);
    }

    /**
     * @param array $params
     * @throws \Exception
     * @return array
     */
    public static function replyAdmin(array $params) : array
    {
        $params['h'] = static::getRand();

        return Api::getInstance()->post('ticket_reply_admin', $params);
    }

    /**
     * @param array $params
     * @throws \Exception
     * @return array
     */
    public static function replyPublic(array $params) : array
    {
        $params['h'] = static::getRand();

        return Api::getInstance()->post('ticket_reply_public', $params);
    }

    /**
     * @param array $params
     * @throws \Exception
     * @return array
     */
    public static function add(array $params) : array
    {
        $params['h'] = static::getRand();

        return Api::getInstance()->post('ticket_add', $params);
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

        return Api::getInstance()->get('ticket_delete', $params);
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

        return Api::getInstance()->get('ticket_delete_list', $params);
    }

    /**
     * @param array $ids
     * @param array $filters
     * @throws \Exception
     * @return array
     */
    public static function list(array $ids, array $filters = []) : array
    {
        $ids = implode(",", array_values($ids));

        $params = [
            'ids' => $ids,
        ];

        if (count($filters)) {
            foreach ($filters as $filter => $value) {
                $params["filters[{$filter}]"] = $value;
            }
        }

        return Api::getInstance()->get('ticket_delete', $params);
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

        return Api::getInstance()->get('ticket_view', $params);
    }
}
