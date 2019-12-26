<?php

class Login
{

    public static function checkSession()
    {
        if (!isset($_SESSION)) {
            $my_session_start = function () {
                $sn = session_name();

                if (isset($_COOKIE[$sn])) {
                    $sessid = $_COOKIE[$sn];

                } else if (isset($_GET[$sn])) {
                    $sessid = $_GET[$sn];

                } else {
                    session_start();
                }

                if (!preg_match('/^[a-zA-Z0-9,\-]{22,40}$/', $sessid)) {
                    return false;
                }
                session_start();
            };

            if (!$my_session_start()) {
                session_id(uniqid());
                session_start();
                session_regenerate_id();
            }
        }

//        $SS_id_sessao = (isset($_SESSION["SS_id_sessao"])) ? $_SESSION["SS_id_sessao"] : false;
//        $SS_id_user = (isset($_SESSION["SS_id_user"])) ? $_SESSION["SS_id_user"] : false;
//        $SS_login = (isset($_SESSION["SS_login"])) ? $_SESSION["SS_login"] : false;

        $SS_id_sessao = '';
        $SS_id_user = '';
        $SS_login = '';

        $resp['valida_login'] = (($SS_id_sessao) && ($SS_id_user) && ($SS_login)) ? true : false;
        $resp['SESSION'] = $_SESSION;

        return $resp;
    }
}