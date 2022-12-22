<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssyncController extends Controller
{
    public function provinsi()
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.binderbyte.com/wilayah/provinsi?api_key=66ecbcf00fd4bb065a67d7579f5ff8c328ebd1a4321206ba466d7b916af1ff01",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 66ecbcf00fd4bb065a67d7579f5ff8c328ebd1a4321206ba466d7b916af1ff01"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $array_response = json_decode($response, TRUE);
            // echo '<pre>';
            // print_r ($array_response['value']);
            // echo '</pre>';
            $dataprovinsi = $array_response['value'];
            $arr = array();

            foreach ($dataprovinsi as $key => $tiap_provinsi) {
                array_push($arr, $tiap_provinsi);
            }
            echo json_encode($arr);
        }
    }
    public function distrik(Request $request)
    {
        // dd('halo');
        // $idProv_selected = $_POST['id_provinsi'];
        $idProv_selected = $request->id_provinsi;
        // dd($idProv_selected);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.binderbyte.com/wilayah/kabupaten?api_key=66ecbcf00fd4bb065a67d7579f5ff8c328ebd1a4321206ba466d7b916af1ff01&id_provinsi=" . $idProv_selected,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 66ecbcf00fd4bb065a67d7579f5ff8c328ebd1a4321206ba466d7b916af1ff01"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $array_response = json_decode($response, TRUE);
            // echo '<pre>';
            // print_r ($array_response['value']);
            // echo '</pre>';
            $datadistrik = $array_response['value'];
            $arr = array();

            foreach ($datadistrik as $key => $tiap_distrik) {
                array_push($arr, $tiap_distrik);
            }
            echo json_encode($arr);
        }
    }
    public function kecamatan(Request $request)
    {
        // $idDistrik_selected = $_POST['id_kabupaten'];
        $idDistrik_selected = $request->id_kabupaten;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.binderbyte.com/wilayah/kecamatan?api_key=66ecbcf00fd4bb065a67d7579f5ff8c328ebd1a4321206ba466d7b916af1ff01&id_kabupaten=" . $idDistrik_selected,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 66ecbcf00fd4bb065a67d7579f5ff8c328ebd1a4321206ba466d7b916af1ff01"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $array_response = json_decode($response, TRUE);
            // echo '<pre>';
            // print_r ($array_response['value']);
            // echo '</pre>';
            $datakecamatan = $array_response['value'];
            $arr = array();

            foreach ($datakecamatan as $key => $tiap_kecamatan) {
                array_push($arr, $tiap_kecamatan);
            }
            echo json_encode($arr);
        }
    }
    public function desa(Request $request)
    {
        // $idKec_selected = $_POST['id_kecamatan'];
        $idKec_selected = $request->id_kecamatan;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.binderbyte.com/wilayah/kelurahan?api_key=66ecbcf00fd4bb065a67d7579f5ff8c328ebd1a4321206ba466d7b916af1ff01&id_kecamatan=" . $idKec_selected,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: 66ecbcf00fd4bb065a67d7579f5ff8c328ebd1a4321206ba466d7b916af1ff01"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $array_response = json_decode($response, TRUE);
            // echo '<pre>';
            // print_r ($array_response['value']);
            // echo '</pre>';
            $datadesa = $array_response['value'];
            $arr = array();

            foreach ($datadesa as $key => $tiap_desa) {
                array_push($arr, $tiap_desa);
            }
            echo json_encode($arr);
        }
    }
}
