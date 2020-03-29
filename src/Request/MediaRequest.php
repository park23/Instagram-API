<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Response\GetLikersResponse;
use InstagramFollowers\Traits\ClientTrait;

class MediaRequest {
    use ClientTrait;

    /**
     * @var $blocked_response Response|null
     */
    public $blocked_response;

    /**
     * @var $getLikers_response GetLikersResponse|Response|null
     */
    public $getLikers_response;

    /**
     * @return bool|Response
     */
    public function blocked() {
        $this->blocked_response = $this->client->request("/media/blocked/", Response::class)
            ->needAuthorization(true)
            ->get();
        return $this->blocked_response;
    }

    /**
     * @var $media_id int
     *
     * @return bool|Response|GetLikersResponse
     */
    public function getLikers($media_id) {
        $this->getLikers_response = $this->client->request("/media/$media_id/likers/", GetLikersResponse::class)
            ->needAuthorization(true)
            ->get();
        return $this->getLikers_response;
    }


}
