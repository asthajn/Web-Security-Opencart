<?php
class ControllerReportBestReferee extends Controller{

public function index() { 

}


public function getReferrer(){
$query = $this->db->query("SELECT referrer_id , count(*) FROM " . DB_PREFIX . "order WHERE referrer_id <> '' GROUP BY referrer_id order by count(*) desc limit 1");

foreach ($query->rows as $result){
//print "The Best referrer is : ".$result['referrer_id'];
$id2 = $result['referrer_id'];
}
echo $id2;
}



public function getMaxCust(){
$query = $this->db->query("SELECT o.customer_id, sum(op.price) FROM " . DB_PREFIX . "order o LEFT JOIN " . DB_PREFIX . "order_product op ON o.order_id = op.order_id GROUP BY o.customer_id ORDER BY SUM(price) DESC LIMIT 1");

foreach ($query->rows as $result){
//print "The Best customer is : ".$result['customer_id'];
$id = $result['customer_id'];
}

$query2 = $this->db->query("SELECT CONCAT(firstname, ' ' ,lastname) AS customer from " . DB_PREFIX . "customer WHERE customer_id = " .(int)$id. " ");
foreach ($query2->rows as $result2){
$cust = $result2['customer'];
}

echo $cust;
}
}
?>
