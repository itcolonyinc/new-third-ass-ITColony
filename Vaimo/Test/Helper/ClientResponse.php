<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 12/10/2018
 * Time: 4:57 AM
 */
namespace Vaimo\Test\Helper;
use Magento\Framework\Controller\Result\JsonFactory;
use \Magento\Framework\HTTP\ZendClientFactory;
use \Vaimo\Test\Api\RequestProtocolInterface;

class ClientResponse implements RequestProtocolInterface{

    /** @var ZendClientFactory */
    private $clientFactory;
    /**
     * @var JsonFactory
     */
    private $jsonFactory;

    public function __construct(
                                ZendClientFactory $clientFactory,
                                JsonFactory $jsonFactory
                                )
    {
        $this->clientFactory = $clientFactory;
        $this->jsonFactory = $jsonFactory;


    }

    public function getResponse($url){
        $client = $this->clientFactory->create();
        $client->setUri($url);
        $client->setHeaders(['Content-Type: application/json', 'Accept: application/json']);
        $client->setMethod(\Zend_Http_Client::GET);
        $response = $client->request()->getBody();
        return $this->jsonFactory->create()->setData(json_decode($response));
    }
}