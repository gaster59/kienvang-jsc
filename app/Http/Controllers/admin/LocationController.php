<?php

namespace App\Http\Controllers\Admin;

/**
 * Class LocationController
 * @package App\Http\Controllers\Admin
 */
class LocationController extends BaseController
{
    public function __construct()
    {

    }

    public function index()
    {
        $address = '18 Hoàng Lê Kha, phường 9, quận 6, Tp.HCM';
        $address = urlencode($address);

        $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&sensor=false');
        $geo = json_decode($geo, true);

        if ($geo['status'] == 'OK') {
            $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
            $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
            $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$latitude,$longitude&radius=500&types=atm&key=AIzaSyCpBGT3g6FPfEDKUcO2quDdbyFgjAESM4o";
            $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$latitude,$longitude&radius=500&types=atm&pagetoken=CqQCFAEAAJWafUPpYp8BrHsQ7kQHzbLur3Jt7HG2SaGeCumkvj1KzeMNaGQguUIPrTNS85MpSHAHdY0DRZOCq5JNB0vPIFZbT5KVRl7beXGMBsMauQYprlawkL5QKcB3_fchfI1T6f9Jk3Hu-M6yYehUZKzw5wnS2ShZ2WYwDb2w1rnSjIGMBtMakoPwU6xQgSDNo1Wa5oa5Zcm1z-EvF0QTatib7MZqHf1dLD2XYL_8gKcUl_35i3_wHWvgim_ublieQ5M5YjTMsUnVARBTqqWthdjranAPFRAuU24IC8sj1G3FOuVyyy-h5YgjVcjMKZBqMDHdL4E9dLAKNMHRHo5nO5WsEJxflRqUoZrh1HjO_FEwGflNdOSPElT0ASGh5H3IvlljJRIQFoVYdsjUSCImD6G-dn_mBxoUw4Yh-AtlQ5mR-OpS6qxIZgvPJgM&key=AIzaSyCpBGT3g6FPfEDKUcO2quDdbyFgjAESM4o";
            $geo = file_get_contents($url);
            $geo = json_decode($geo, true);
            dd($geo);
        }
    }
}