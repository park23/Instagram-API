<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;

class BusinessRequest {
    use ClientTrait;

    public function get_monetization_products_eligibility_data(){
        return $this->client->request("/business/eligibility/get_monetization_products_eligibility_data/", Response::class)
            ->needAuthorization(true)
            ->addParam('product_types','branded_content')
            ->get();
    }

    public function should_require_professional_account(){
        return $this->client->request("/business/branded_content/should_require_professional_account/", Response::class)
            ->needAuthorization(true)
            ->addParam('product_types','branded_content')
            ->get();
    }
}
