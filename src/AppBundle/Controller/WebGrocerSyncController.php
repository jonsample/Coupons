<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Source;
use AppBundle\Entity\Store;

class WebGrocerSyncController extends Controller
{
	public function getCoupons()
	{
		$em = $this->getDoctrine()->getManager();
        $storeRepo = $this->getDoctrine()->getRepository('AppBundle:Store');
        $sourceRepo = $this->getDoctrine()->getRepository('AppBundle:Source');

        $Source = $sourceRepo->find(1);
        $stores = $storeRepo->findBy([
        	'source_id' => 1
        ]);

        foreach ($stores as $store) {
        	for ($i=1;$i<9;$i++) {
        		$document = new \DOMDocument();
		        $dom = file_get_contents('http://'.$Source->getUrl().$store->getCircularLink().'/Weekly/3/'.$i);
		        @$document->loadHTML($dom);
		        echo $dom;
        	}
        	die();
        }
	}

    public function getStoresAction(Request $request)
    {
    	$this->getCoupons();
    	return;

    	$em = $this->getDoctrine()->getManager();
        $sourceRepo = $this->getDoctrine()->getRepository('AppBundle:Source');
        $Source = $sourceRepo->find(1);

        $document = new \DOMDocument();
        $dom = file_get_contents('http://'.$Source->getUrl().'/Stores');
        @$document->loadHTML($dom);

        $states = $document->getElementById('StateDropDown')->getElementsByTagName('option');

        for ($i=0;$i<$states->length;$i++) {
            $stateNames[] = $states->item($i)->getAttribute('value');
        }
        $stateNames = array_filter($stateNames);

        unset($document);
        unset($dom);

        foreach($stateNames as $stateName) {

            $stateInfo = explode('_', $stateName);

            $ch = curl_init('http://'.$Source->getUrl().'/Ajax/Stores/Cir/Country/'.rawurlencode($stateInfo[0]).'/Region/'.$stateInfo[1].'/Cities');

            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type:application/json',
                'Transfer-Encoding: chunked',
                'Content-Encoding: chunked'
            ]);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $content = curl_exec($ch);
            curl_close($ch);

            $storesByLocation[$stateInfo[0]][$stateInfo[1]] = array_column(json_decode($content), 'Name');

        }



        foreach ($storesByLocation as $country => $citiesByState) {
        	foreach($citiesByState as $state => $cities) {
        		foreach ($cities as $city) {
        			$document = new \DOMDocument();

			        $dom = file_get_contents('http://thefreshgrocer.shoprite.com/Stores/Get?'.implode('&',[
			        	'Country='. rawurlencode($country),
			        	'Region=' . rawurlencode($state),
			        	'City=' . rawurlencode($city),
			        	'Radius=' . 20,
			        	'Units=' . 'Miles',
			        	'StoreType=' . 'Cir'
			        ]));
			        @$document->loadHTML($dom);
			        $stores = $document->getElementById('StoreList')->getElementsByTagName('div');

			        for ($i=0;$i<$stores->length;$i++) {
			            $store = $stores->item($i);

			            if (!in_array('store-item',explode(' ',$store->getAttribute('class'))))  {
			        		continue;
			        	}

			        	$innerStoreDivs = $store->getElementsByTagName('*');

			        	for ($j=0;$j<$innerStoreDivs->length;$j++) {
				            $storeDetails = $innerStoreDivs->item($j);
				            if (in_array('store-links',explode(' ',$storeDetails->getAttribute('class'))))  {
				        		$storeId = explode('-',$storeDetails->getElementsByTagName('input')->item(0)->getAttribute('id'))[1];
				        	}

			        		if (in_array('storelist-inner-tab',explode(' ',$storeDetails->getAttribute('class'))))  {
			        			$services = $storeDetails->getElementsByTagName('div');

			        			for($k=0;$k<$services->length;$k++) {
			        				$service = $services->item($k);

			        				if ($service->getAttribute('id') == 'StoreDetails-'.$storeId) {
			        					$StoreRecord = new Store();

			        					$StoreRecord->setApiId($storeId);
			        					$StoreRecord->setTitle(trim($service->getElementsByTagName('h4')->item(0)->nodeValue));
			        					$StoreRecord->setSourceId($Source->getId());

			        					$storeData = $service->getElementsByTagName('p');
			        					$linkData = $service->getElementsByTagName('a');

			        					$locationData = explode(',', $storeData->item(1)->nodeValue);
			        					$stateData = explode(' ', trim($locationData[1]));

			        					$StoreRecord->setAddress1($storeData->item(0)->nodeValue);
			        					$StoreRecord->setCity($locationData[0]);
			        					$StoreRecord->setState($stateData[0]);
			        					$StoreRecord->setPostal($stateData[1]);
			        					$StoreRecord->setPhone($storeData->item(3) ? preg_replace("/[^0-9]/", "", $storeData->item(3)->nodeValue) : false);

			        					$circLink = $linkData->item($linkData->length - 1);

			        					if(strpos('store-delivery-link', $circLink->getAttribute('class')) !== false) {
			        						$circLink = $linkData->item($linkData->length - 3);
			        					}

			        					$StoreRecord->setCircularLink($circLink->getAttribute('data-outboundhref'));

			        					$em->persist($StoreRecord);
			        					break;
			        				}
			        			}
			        			unset($storeId);
				        	}
				        }
			        }
        		}
        	}
        }

        $em->flush();
        die();
    }
}
