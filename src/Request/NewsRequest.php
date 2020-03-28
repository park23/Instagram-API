<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;

class NewsRequest {
    use ClientTrait;

    /**
     * @return bool|Response
     */
    public function inbox() {
        return $this->client->request("/news/inbox/", Response::class)
            ->needAuthorization(true)
            ->addParam('mark_as_seen', "false")
            ->get();

    }

}
