<?php
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.amp.active.com/v2/search/?city=".$_POST['search']."&state=ca&current_page=1&per_page=50&sort=distance&start_date=2018-08-13..2019-12-31&exclude_children=true&api_key=kj6w9curwcvghdnquj4w83qy",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
          ),
        ));
        
        $jsonData = curl_exec($curl);
        echo $jsonData;
?>