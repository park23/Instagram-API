<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;

class MultipleAccountsRequest {
    use ClientTrait;

    public function get_account_family() {
        return $this->client->request("/multiple_accounts/get_account_family/", Response::class)
            ->needAuthorization(true)
            ->get();
    }

    public function get_linkage_status() {
        return $this->client->request("/linked_accounts/get_linkage_status/", Response::class)
            ->needAuthorization(true)
            ->get();
    }
}
