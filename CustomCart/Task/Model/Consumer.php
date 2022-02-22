<?php

declare(strict_types=1);

namespace CustomCart\Task\Model;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\TemporaryStateExceptionInterface;
use Magento\Framework\Bulk\OperationInterface;
use CustomCart\Task\Model\CustomCartRepository;
use CustomCart\Task\Model\CustomCart;

class Consumer
{
    
    private $logger;

   
    private $serializer;

    
    private $customCartRepository;

    private $customCart;


    
    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\Serialize\SerializerInterface $serializer,
        CustomCart $customCart,
        CustomCartRepository $customCartRepository
    ) {
       
        $this->logger = $logger;
        $this->serializer = $serializer;
        $this->customCart = $customCart;
        $this->customCartRepository = $customCartRepository;
    }

   
    public function process(\CustomCart\Task\Model\CustomCart $operation)
    {
        try {
           
            $data = $this->serializer->unserialize($operation);
          /*  foreach($data as $values){
                $sku = $values['sku'];
                $quote_id = $values['quote_id'];
                $customer_id = $values['customer_id'];

                $this->customCart->setCustomerId($customer_id);
                $this->customCart->setQuoteId($quote_id);
                $this->customCart->setSku($sku);

                $this->customCartRepository->save($this->customCart);


            }*/
            $this->logger->info($data);
            
        }   catch (\Exception $e) {
            $this->logger->critical($e->getMessage());
           
        }

        
    }


   
}
