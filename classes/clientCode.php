<?php
require_once "../config.php";
require_once "DB-Connection.php";

class clientCode
{

    public function getClientCodeByByCode($sCode)
    {
        $oConnection = new DBConnection();
        $oQueryBuilder = $oConnection->conn->createQueryBuilder();
        $sTableName = "client_code";

        $oQueryBuilder
            ->select("*")
            ->from($sTableName)
            ->where('client_id = :sCode')
            ->setParameter('sCode', $sCode);

        try {
            $oResult = $oQueryBuilder->executeQuery();
            if ($oResult) {
                $aRow = $oResult->fetchAssociative();
                if ($aRow) {
                    return $aRow;
                } else {
                    die("Clicent not found.");
                }
            }
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

}
