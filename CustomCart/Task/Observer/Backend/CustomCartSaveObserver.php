<?php
namespace CustomCart\Task\Observer\Backend;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;



class CustomCartSaveObserver implements ObserverInterface
{
    public function __construct( 
        \Magento\Framework\Message\ManagerInterface $messageManager,
        \Magento\Checkout\Model\Session $checkoutSession,              
        \Magento\Framework\MessageQueue\PublisherInterface $publisher,
        \Magento\Framework\Serialize\SerializerInterface $serializer,
        \CustomCart\Task\Api\Data\CustomCartInterface $customCart    
    ) {
        $this->_messageManager = $messageManager;
        $this->_checkoutSession = $checkoutSession;        
        $this->publisher = $publisher;
        $this->serializer = $serializer;
        $this->customCart = $customCart;
       
    }

   
    public function execute(\Magento\Framework\Event\Observer $observer)
    { 
        try {
            $sku = $observer->getEvent()->getData('product')->getSku();
            $quote = $this->_checkoutSession->getQuote();
            $this->customCart->setSku($sku);
            $this->customCart->setQuoteId($quote->getId());
            $this->customCart->setCustomerId($quote->getCustomerId());
            
           /* $data = array(
                'sku' => $sku,
                'quote_id' => $quote->getId(),
                'customer_id' => $quote->getCustomerId()
            );*/
                     
            $this->publisher->publish(
                'customcart.create', $this->customCart
            ); 
            if ($sku) {
                $this->_messageManager->addSuccess(
                    __('Message is added to queue!!')
                );
            } else {
                $this->_messageManager->addSuccess(
                    __('Something Went Wrong!!')
                );
            }
        }
        catch (\Exception $e) {
            $this->_messageManager->addError($e->getMessage());
        }  
    }
}