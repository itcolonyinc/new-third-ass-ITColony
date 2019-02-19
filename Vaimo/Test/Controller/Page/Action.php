<?php

namespace Vaimo\Test\Controller\Page;


use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Vaimo\Test\Api\RequestProtocolInterface;


class Action extends \Magento\Framework\App\Action\Action
{

    protected $jsonFactory;

    protected $responseFactory;

    /**
     * Action constructor.
     * @param \Magento\Framework\Controller\ResultFactory $resultFactory
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Vaimo\Test\Api\RequestProtocolInterface $responseFactory
     */
    public function __construct(
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory,
        \Magento\Framework\App\Action\Context $context,
        RequestProtocolInterface $responseFactory)
    {
        $this->jsonFactory = $jsonFactory;
        $this->responseFactory = $responseFactory;
        parent::__construct($context);
    }

    /**
     * @return ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {

        $sku = $this->getRequest()->getParam('sku', "");
//        $ch = curl_init('http://server-v894.vaimo.com/__ic/testapi/index.php?sku='.$sku);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//        $response = curl_exec($ch);
            $response = $this->responseFactory->getResponse('http://server-v894.vaimo.com/__ic/testapi/index.php?sku='.$sku);
//        if ($response === false) $response = curl_error($ch);
        return $response;
        //var_dump($response);


    }

}