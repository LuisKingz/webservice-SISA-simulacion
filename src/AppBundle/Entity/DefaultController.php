<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Services\Helpers;

class DefaultController extends Controller {

    public function indexAction(Request $request) {
        echo 'Servicios del sistema';
        die();
    }

    public function getInfoUserAction(Request $request) {
        $helpers = $this->get(Helpers::class);
        $em = $this->getDoctrine()->getManager();
        $respositry = $em->getRepository('AppBundle:Usuario');
        $result = $respositry->findAll();

        $data = array(
            'status' => 'error',
            'code' => 400,
            'msg' => 'No hay usuario',
            'result' => $result
        );

        if (count($result) != 0) {
            $data = array(
                'status' => 'success',
                'code' => 200,
                'msg' => 'Hay usuario',
                'result' => $result
            );
        }
        return $helpers->json($data);
    }

    // falta la subida de las imagenes
    public function createReportAction(Request $request) {
        $helpers = $this->get(Helpers::class);
        $em = $this->getDoctrine()->getManager();

        $json = $request->get("json", null);

        $params = json_encode($json);
        $description = $params->description;

        $IDsiniestro = $params->idsiniestro;
        $IDEspacioi = $params->idEspacio;

        $siniestro = $em->getRepository('AppBundle:Siniestro')->find($IDsiniestro);
        $espaciofisico = $em->getRepository('AppBundle:Espaciofisico')->find($espaciofisico);
        $reporte = new \AppBundle\Entity\Siniestro();
        $fecha = date_default_timezone_get();

        $reporte->setDescripcionsiniestro($description);
        $reporte->setFechasiniestro($fecha);
        $reporte->setEstadosiniestro(1);
        $reporte->setTiposiniestro($siniestro);

        $em->persist($reporte);
        $em->flush();

        $data = array(
            'status' => 'error',
            'code' => 400,
            'msg' => 'registro',
            'result' => $result
        );
    }

    public function getSiniestroAction() {
        $helpers = $this->get(Helpers::class);
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Siniestro');
        $result = $repository->findAll();
        $data = array(
            'status' => 'error',
            'code' => 400,
            'msg' => 'No hay registro de siniestro',
            'result' => $result
        );
        if (count($result) != 0) {
            $data = array(
                'status' => 'success',
                'code' => 200,
                'msg' => 'Siniestros',
                'result' => $result
            );
        }
        return $helpers->json($data);
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
		
		$sql = $em->createQuery("select b.tipobrigada,u.nombreusuario from AppBundle:Brigada as b 
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
        } else if (count($result2) != 0 && count($result3) != 0&& count($result5) == 0) {
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
               	'result4' => $result4,
                'result5' => $result5
            );
        }else if (count($result2) != 0 && count($result3) == 0 && count($result5) != 0) {
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
        }else if (count($result2) == 0 && count($result3) != 0 && count($result5) != 0) {
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


    /**
     * 
     * @return 
     */
    public function getBuildAction() {
        //$json = $request->get("json", null);
        //$param = json_decode($json);
        //$id = $param->id;
        $helpers = $this->get(Helpers::class);
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Inmueble');
        //$result = $repository->findBy(["idespaciofisico" => $id]);
        $result = $repository->findAll();
        $data = array(
            'status' => 'error',
            'code' => 400,
            'msg' => 'No hay registro de Edificios',
            'result' => $result
        );
        if (count($result) != 0) {
            $data = array(
                'status' => 'success',
                'code' => 200,
                'msg' => 'Edificios',
                'result' => $result
            );
        }
        return $helpers->json($data);
    }

    //Consulta de inmuebles
    public function getInmuebleAction() {
        $helpers = $this->get(Helpers::class);
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Inmueble');
        $result = $repository->findAll();
        $data = array(
            'status' => 'error',
            'code' => 400,
            'msg' => 'No hay registro de siniestro',
            'result' => $result
        );
        if (count($result) != 0) {
            $data = array(
                'status' => 'success',
                'code' => 200,
                'msg' => 'Siniestros',
                'result' => $result
            );
        }
        return $helpers->json($data);
    }

    //consulta de Espacios fisicos
    public function getEspacioFisicoAction() {
        $helpers = $this->get(Helpers::class);
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Espaciofisico');
        $result = $repository->findAll();
        $data = array(
            'status' => 'error',
            'code' => 400,
            'msg' => 'No hay registro de siniestro',
            'result' => $result
        );
        if (count($result) != 0) {
            $data = array(
                'status' => 'success',
                'code' => 200,
                'msg' => 'Siniestros',
                'result' => $result
            );
        }
        return $helpers->json($data);
    }

    public function getIncidenciaAction(Request $request) {
        $helpers = $this->get(Helpers::class);
        $em = $this->getDoctrine()->getManager();
        
        $descripcion = $request->get('descripcionincidencia');
        $id_siniestro = $request->get('idSiniestro');
        $id_espacioFisico = $request->get('idEspacioFisico');
        
        $incidencia = new \AppBundle\Entity\Incidencia();
        $incidencia->setDescripcionincidencia($descripcion);
        $incidencia->setFechaincidencia(new \DateTime());
        
        $espacio = $em->getRepository('AppBundle:Espaciofisico')->find($id_espacioFisico);
        $incidencia->setIdEspaciofisico($espacio);
        
        $siniestro = $em->getRepository('AppBundle:Siniestro')->find($id_siniestro);
        $incidencia->setIdSiniestro($siniestro);
        
        $em->persist($incidencia);
        $em->flush();
       
        $lista = $request->get("image", null);
        
        foreach ($lista as $item) {

            $image64 = str_replace('data:image/png;base64', '', $item);
            $image64N = str_replace(' ', '+', $image64);
            $dataImageBlob = base64_decode($image64N);
            
            $imageIncidencia = new \AppBundle\Entity\Fotoincidencia();
            $imageIncidencia->setIdIncidencia($incidencia);
            $imageIncidencia->setFotoincidencia($dataImageBlob);

            $em->persist($imageIncidencia);
            $em->flush();
        }
        
        $data = array(
            'status' => 'success',
            'code' => 200,
            'msg' => 'Nueva incicencia creada!!',
            'data' => $incidencia
        );

        return $helpers->json($data);
    }
    
    public function getIncidenciaInmuebleAction(Request $request){
        $helpers = $this->get(Helpers::class);
        $em = $this->getDoctrine()->getManager();

        $descripcion = $request->get('descripcionincidencia');
        $idespacioFisico = $request->get('idEspacioFisico');
        $idinmueble = $request->get('idInmueble');
        
        $incidencia = new \AppBundle\Entity\Incidencia();
        $incidencia->setDescripcionincidencia($descripcion);
        $incidencia->setFechaincidencia(new \DateTime());
        
        $espacio = $em->getRepository('AppBundle:Espaciofisico')->find($idespacioFisico);
        $incidencia->setIdEspaciofisico($espacio);
        $inmueble = $em->getRepository('AppBundle:Inmueble')->find($idinmueble);
        
        $em->persist($incidencia);
        $em->flush();
        
        $lista = $request->get("image", null);
        
        foreach ($lista as $item) {

            $image64 = str_replace('data:image/png;base64', '', $item);
            $image64N = str_replace(' ', '+', $image64);
            $dataImageBlob = base64_decode($image64N);
            $imageIncidencia = new \AppBundle\Entity\Fotoinmueble();
            $imageIncidencia->setIdInmueble($inmueble);
            $imageIncidencia->setFotoinmueble($dataImageBlob);

            $em->persist($imageIncidencia);
            $em->flush();
        }

            $data = array(
                'status' => 'success',
                'code' => 200,
                'msg' => 'Se cargo correctamente',
                'data' => $incidencia
            );
        return $helpers->json($data);

    }

}
