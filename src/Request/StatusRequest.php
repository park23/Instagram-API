<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;

class StatusRequest {
    use ClientTrait;

    public function get_viewable_statuses(){
        return $this->client->request("/status/get_viewable_statuses/", Response::class)
            ->needAuthorization(true)
            ->get();
    }
}
