<?php

namespace controllers;

use controllers\Controller;
use cse\store;
use cse\TemplateFactory;

class searchController extends Controller
{
    public function search()
    {
        $searched = $this->params->getStringRequestParam('kulcsszo');
        $res = $this->searchCSE($searched);

        $view = TemplateFactory::createSmarty();
        $view->assign('result', $res);
        echo $view->fetch('searchresults.tpl');
    }

    private function searchCSE($searchQuery)
    {
        $apiKey = $_ENV['API_KEY'];
        $customSearchEngineKey = $_ENV['SEARCH_ENGINE_ID'];

        $googleApiUrl = $_ENV['CSE_URL']
            . "?key=" . urlencode($apiKey)
            . "&cx=" . urlencode($customSearchEngineKey)
            . "&q=" . urlencode($searchQuery)
            . "&dateRestrict=m1";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        $err = curl_error($ch);
        $respCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

        curl_close($ch);

        if ($err || $respCode !== 200) {
            throw new \Exception("HTTP Status: {$respCode}; Error: {$err}", $respCode);
        }
        return json_decode($response, true);
    }
}