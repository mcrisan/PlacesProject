<?php
// src/Bundle/ProjectBundle/lib/GetUsersIp.php
namespace Bundle\PlacesBundle\lib;

class GetUserIp {

    function get_user_ip() {
        @$http_client_ip = $_SERVER['HTTP_CLIENT_IP'];
        @$http_x_forwarded_for = $_SERVER['HTTP_X_FORWARDED_FOR'];
        @$remote_addr = $_SERVER['REMOTE_ADDR'];
        if (isset($http_client_ip) && !empty($http_client_ip)) {
            $ip_address = $http_client_ip;
        } else if (isset($http_x_forwarded_for) && !empty($http_x_forwarded_for)) {
            $ip_address = $http_client_ip;
        } else {
            $ip_address = $remote_addr;
        }
        //$ip_address;
        //$ip_addr = $ip_address;
        return $ip_address;
    }

}
?>
