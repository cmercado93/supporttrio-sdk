<?php

namespace Cmercado93\SupporttrioSdk;

use Cmercado93\SupporttrioSdk\Http\Api;

class User
{
    protected function __construct() {}

    /**
     * @param array $params
     * @throws \Exception
     * @return array
     */
    public static function add(array $params) : array
    {
        return Api::getInstance()->post('user_add', $params);
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

        return Api::getInstance()->get('user_delete', $params);
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

        return Api::getInstance()->get('user_delete_list', $params);
    }

    /**
     * @param array $params
     * @throws \Exception
     * @return array
     */
    public static function edit(array $params) : array
    {
        return Api::getInstance()->post('user_edit', $params);
    }

    /**
     * @param array $ids
     * @throws \Exception
     * @return array
     */
    public static function list(array $ids) : array
    {
        $ids = implode(",", array_values($ids));

        $params = [
            'ids' => $ids,
        ];

        return Api::getInstance()->get('user_list', $params);
    }

    /**
     * @param array $ids
     * @throws \Exception
     * @return array
     */
    public static function listGroup(array $ids) : array
    {
        $ids = implode(",", array_values($ids));

        $params = [
            'ids' => $ids,
        ];

        return Api::getInstance()->get('user_list_group', $params);
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

        return Api::getInstance()->get('user_view', $params);
    }

    /**
     * @param string $email
     * @throws \Exception
     * @return array
     */
    public static function viewByEmail(string $email) : array
    {
        $params = [
            'email' => $email,
        ];

        return Api::getInstance()->get('user_view_email', $params);
    }

    /**
     * @param string $username
     * @throws \Exception
     * @return array
     */
    public static function viewByUsername(string $username) : array
    {
        $params = [
            'username' => $username,
        ];

        return Api::getInstance()->get('user_view_username', $params);
    }

    /**
     * @param  string $ip
     * @param  string $user
     * @param  array  $options
     * @throws \Exception
     * @return array
     */
    public static function singlesignon(string $ip, string $user, array $options = []) : array
    {
        $params = [
            'sso_addr' => $ip,
            'sso_user' => $user,
        ];

        if (isset($options['password'])) {
            $params['sso_pass'] = $options['password'];
        }

        if (isset($options['password'])) {
            $params['sso_duration'] = $options['duration'];
        }

        return Api::getInstance()->get('singlesignon', $params);
    }
}
