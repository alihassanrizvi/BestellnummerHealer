<?php

class Shopware_Controllers_Backend_Bestellnummer extends Shopware_Controllers_Backend_Application {

    protected $model = 'Shopware\CustomModels\Item\Item';
    protected $alias = 'item';
    
     public function updateOrderIdAction()
    {
         
       
             
        $sql = 'SELECT id,ordernumber FROM s_order WHERE ordernumber IN (SELECT ordernumber FROM s_order GROUP BY ordernumber HAVING COUNT(id) > 1)';
            $ordernumbers = Shopware()->Db()->fetchAll($sql);
            $i = 0;
        foreach ($ordernumbers as $data) 
                {
                $i++;
                $sql = "UPDATE `s_order` SET `ordernumber` = '".$data['ordernumber']."_".$i."' WHERE `id` =?";
                Shopware()->Db()->query($sql, array($data["id"]));
                }
             if(count($ordernumbers)>0)
             {
                 echo ' Bestellnummer '.count($ordernumbers).' wurde mehrfach gefunden';
                 
                //  $this->View()->assign(array('success' => ' Bestellnummer '.count($ordernumbers).' wurde mehrfach gefunden'));
             }
             else
             {
                //   $this->View()->assign(array('success' => '  Keine doppelten Bestellnummern gefunden.'));
               echo '  Keine doppelten Bestellnummern gefunden.';
             }
             
         
         
         
         
         
     }


}