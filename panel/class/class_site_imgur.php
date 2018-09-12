<?php
if (! class_exists('Imgur')) {

    class Imgur
    {

        private $clientId;

        private $clientSecret;

        private $apiUrl;

        function __construct()
        {
            $this->clientId = '66da812ce5a2dfc';
            $this->clientSecret = 'b1cbee317c5da00e6f675cd979c3f4b3e09c7b60';
            $this->apiUrl = 'https://api.imgur.com/3/image.json';
        }

        public function getData($image)
        {
            $data = array();
            $data['APIURL'] = $this->apiUrl;
            $data['HTTPHEADER'] = array(
                "Authorization: Client-ID " . $this->clientId
            );
            $data['POSTFIELDS'] = array(
                'image' => base64_encode($image)
            );
            return $data;
        }
    }
}