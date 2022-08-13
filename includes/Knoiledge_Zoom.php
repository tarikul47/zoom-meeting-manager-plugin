<?php

namespace Wecoder\Knoiledge;

use Wecoder\Knoiledge\Lib\Src\JWT;

/**
 * The Frontend class
 */

if (!defined('ABSPATH')) {
    exit;
}

class Knoiledge_Zoom
{
    private $api_field_name;
    private $api_key;
    private $api_secret;
    private $settings_key;
    private $api_url;
    private $zoom_meeting_post_type;
    private $zoom_meeting_base_slug;
    private $zoom_meeting_post_meta;

    public function __construct()
    {
        $this->api_field_name         = 'tutor_zoom_api';
        $this->settings_key           = 'tutor_zoom_settings';
        $this->api_url                = 'https://api.zoom.us/v2/';
        $this->zoom_meeting_post_type = 'knoiledge_zoom_meeting';
        $this->zoom_meeting_base_slug = 'knoiledge-zoom-meeting';
        $this->zoom_meeting_post_meta = '_knoiledge_zm_data';
        $this->generate_jwt_key();
        // var_dump( $this->generate_jwt_key());
        //var_dump( get_current_user_id());
        // Saving zoom settings
        add_action('wp_ajax_knoiledge_set_api_ac', array($this, 'knoiledge_set_api_ac'));
        add_action('wp_ajax_knoiledge_set_api_ac', array($this, 'knoiledge_save_zoom_settings'));
    }

    public function knoiledge_set_api_ac()
    {

        if (
            !isset($_POST['knoiledge_set_api_name']) || !wp_verify_nonce($_POST['knoiledge_set_api_name'], 'knoiledge_set_api_nonce')
        ) {
            print 'Sorry, your nonce did not verify.';
            exit;
        } else {

            $api_field_data = (array) isset($_POST[$this->api_field_name]) ? $_POST[$this->api_field_name] : array();
            $user_id  = get_current_user_id();

            $this->api_key    = sanitize_text_field($api_field_data['api_key']);;
            $this->api_secret = sanitize_text_field($api_field_data['api_secret']);


            if (empty($this->api_key) || empty($this->api_secret)) {
                wp_send_json_error(
                    array(
                        'message' => __('Please check your API keys and email.', 'wc_knoiledge'),
                        $user_id
                    )
                );
            }

            global $current_user;
            $email = $current_user->user_email;
            $email = 'tarikul47@gmail.com';

            $result = $this->get_user_info($email);

            if ($result['code'] == '200') {
                $user_id = get_current_user_id();
                update_user_meta($user_id, $this->api_field_name, json_encode($api_field_data));
                wp_send_json_success('Api Conection succefully connected');
            } elseif ($result['code'] == '404') {
                wp_send_json_error('User does not exist');
            } else {
                wp_send_json_error('Please check API and key and Secret');
            }
        }
    }

    private function get_option_data($key, $data)
    {
        if (empty($data) || !is_array($data)) {
            return false;
        }
        if (!$key) {
            return $data;
        }
        if (array_key_exists($key, $data)) {
            return apply_filters($key, $data[$key]);
        }
    }

    public function get_api($key = null)
    {
        $user_id  = get_current_user_id();
        $api_data = json_decode(get_user_meta($user_id, $this->api_field_name, true), true);
        return $this->get_option_data($key, $api_data);
    }

    private function get_settings($key = null)
    {
        $user_id       = get_current_user_id();
        $settings_data = json_decode(get_user_meta($user_id, $this->settings_key, true), true);
        return $this->get_option_data($key, $settings_data);
    }

    /**
     * Get users info by user ID
     *
     * @since 1.0.0
     *
     * @param int $user_id User ID.
     *
     * @return array|bool|string
     */
    public function get_user_info($user_id)
    {
        $args = array();

        return $this->send_request('users/' . $user_id, $args);
    }

    /**
     * Send Request.
     *
     * @param  string $called_function Called function.
     * @param  array  $data Data arguments.
     * @param string $request Type of request.
     *
     * @return array
     */
    protected function send_request($called_function, $data, $request = 'GET')
    {
        $request_url = $this->api_url . $called_function;
        $args        = array(
            'headers' => array(
                'Authorization' => 'Bearer ' . $this->generate_jwt_key(),
                'Content-Type'  => 'application/json',
            ),
        );

        if ('POST' === $request) {
            $args['body']   = !empty($data) ? wp_json_encode($data) : array();
            $args['method'] = 'POST';
            $response       = wp_remote_post($request_url, $args);
        } elseif ('DELETE' === $request) {
            $args['body']   = !empty($data) ? wp_json_encode($data) : array();
            $args['method'] = 'DELETE';
            $response       = wp_remote_request($request_url, $args);
        } elseif ('PATCH' === $request) {
            $args['body']   = !empty($data) ? wp_json_encode($data) : array();
            $args['method'] = 'PATCH';
            $response       = wp_remote_request($request_url, $args);
        } else {
            $args['body'] = !empty($data) ? $data : array();
            $response     = wp_remote_get($request_url, $args);
        }

        $response_code = wp_remote_retrieve_response_code($response);
        $response      = wp_remote_retrieve_body($response);
        $response_body = in_array($response_code, array(400, 401), true) ? simplexml_load_string($response) : json_decode($response);

        return array(
            'response' => json_decode($response),
            'code'     => $response_code,
            'body'     => $response_body,
        );
    }

    /**
     * Generate JWT Key
     *
     * @since 1.0.0
     * @return string JWT key
     */
    public function generate_jwt_key()
    {
        $key    = $this->api_key;
        //$key    = 'j1n_ugpFQa-C1lreE6rIzw';
        $secret = $this->api_secret;
        //$secret = 'rxlan32Bv5Va3ATVuYLQJUwalAqYg49ZW8yq';

        $token = array(
            'iss' => $key,
            'exp' => time() + 3600, // 60 seconds as suggested
        );
        return JWT::encode($token, $secret);
    }
}
