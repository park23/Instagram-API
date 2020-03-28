<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;

class ScoresRequest {
    use ClientTrait;


    public function bootstrap_users(){
        $surfaces = ["coefficient_direct_recipients_ranking_variant_2","coefficient_rank_recipient_user_suggestion","coefficient_besties_list_ranking","coefficient_ios_section_test_bootstrap_ranking","autocomplete_user_list"];

        return $this->client->request("/scores/bootstrap/users/", Response::class)
            ->needAuthorization(true)
            ->addParam('surfaces',json_encode($surfaces))
            ->get();
    }

}
