<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;
use InstagramFollowers\Traits\SignDataTrait;

/**
 * Class LauncherRequest
 * @package InstagramFollowers\Request
 */
class LauncherRequest {
    use ClientTrait;
    use SignDataTrait;

    /**
     * @param $data
     * @param $responseObject
     * @return bool|Response
     */
    public function Sync($data, $responseObject) {
        return $this->client->request("/launcher/sync/", $responseObject)
            ->needAuthorization(false)
            ->addParam('signed_body', $this->generateSigned_body($data))
            ->addParam('ig_sig_key_version', 4)
            ->post();
    }

    /**
     *
     */
    public function preLoginSync() {
        $data = [
            "_csrftoken" => $this->client->get_csrt_token(),
            "id" => $this->getClient()->getDeviceId(),
            "server_config_retrieval" => "1"
        ];
        $str = json_encode($data);
        $this->Sync($str, Response::class); //TODO: Build response object
    }
}
