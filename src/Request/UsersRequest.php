<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;

class UsersRequest {
    use ClientTrait;

    public function arlink_download_info(){
        return $this->client->request("/users/arlink_download_info/", Response::class)
            ->needAuthorization(true)
            ->addParam('version_override',"2.2.1")
            ->get();
    }

    public function user_info($user_id){
        return $this->client->request("/users/$user_id/info/", Response::class)
            ->needAuthorization(true)
            ->get();
    }
}
