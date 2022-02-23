<?php

declare(strict_types=1);

namespace CustomCart\Task\Model;

use Magento\Framework\Exception\LocalizedException;
use CustomCart\Task\Model\CustomCartRepository;


class Consumer
{
    
    private $logger;
    
    private $customCartRepository;

    public function __construct(
        \Psr\Log\LoggerInterface $logger,
        CustomCartRepository $customCartRepository
    ) {
       
        $this->logger = $logger;
        $this->customCartRepository = $customCartRepository;
    }

   
    public function process(\CustomCart\Task\Api\Data\CustomCartInterface $data)
    {
        try {
           
         $this->customCartRepository->save($data);
        
        }catch (\Exception $e) {
            $this->logger->critical($e->getMessage());
        }
        catch (LocalizedException $e) {
            $this->logger->critical($e->getMessage());
        }
          
    }
}
