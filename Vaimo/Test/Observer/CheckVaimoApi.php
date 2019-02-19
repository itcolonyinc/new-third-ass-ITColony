<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 12/8/2018
 * Time: 10:05 PM
 */

namespace Vaimo\Test\Observer;

use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Exception\CouldNotSaveException as CouldNotSaveException;

class CheckVaimoApi implements ObserverInterface
{
    protected $messageManager;
    protected $_responseFactory;
    protected $_url;

    public function __construct(\Magento\Framework\Message\ManagerInterface $messageManager,
                                \Magento\Framework\App\ResponseFactory $responseFactory,
                                \Magento\Framework\UrlInterface $url)
    {
        $this->messageManager = $messageManager;
        $this->_responseFactory = $responseFactory;
        $this->_url = $url;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        // HERE IS MY CODE
        $message = "THIS IS CUSTOM ERROR MESSAGE";
        $this->messageManager->addErrorMessage($message);
        $cartUrl = $this->_url->getUrl('checkou/cart/index');
        $this->_responseFactory->create()->setRedirect($cartUrl)->sendResponse();
        exit;
    }
}