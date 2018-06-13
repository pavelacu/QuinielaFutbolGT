<?php

function _posiciones_aciertos_detalle() {

    Security::sessionActive();

         $rondaID = Security::getSessionVar("RONDA");
          
     
      $db = new ObjectDB();
      
      $db->setTable("ronda");
      $db->getTableFields("ronda", "id = $rondaID");
      $rondaName = $db->getField("ronda");
      
      
      $db->setSql(FactoryDao::getRankingHitsDetail($rondaID));
      $db->executeQuery();
    

    $data['siteTitle'] = Security::getSessionVar("TITTLE").' Tabla de Posiciones';
    $data['body'][] = View::do_fetch(VIEW_PATH . 'main/ranking_hits_detail.php', array("lista" => $db,"ronda"=>$rondaName));
    View::do_dump(LAYOUT_PATH . 'layout.php', $data);
    
    $db->close();
}