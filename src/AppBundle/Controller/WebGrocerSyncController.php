<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Source;

class WebGrocerSyncController extends Controller
{

    public function getStoresAction(Request $request)
    {
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

        foreach($stateNames as $stateName) {

            $stateInfo = explode('_', $stateName);

            // $dom = file_get_contents('http://'.$Source->getUrl().'/Ajax/Stores/Cir/Country/'.$stateInfo[0].'/Region/'.$stateInfo[1].'/Cities', 0, stream_context_create([

            //     'http'=>['method' => 'POST']
            // ]));
            $ch = curl_init('http://'.$Source->getUrl().'/Ajax/Stores/Cir/Country/'.$stateInfo[0].'/Region/'.$stateInfo[1].'/Cities');
            curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/537.36');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type:application/json'
            ]);

            $content = curl_exec($ch);
            curl_close($ch);

            var_dump($content);die();

            $citiesByState[$stateInfo[1]] = array_column(json_decode($dom), 'Name');

        }
        var_dump($citiesByState);
        die('test');
    }
}
