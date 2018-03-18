<?php

/*
 * Stefanini
 * Arquitetura PHP
 * Criado por Wallison 17/03/2018
 */

namespace config;

/**
 * Arquivo de configuração inicial
 * @author Wallison do Carmo Costa
 */
class Services {

    private function getOptionsCurl($url, $type, &$headers) {

        return array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => strtoupper($type),
            CURLOPT_HEADER => true,
            CURLOPT_HEADERFUNCTION => function($curl, $header) use (&$headers) {

                $len = strlen($header);
                $header = explode(':', $header, 2);
                if (count($header) < 2) {
                    return $len;
                }
                $name = strtolower(trim($header[0]));

                if (!@array_key_exists($name, $headers)) {
                    $headers[$name] = [trim($header[1])];
                } else {
                    $headers[$name][] = trim($header[1]);
                }
                return $len;
            }
        );
    }

    protected function serviceGet($url, $token = null) {
        $ch = curl_init();
        $headers = [];
        $options = $this->getOptionsCurl($url, 'GET', $headers);
        if ($token) {
            $options[CURLOPT_HTTPHEADER] = array('Authorization: ' . $token);
        }

        curl_setopt_array($ch, $options);

        $data = curl_exec($ch);
        $result['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $result['header'] = $headers;
        $result['body'] = json_decode(substr($data, curl_getinfo($ch, CURLINFO_HEADER_SIZE)), true);

        return $result;
    }

    protected function servicePost($url, $post, $token = null) {
        $ch = curl_init();
        $headers = [];
        $options = $this->getOptionsCurl($url, 'POST', $headers);
        $options[CURLOPT_POST] = true;
        $options[CURLOPT_POSTFIELDS] = $post;
        if ($token) {
            $options[CURLOPT_HTTPHEADER] = array('Authorization: ' . $token);
        }
        curl_setopt_array($ch, $options);

        $data = curl_exec($ch);
        $result['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $result['header'] = $headers;
        $result['body'] = json_decode(substr($data, curl_getinfo($ch, CURLINFO_HEADER_SIZE)), true);

        return $result;
    }

    protected function serviceDelete($url, $token) {
        $ch = curl_init();
        $headers = [];
        $options = $this->getOptionsCurl($url, 'DELETE', $headers);
        $options[CURLOPT_HTTPHEADER] = array('Authorization: ' . $token);

        curl_setopt_array($ch, $options);

        $data = curl_exec($ch);
        $result['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $result['header'] = $headers;
        $result['body'] = json_decode(substr($data, curl_getinfo($ch, CURLINFO_HEADER_SIZE)), true);

        return $result;
    }

    protected function servicePut($url, $post, $token) {
        $ch = curl_init();
        $headers = [];
        $options = $this->getOptionsCurl($url, 'PUT', $headers);
        $options[CURLOPT_POST] = true;
        $options[CURLOPT_POSTFIELDS] = $post;
        if ($token) {
            $options[CURLOPT_HTTPHEADER] = array('Authorization: ' . $token);
        }
        curl_setopt_array($ch, $options);

        $data = curl_exec($ch);
        $result['code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $result['header'] = $headers;
        $result['body'] = json_decode(substr($data, curl_getinfo($ch, CURLINFO_HEADER_SIZE)), true);

        return $result;
    }

}
