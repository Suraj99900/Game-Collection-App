<?php
require_once "../config.php";
require_once "DB-Connection.php";

function fetchSymptoms($sName)
{
    $oConnection = new DBConnection();
    $oQueryBuilder = $oConnection->conn->createQueryBuilder();
    $sTableName = "user_symptoms";

    $oQueryBuilder
        ->select("*")
        ->from($sTableName)
        ->where('name LIKE :sName')
        ->setParameter('sName', '%' . $sName . '%')
        ->orderBy('name', 'ASC');

    try {

        $oResult = $oQueryBuilder->executeQuery();
        if ($oResult) {
            $aRow = $oResult->fetchAllAssociative();
            return $aRow;
        }
    } catch (\Exception $e) {
        die("Error: " . $e->getMessage());
    }
}