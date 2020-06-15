<?php

/**
 * @copyright Copyright (c) 2020
 * @author Vladymyr Drohovoz flesh192@gmail.com
 */

namespace App\Gateway;


use Exception;
use GuzzleHttp\Client;

/**
 * Class CuriositystreamCategoriesGateway
 * @package App\Gateway
 */
class CuriositystreamCategoriesGateway
{
    /**
     * @var Client
     */
    private Client $client;

    /**
     * CuriositystreamCategoriesGateway constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    public function getCategories()
    {
        try {
            return json_decode($this->client->get(env('CURIOSITYSTREAM_CATEGORIES_ENDPOINT'))->getBody()->getContents
            ());
        } catch (RequestException $e) {
            echo $e->getRequest();
            if ($e->hasResponse()) {
                echo $e->getResponse();
            }
        } catch (ClientException $e) {
            echo $e->getMessage();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
