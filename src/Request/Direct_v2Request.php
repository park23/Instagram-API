<?php

namespace InstagramFollowers\Request;

use InstagramFollowers\Response;
use InstagramFollowers\Traits\ClientTrait;

class Direct_v2Request {
    use ClientTrait;

    public function get_presence() {
        return $this->client->request("/direct_v2/get_presence/", Response::class)
            ->needAuthorization(true)
            ->get();
    }

    public function get_Inbox($thread_message_limit = '10', $limit = '20', $persistentBadging = 'true', $visual_message_return_type = "unseen") {
        $req = $this->client->request("/direct_v2/inbox/", Response::class)
            ->needAuthorization(true)
            ->addParam('visual_message_return_type', $visual_message_return_type);
        if ($thread_message_limit !== null) {
            $req->addParam('thread_message_limit', $thread_message_limit);
        }
        return $req->addParam('persistentBadging', $persistentBadging)
            ->addParam('limit', $limit)
            ->get();
    }
}
