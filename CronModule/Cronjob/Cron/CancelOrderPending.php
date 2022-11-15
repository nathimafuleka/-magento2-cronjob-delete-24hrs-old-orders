<?php
namespace CronModule\Cronjob\Cron;

class CancelOrderPending
{
    
    public function execute()
    {
        $time = date('Y-m-d h:i:s', strtotime('-1 day'));
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $orders = $objectManager->create('\Magento\Sales\Model\ResourceModel\Order\CollectionFactory')->create()
                                ->addAttributeToSelect('*')
                                ->addAttributeToFilter('status', ['eq' => 'pending_payment'])
                                ->addFieldToFilter('created_at', ['lt' => $time])
                                ->load();
        
        $orderManagement = $objectManager->get('\Magento\Sales\Api\OrderManagementInterface');                       
        foreach ($orders as $order) {
            try {
                $orderManagement->cancel($order->getEntityId());
                echo "order with Id = " .$order->getId(). " is canceled". PHP_EOL;
            } catch (\Exception $e) {
                return __('cannot cancel the order');
            }
        }

    }
}
