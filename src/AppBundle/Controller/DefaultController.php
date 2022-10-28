<?php

namespace AppBundle\Controller;

use AppBundle\Services\Helpers;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

    public function indexAction(Request $request) {
        echo "Servicios del SISA";
        die();
    }

    public function loginAction(Request $request) {
        $helper = $this->get(Helpers::class);
        $em = $this->getDoctrine()->getManager();

        $json = $request->get("json", null);
        $params = json_decode($json);

        $user = (isset($params->user)) ? $params->user : null;
        $password = (isset($params->pass)) ? $params->pass : null;


        $login = $em->getRepository("AppBundle:Usuario")
                ->findOneBy(['usuario' => $user, 'pass' => $password]);


        $data = array(
            'status' => 'error',
            'code' => 400,
            'msg' => 'Usuario o contraseña incorrecta',
            'token' => 0,
            'data' => null
        );

        if ($login != null) {
            $rol = $login->getTipousuario();
            $clave = $login->getClaveidentidad();

            if ($rol == 'estudiante') {
                $estudiante = $em->getRepository("AppBundle:Alumno")->findOneBy(["matricula" => $clave]);
                $data = array(
                    'status' => 'success',
                    'code' => 200,
                    'msg' => 'Bienvenido',
                    'token' => 1,
                    'data' => $estudiante
                );
            } else if ($rol == 'docente') {
                $docente = $em->getRepository("AppBundle:Profesor")->findOneBy(["idprofesor" => $clave]);
                $data = array(
                    'status' => 'success',
                    'code' => 200,
                    'msg' => 'Bienvenido',
                    'token' => 2,
                    'data' => $docente
                );
            } else {
                $data = array(
                    'status' => 'success',
                    'code' => 200,
                    'msg' => 'Ah ocurrido un error',
                    'token' => 1,
                    'data' => null
                );
            }
        } else {
            $data = array(
                'status' => 'error',
                'code' => 400,
                'msg' => 'Usuario o contarseña incorrecta',
                'token' => 0,
                'data' => null
            );
        }
        return $helper->json($data);
    }

    public function getDocenteAction() {
        $helpers = $this->get(Helpers::class);
        $em = $this->getDoctrine()->getManager();

        $docente = $em->getRepository("AppBundle:Profesor")->findAll();

        $data = array(
            'status' => 'error',
            'code' => 400,
            'msg' => 'No hay registros',
            'data' => null
        );

        if (count($docente) != 0) {

            $data = array(
                'status' => 'success',
                'code' => 200,
                'msg' => 'Datos de los docentes',
                'data' => $docente
            );
        }
        return $helpers->json($data);
    }

    public function getAlumnoAction() {
        $helper = $this->get(Helpers::class);
        $em = $this->getDoctrine()->getManager();

        $alumno = $em->getRepository("AppBundle:Alumno")->findAll();

        $data = array(
            'status' => 'error',
            'code' => 400,
            'msg' => 'No hay registros',
            'data' => null
        );

        if (count($alumno) != 0) {

            $data = array(
                'status' => 'success',
                'code' => 200,
                'msg' => 'Datos de los alumnos',
                'token' => 0,
                'data' => $alumno
            );
        }
        return $helper->json($data);
    }

    public function getInfoBuildingAction(Request $request) {
        $json = $request->get("json", null);
        $param = json_decode($json);
        $id = $param->id;
        $helpers = $this->get(Helpers::class);
        $em = $this->getDoctrine()->getManager();

        $repository = $em->getRepository('AppBundle:Inmueble');
        $result = $repository->findBy(['idinmueble' => $id]);

        $repository = $em->getRepository('AppBundle:Divisionacademica');
        $result2 = $repository->findBy(['idInmueble' => $id]);

        $repository = $em->getRepository('AppBundle:Academia');
        $result3 = $repository->findBy(['idInmueble' => $id]);

//        $repository = $em->getRepository('AppBundle:Brigada');
//        $result4 = $repository->findBy(['idInmueble' => $id]);
//        //$idB = $result4->getIdbrigada();
//        $a = array();
//        for ($i = 0; $i < count($result4); $i++) {
//            $a[$i] = $result4[$i]->getIdbrigada();
//        };
//
//
//        for ($i = 0; $i < count($a); $i++) {
//            $repository = $em->getRepository('AppBundle:Usuariobrigada');
//            $result4 = $repository->findBy(['idBrigada' => $a[$i]]);
//        };


        $repository = $em->getRepository('AppBundle:Espaciofisico');
        $result5 = $repository->findBy(['idInmueble' => $id]);
       
//        $a->executeQuery("select * from Brigada inner join UsuarioBrigada on idBrigada = id_brigada inner join Usuario on id_usuario = idUsuario where id_inmueble = 1");
        $sql = $em->createQuery("select b.tipobrigada,u.nombreusuario, u.correousuario, u.telefonousuario from AppBundle:Brigada as b 
            inner join AppBundle:Usuariobrigada as ub with b.idbrigada = ub.idBrigada 
            inner join AppBundle:Usuario as u with ub.idUsuario = u.idusuario 
            WHERE b.idInmueble = :id")->setParameter('id',$id);
        $result4 = $sql->getResult();
       
        $data = array(
            'status' => 'error',
            'code' => 400,
            'msg' => 'No hay registro de Edificios',
            'result' => $result,
            'result2' => ' ',
            'result3' => ' ',
            'result4' => $result4,
            'result5' => ' '
        );
        if (count($result2) != 0 && count($result3) != 0 && count($result5) != 0) {
            $data = array(
                'status' => 'success',
                'code' => 200,
                'msg' => 'Edificios',
                'result' => $result,
                'result2' => $result2,
                'result3' => $result3,
                'result4' => $result4,
                'result5' => $result5
            );
        } else if (count($result2) != 0 && count($result3) != 0 && count($result5) == 0) {
            $data = array(
                'status' => 'success',
                'code' => 200,
                'msg' => 'Edificios',
                'result' => $result,
                'result2' => $result2,
                'result3' => $result3,
                'result4' => $result4,
                'result5' => ' '
            );
        } else if (count($result2) != 0 && count($result3) != 0 && count($result5) != 0) {
            $data = array(
                'status' => 'success',
                'code' => 200,
                'msg' => 'Edificios',
                'result' => $result,
                'result2' => $result2,
                'result3' => $result3,
                'result4' => ' ',
                'result5' => $result5
            );
        } else if (count($result2) != 0 && count($result3) == 0 && count($result5) != 0) {
            $data = array(
                'status' => 'success',
                'code' => 200,
                'msg' => 'Edificios',
                'result' => $result,
                'result2' => $result2,
                'result3' => ' ',
                'result4' => $result4,
                'result5' => $result5
            );
        } else if (count($result2) == 0 && count($result3) != 0 && count($result5) != 0) {
            $data = array(
                'status' => 'success',
                'code' => 200,
                'msg' => 'Edificios',
                'result' => $result,
                'result2' => ' ',
                'result3' => $result3,
                'result4' => $result4,
                'result5' => $result5
            );
        }


        return $helpers->json($data);
    }

}
