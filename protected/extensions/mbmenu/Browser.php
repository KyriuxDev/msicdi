<?php

    /**
     * Browser archivo de clase.
     *
     * Esta es una clase que srive para detectar el tipo de navegador del cliente y su versión
     * @example $browser = Browser::detect();
     * 'Tu navegadore es '.$browser['name'].' version '.$browser['version'].' corriendo sobre el sistema '.$browser['platform'];  
     * @author González Santiago Héctor Florencio
     * @copyright Copyright (c) 2015, González Héctor <hector@devoaxaca.com>
     * @version 1.0.1
     * @package protected.extensions
     * @category Extensión
     */
 
class Browser {
    /**
     * [detect Hace las peticiones necesarias para detectar el tipo y versión del navegador del cliente]
     * @return [Array] [Información acerca del navegador del cliente]
     */
    public static function detect() {
        $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
        /**
         * Identifica el tipo de navegador
         */
        if (preg_match('/opera/', $userAgent)) {
            $name = 'opera';
        }
        elseif (preg_match('/webkit/', $userAgent)) {
            $name = 'safari';
        }
        elseif (preg_match('/msie/', $userAgent)) {
            $name = 'msie';
        }
        elseif (preg_match('/mozilla/', $userAgent) && !preg_match('/compatible/', $userAgent)) {
            $name = 'mozilla';
        }
        else {
            $name = 'unrecognized';
        }
        // Que versión?
        if (preg_match('/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/', $userAgent, $matches)) {
            $version = $matches[1];
        }
        else {
            $version = 'unknown';
        }
        // Sobre qué plataforma?
        if (preg_match('/linux/', $userAgent)) {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/', $userAgent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/', $userAgent)) {
            $platform = 'windows';
        }
        else {
            $platform = 'unrecognized';
        }
        return array(
            'name'      => $name,
            'version'   => $version,
            'platform'  => $platform,
            'userAgent' => $userAgent
        );
    }
} 

?> 