<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;

class MediaRequest {
    use ClientTrait;


    /**
     * @return bool|Response
     */
    public function blocked() {
        return $this->client->request("/media/blocked/", Response::class)
            ->needAuthorization(true)
            ->get();
    }
}
