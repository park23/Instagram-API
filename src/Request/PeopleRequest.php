<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Constants\InstagramConstants;
use InstagramFollowers\Response;
use InstagramFollowers\Response\FriendshipsShowManyResponse;
use InstagramFollowers\Traits\ClientTrait;
use InstagramFollowers\Traits\SignDataTrait;

class PeopleRequest {
    use ClientTrait;
    use SignDataTrait;
    /**
     * @var $create_friendship_last_response Response\FriendshipResponse|null
     */
    public $create_friendship_last_response = null;

    /**
     * @var $shop_many_friendships_response Response|FriendshipsShowManyResponse|null
     */
    public $shop_many_friendships_response = null;

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
        $this->create_friendship_last_response = $this->client->request('/friendships/create/' . $user_pk . '/', Response\FriendshipResponse::class)
            ->needAuthorization(true)
            ->addParam('signed_body', $this->generateSignedBodyFromArray($data))
            ->addParam("ig_sig_key_version", InstagramConstants::IG_SIG_KEY_VERSION)
            ->post();
        return $this->create_friendship_last_response;

    }

    /**
     * @param $user_ids array example: ["01234567890","01234567890","01234567890","01234567890"]
     *
     * @return bool|Response|FriendshipsShowManyResponse
     */
    public function show_many_friendships($user_ids) {
        $this->shop_many_friendships_response = $this->client->request('/friendships/show_many/', Response\FriendshipsShowManyResponse::class)
            ->needAuthorization(true)
            ->addParam('_csrftoken', $this->getClient()->get_csrt_token())
            ->addParam('user_ids', implode(',', $user_ids))
            ->addParam('_uuid', $this->getClient()->getDeviceId())
            ->post();
        return $this->shop_many_friendships_response;

    }
}
