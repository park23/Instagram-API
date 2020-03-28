<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;

class NotificationsRequest {
    use ClientTrait;

    public function badge(){
        return $this->client->request("/notifications/badge/", Response::class)
            ->needAuthorization(true)
            ->addParam('phone_id',$this->getClient()->getPhoneId())
            ->addParam('_csrftoken',$this->getClient()->get_csrt_token())
            ->addParam('user_ids',$this->getClient()->get_cookie_from_name('ds_user_id'))
            ->addParam('device_id',$this->getClient()->getDeviceId())
            ->addParam('_uuid',$this->getClient()->getDeviceId())
            ->post();
    }
}
