<?php

require_once 'Conn.php';
//classe abstrata que herda as funcionalidades de Conn.php
abstract class Crud extends Conn{

	protected $table;

	//abstract public function insert();

	public function find($id){
		$sql  = "SELECT * FROM $this->table WHERE login = :id";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
	}

	public function findAll(){
		$sql  = "SELECT * FROM $this->table";
		$stmt = Conn::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function delete($id){
		$sql  = "DELETE FROM $this->table WHERE nroConta = :id";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->execute();
	}

	public function alterar($id, $nroConta, $nroAgencia, $cliente, $conjugue, $saldo, $limite){
		$sql  = "UPDATE $this->table SET nroConta = :nroConta, nroAgencia = :nroAgencia,
		cliente = :cliente, conjugue = :conjugue, saldo = :saldo, limite = :limite WHERE nroConta = :id";
		$stmt = Conn::prepare($sql);
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		return $stmt->fetch();
	}


}
