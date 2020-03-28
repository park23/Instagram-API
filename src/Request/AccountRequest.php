<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Constants\InstagramConstants;
use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;
use InstagramFollowers\Traits\SignDataTrait;

/**
 * Class AccountRequest
 * @package InstagramFollowers\Request
 */
class AccountRequest {
    use ClientTrait;
    use SignDataTrait;

    /**
     * @param string $mobile_subno_usage
     * @return bool|Response
     */
    public function contactPointPrefill($mobile_subno_usage = 'prefill') {
        $data = [
            'phone_id' => $this->client->getPhoneId(),
            '_csrftoken' => $this->client->get_csrt_token(),
            'usage' => $mobile_subno_usage

        ];
        return $this->client->request("/accounts/contact_point_prefill/", Response::class)
            ->needAuthorization(false)
            ->addParam('signed_body', $this->generateSignedBodyFromArray($data))
            ->addParam("ig_sig_key_version", InstagramConstants::IG_SIG_KEY_VERSION)
            ->post();

    }

    public function fetch_config(){
        return $this->client->request("/loom/fetch_config/", Response::class)
            ->needAuthorization(true)
            ->get();
    }

    /**
     * @return bool|Response|Response\PrefillsResponse
     */
    public function getPrefillCandidates() {
        $data = [
            'android_device_id' => $this->client->getAndroidId(),
            'client_contact_points' => "[]",
            'phone_id' => $this->client->getPhoneId(),
            'usages' => '["account_recovery_omnibox"]',
            '_csrftoken' => $this->client->get_csrt_token(),
            'device_id' => $this->client->getDeviceId()
        ];
        return $this->client->request("/accounts/get_prefill_candidates/", Response::class)
            ->needAuthorization(false)
            ->addParam('signed_body', $this->generateSignedBodyFromArray($data))
            ->addParam("ig_sig_key_version", InstagramConstants::IG_SIG_KEY_VERSION)
            ->post();


    }

    /**
     * @deprecated
     *
     * @param $username string
     * @param $password string
     *
     * @return bool|Response|Response\LoginResponse
     */
    public function login_deprecated($username, $password) {
        return $this->client->request("/accounts/login/", Response\LoginResponse::class)
            ->needAuthorization(false)
            ->addParam('country_codes', '[{"country_code":"1","source":["default"]}]')
            ->addParam('phone_id', $this->client->getPhoneId())
            ->addParam('_csrftoken', $this->client->get_csrt_token())
            ->addParam('username', $username)
            ->addParam('adid', $this->client->getAdvertisingId())
            ->addParam('guid', $this->client->getUuid())
            ->addParam('device_id', $this->client->getDeviceId())
            ->addParam('password', $password)
            ->addParam('google_tokens', '[]')
            ->addParam('login_attempt_count', 0)
            ->post();
    }

    /**
     * @param $username string
     * @param $password string
     *
     * @return bool|Response|Response\LoginResponse
     */
    public function login($username, $password) {
        $data = [
            "jazoest" => "22318",
            "country_codes" => '[{"country_code":"1","source":["default"]}]',
            "phone_id" => $this->client->getPhoneId(),
            "enc_password" => $this->generate_password_enc($password, $this->getClient()->getPasswordEncPubKey(), $this->getClient()->getPasswordPubKeyId()),
            "_csrftoken" => $this->client->get_csrt_token(),
            "username" => $username,
            "adid" => $this->client->getAdvertisingId(),
            "guid" => $this->client->getUuid(),
            "device_id" => $this->client->getDeviceId(),
            "google_tokens" => "[]",
            "login_attempt_count" => "0"
        ];
        return $this->client->request("/accounts/login/", Response\LoginResponse::class)
            ->needAuthorization(false)
            ->addParam('signed_body', $this->generateSignedBodyFromArray($data))
            ->addParam("ig_sig_key_version", InstagramConstants::IG_SIG_KEY_VERSION)
            ->post();

    }

    protected function generate_password_enc($password_raw, $public_key, $public_key_id) {
        $formatString = "%s:%s:%s:%s";
        $PWD_INSTAGRAM = "#PWD_INSTAGRAM";
        $gen4 = 4;
        $timeInMillis = time();
        $password_enc = $this->_encrypt($public_key, $public_key_id, $password_raw, $timeInMillis);

        return sprintf($formatString, $PWD_INSTAGRAM, $gen4, $timeInMillis, $password_enc);
    }

    protected function _encrypt($public_key, $public_key_id, $password_raw, $timeInMillis) {
        $key = openssl_random_pseudo_bytes(32);
        $iv = openssl_random_pseudo_bytes(12);

        openssl_public_encrypt($key, $encryptedAesKey, base64_decode($public_key));
        $encrypted = openssl_encrypt($password_raw, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $iv, $tag, strval($timeInMillis));

        return base64_encode("\x01" | pack('n', intval($public_key_id)) . $iv . pack('s', strlen($encryptedAesKey)) . $encryptedAesKey . $tag . $encrypted);

    }
}
