<?php 
namespace CustomCart\Task\Model;

use CustomCart\Task\Api\Data\CustomCartInterface;

class CustomCart extends \Magento\Framework\Model\AbstractModel implements CustomCartInterface
{

    protected function _construct()
    {

        $this->_init("CustomCart\Task\Model\ResourceModel\CustomCart");
    }
    /**
     * GetCustomCartId
     *
     * @return int|null
     */
    public function getCustomCartId() 
    {

        return $this->getData(Self::CUSTOMCART_ID);
    }
    /**
     * Set CustomCart Id
     *
     * @param  [int] $customcart_id
     * @return CustomCartInterface
     */
    public function setCustomCartId($customcart_id)
    {

        return $this->setData(Self::CUSTOMCART_ID, $customcart_id);
    }
    /**
     * Get Sku
     *
     * @return string
     */
    public function getSku()
    {
        return $this->getData(Self::SKU);
    }
    /**
     * Set Sku
     *
     * @param  [string] $sku
     * @return CustomCartInterface
     */
    public function setSku($sku)
    {
        return $this->setData(Self::SKU, $sku);
    }
    /**
     * Get Customer Id
     *
     * @return int
     */
    public function getCustomerId()
    {
        return $this->getData(Self::CUSTOMER_ID);
    }
    /**
     * Set Customer Id
     *
     * @param  [int] $customer_id
     * @return CustomCartInterface
     */
    public function setCustomerId($customer_id)
    {
        return $this->setData(Self::CUSTOMER_ID, $customer_id);
    }
   
    /**
     * Get Quote Id
     *
     * @return int
     */
    public function getQuoteId()
    {
        return $this->getData(Self::QUOTE_ID);
    }
    /**
     * Undocumented function
     *
     * @param  [int] $quote_id
     * @return CustomCartInterface
     */
    public function setQuoteId($quote_id)
    {
        return $this->setData(Self::QUOTE_ID, $quote_id);
    }
    /**
     * Get Created At 
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->getData(Self::CREATED_AT);
    }
    /**
     * Set Created At
     *
     * @param  [type] $created_at
     * @return CustomCartInterface
     */
    public function setCreatedAt($created_at)
    {
        return $this->setData(Self::CREATED_AT, $created_at);
    }
    /**
     * Get Updated At
     *
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->getData(Self::UPDATED_AT);
    }
    /**
     * Set Updated At
     *
     * @param  [string] $updated_at
     * @return CustomCartInterface
     */
    public function setUpdatedAt($updated_at)
    {
        return $this->setData(Self::UPDATED_AT, $updated_at);
    }

   
    
}

?>