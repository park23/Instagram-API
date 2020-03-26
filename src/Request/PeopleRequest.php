<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Constants\InstagramConstants;
use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;
use InstagramFollowers\Traits\SignDataTrait;

class PeopleRequest {
    use ClientTrait;
    use SignDataTrait;

    /**
     * @param $user_pk string
     *
     * @return bool|Response|Response\FriendshipResponse
     */
    public function create_friendship($user_pk) {
        $data = [
            '_csrftoken' => $this->client->get_csrt_token(),
            'user_id' => $user_pk,
            'radio_type' => "wifi-none",
            '_uid' => $this->getClient()->get_cookie_from_name('ds_user_id'),
            'device_id' => $this->client->getDeviceId(),
            '_uuid' => $this->client->getUuid(),

        ];
        return $this->client->request('/friendships/create/' . $user_pk . '/', Response\FriendshipResponse::class)
            ->needAuthorization(true)
            ->addParam('signed_body', $this->generateSignedBodyFromArray($data))
            ->addParam("ig_sig_key_version", InstagramConstants::IG_SIG_KEY_VERSION)
            ->post();

    }
}
