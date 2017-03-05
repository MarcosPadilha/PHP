<?php

require_once("connection/Conn.php");

class InscricaoModel{

     	public static function inscrever($aluno, $palestra){
     		$sql  = "INSERT INTO assiste (AluCodigo, PalCodigo) VALUES (:aluno, :palestra)";
     		$stmt = Conn::prepare($sql);
     		$stmt->bindParam(':aluno', $aluno);
     		$stmt->bindParam(':palestra', $palestra);
     		$stmt->execute();

     		// redirecionar para criar Aluno
     		//header('Location: ../views/criar_aluno.php?create=true');
     	}

          public static function findInscricoes($aluno, $palestra){
                    $sql  = "SELECT * FROM assiste WHERE AluCodigo = :aluno AND PalCodigo = :palestra";
                    $stmt = Conn::prepare($sql);
                    $stmt->bindParam(':aluno', $aluno);
                    $stmt->bindParam(':palestra', $palestra);
                    $stmt->execute();
                    return $stmt->fetch();
          }

          public static function findAll(){
                    $sql  = "SELECT * FROM assiste";
                    $stmt = Conn::prepare($sql);
                    $stmt->execute();
                    return $stmt->fetchAll();
          }

          public static function delete($aluno, $palestra){
               $sql  = "DELETE FROM assiste WHERE AluCodigo = :aluno AND PalCodigo = :palestra";
               $stmt = Conn::prepare($sql);
               $stmt->bindParam(':aluno', $aluno);
               $stmt->bindParam(':palestra', $palestra);
               return $stmt->execute();
          }

          public static function findPalestraForId($palestra){
                    $sql  = "SELECT AluCodigo, AssConfirmacao FROM assiste WHERE PalCodigo = :palestra AND AssConfirmacao = 0 ";
                    $stmt = Conn::prepare($sql);
                    $stmt->bindParam(':palestra', $palestra);
                    $stmt->execute();
                    return $stmt->fetchAll();
          }

          public static function setAssConfirmacao($aluno, $palestra , $valor){
               $sql  = "UPDATE assiste SET AssConfirmacao = :valor WHERE AluCodigo = :aluno AND PalCodigo =:palestra";
               $stmt = Conn::prepare($sql);
               $stmt->bindParam(':aluno', $aluno, PDO::PARAM_INT);
               $stmt->bindParam(':valor', $valor, PDO::PARAM_INT);
               $stmt->bindParam(':palestra', $palestra, PDO::PARAM_INT);
               return $stmt->execute();
               
          }

}



?>
