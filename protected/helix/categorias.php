<?php
/**
 * Configuración de Categorías Helix
 *
 * Mapeo de Cat_Ope_1/2/3 y Cat_Prod_1/2/3 por servicio y tipo (wo / incidente).
 * Fuente: Informacion_integracion_MSL_Oaxaca.xlsx — hoja "Categorias"
 *
 * Clave del arreglo: nombre corto del servicio (visible en el <select> del formulario).
 * Cada servicio tiene dos sub-claves: 'wo' e 'incidente'.
 */

$helixCategoriasConfig = array(

    'OAX CAST' => array(
        'wo' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'CONFIGURAR',
            'cat_prod_1' => 'HARDWARE',
            'cat_prod_2' => 'COMPUTO PERSONAL',
            'cat_prod_3' => 'PC',
        ),
        'incidente' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'SOPORTAR',
            'cat_prod_1' => 'HARDWARE',
            'cat_prod_2' => 'COMPUTO PERSONAL',
            'cat_prod_3' => 'PC',
        ),
    ),

    'OAX CORREO ELECTRONICO' => array(
        'wo' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'CONFIGURAR',
            'cat_prod_1' => 'SW TECNOLOGIA DE INFORMACION',
            'cat_prod_2' => 'MENSAJERIA INSTITUCIONAL',
            'cat_prod_3' => 'EXCHANGE',
        ),
        'incidente' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'SOPORTAR',
            'cat_prod_1' => 'SW TECNOLOGIA DE INFORMACION',
            'cat_prod_2' => 'MENSAJERIA INSTITUCIONAL',
            'cat_prod_3' => 'EXCHANGE',
        ),
    ),

    'OAX DIRECTORIO ACTIVO' => array(
        'wo' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'CONFIGURAR',
            'cat_prod_1' => 'SW TECNOLOGIA DE INFORMACION',
            'cat_prod_2' => 'ARQUITECTURA DE SERVICIOS',
            'cat_prod_3' => 'ACTIVE DIRECTORY',
        ),
        'incidente' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'SOPORTAR',
            'cat_prod_1' => 'SW TECNOLOGIA DE INFORMACION',
            'cat_prod_2' => 'ARQUITECTURA DE SERVICIOS',
            'cat_prod_3' => 'ACTIVE DIRECTORY',
        ),
    ),

    'OAX IMPRESION LOCAL' => array(
        'wo' => array(
            'cat_ope_1' => 'INFRAESTRUCTURA DE COMPUTO E IMPRESION',
            'cat_ope_2' => 'IMPRESION',
            'cat_ope_3' => 'CONFIGURAR',
            'cat_prod_1' => 'HARDWARE',
            'cat_prod_2' => 'IMPRESION, FOTOCOPIADO Y DIGITALIZACION',
            'cat_prod_3' => 'IMPRESORA',
        ),
        'incidente' => array(
            'cat_ope_1' => 'INFRAESTRUCTURA DE COMPUTO E IMPRESION',
            'cat_ope_2' => 'IMPRESION',
            'cat_ope_3' => 'SOPORTAR',
            'cat_prod_1' => 'HARDWARE',
            'cat_prod_2' => 'IMPRESION, FOTOCOPIADO Y DIGITALIZACION',
            'cat_prod_3' => 'IMPRESORA',
        ),
    ),

    'OAX NSSA' => array(
        'wo' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'CONFIGURAR',
            'cat_prod_1' => 'SW PRESTACIONES ECONOMICAS Y SOCIALES',
            'cat_prod_2' => 'SUBSIDIOS Y AYUDAS',
            'cat_prod_3' => 'NSSA',
        ),
        'incidente' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'SOPORTAR',
            'cat_prod_1' => 'SW PRESTACIONES ECONOMICAS Y SOCIALES',
            'cat_prod_2' => 'SUBSIDIOS Y AYUDAS',
            'cat_prod_3' => 'NSSA',
        ),
    ),

    'OAX REDES Y CABLEADO' => array(
        'wo' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'CONFIGURAR',
            'cat_prod_1' => 'HARDWARE',
            'cat_prod_2' => 'TELECOMUNICACIONES',
            'cat_prod_3' => 'CABLEADO',
        ),
        'incidente' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'SOPORTAR',
            'cat_prod_1' => 'HARDWARE',
            'cat_prod_2' => 'TELECOMUNICACIONES',
            'cat_prod_3' => 'CABLEADO',
        ),
    ),

    'OAX SIAP' => array(
        'wo' => array(
            'cat_ope_1' => 'INFRAESTRUCTURA DE SERVIDORES',
            'cat_ope_2' => 'SERVIDORES',
            'cat_ope_3' => 'CONFIGURAR',
            'cat_prod_1' => 'SW ABASTO Y RH',
            'cat_prod_2' => 'RECURSOS HUMANOS',
            'cat_prod_3' => 'SIAP (SISTEMA INTEGRAL DE ADMINISTRACION DE PERSONAL)',
        ),
        'incidente' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'SOPORTAR',
            'cat_prod_1' => 'SW ABASTO Y RH',
            'cat_prod_2' => 'RECURSOS HUMANOS',
            'cat_prod_3' => 'SIAP (SISTEMA INTEGRAL DE ADMINISTRACION DE PERSONAL)',
        ),
    ),

    'OAX SIMF' => array(
        'wo' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'ACTUALIZAR MSL',
            'cat_prod_1' => 'SW MEDICO',
            'cat_prod_2' => 'PROVISION DE SERVICIOS MEDICOS',
            'cat_prod_3' => 'SIMF (SISTEMA DE INFORMACION DE MEDICINA FAMILIAR)',
        ),
        'incidente' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'SOPORTAR MSL',
            'cat_prod_1' => 'SW MEDICO',
            'cat_prod_2' => 'PROVISION DE SERVICIOS MEDICOS',
            'cat_prod_3' => 'SIMF (SISTEMA DE INFORMACION DE MEDICINA FAMILIAR)',
        ),
    ),

    'OAX TELEFONIA' => array(
        'wo' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'CONFIGURAR',
            'cat_prod_1' => 'HARDWARE',
            'cat_prod_2' => 'TELECOMUNICACIONES',
            'cat_prod_3' => 'TELEFONIA MOVIL',
        ),
        'incidente' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'SOPORTAR',
            'cat_prod_1' => 'HARDWARE',
            'cat_prod_2' => 'TELECOMUNICACIONES',
            'cat_prod_3' => 'TELEFONIA MOVIL',
        ),
    ),

    'OAX VIDEO CONFERENCIA' => array(
        'wo' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'ACTUALIZAR',
            'cat_prod_1' => 'HARDWARE',
            'cat_prod_2' => 'TELECOMUNICACIONES',
            'cat_prod_3' => 'VIDEOCONFERENCIA',
        ),
        'incidente' => array(
            'cat_ope_1' => 'APLICACIONES',
            'cat_ope_2' => 'ATENCION DE APLICACIONES',
            'cat_ope_3' => 'SOPORTAR',
            'cat_prod_1' => 'HARDWARE',
            'cat_prod_2' => 'TELECOMUNICACIONES',
            'cat_prod_3' => 'VIDEOCONFERENCIA',
        ),
    ),

);