<?php
require_once "../config.php";
require_once "DB-Connection.php";

class UserManage
{
    public $sName;
    public $iType;

    function __construct($iId = null)
    {
        if ($iId !== null) {
            $this->fetchById($iId);
        }
    }

    function fetchById($iId)
    {
        $oConnection = new DBConnection();
        $oQueryBuilder = $oConnection->conn->createQueryBuilder();
        $sTableName = "app_user";

        $oQueryBuilder
            ->select("*")
            ->from($sTableName)
            ->where('id = :id')
            ->andWhere('status = :iStatus')
            ->setParameter('id', $iId)
            ->setParameter('iStatus', 1);

        try {
            $oResult = $oQueryBuilder->executeQuery();
            if ($oResult) {
                $aRow = $oResult->fetchAssociative();
                if ($aRow) {
                    $this->sName = $aRow['name'];
                    $this->iType = $aRow['user_type'];
                } else {
                    die("User not found.");
                }
                return $aRow;
            }
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    function addUser($sName, $sPassword, $iType)
    {
        $oConnection = new DBConnection();
        $oQueryBuilder = $oConnection->conn->createQueryBuilder();
        $sTableName = "app_user";

        $oQueryBuilder
            ->insert($sTableName)
            ->setValue('name', ':name')
            ->setValue('password', ':password')
            ->setValue('user_type', ':user_type')
            ->setValue('added_on',':dDate')
            ->setParameter('name', $sName)
            ->setParameter('password', password_hash($sPassword, PASSWORD_BCRYPT))
            ->setParameter('dDate',date("y-m-d"))
            ->setParameter('user_type', $iType);

        try {
            $oQueryBuilder->executeQuery();
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    function updateUser($iId, $sName, $sPassword, $iType)
    {
        $oConnection = new DBConnection();
        $oQueryBuilder = $oConnection->conn->createQueryBuilder();
        $sTableName = "app_user";

        $oQueryBuilder
            ->update($sTableName)
            ->set('name', ':name')
            ->set('password', ':password')
            ->set('user_type', ':user_type')
            ->where('id = :id')
            ->setParameter('name', $sName)
            ->setParameter('password', password_hash($sPassword, PASSWORD_BCRYPT))
            ->setParameter('user_type', $iType)
            ->setParameter('id', $iId);

        try {
            $oQueryBuilder->executeQuery();
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    function deleteUser($iId)
    {
        $oConnection = new DBConnection();
        $oQueryBuilder = $oConnection->conn->createQueryBuilder();
        $sTableName = "app_user";

        $oQueryBuilder
            ->delete($sTableName)
            ->where('id = :id')
            ->setParameter('id', $iId);

        try {
            $oQueryBuilder->executeQuery();
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    function fetchAll()
    {
        $oConnection = new DBConnection();
        $oQueryBuilder = $oConnection->conn->createQueryBuilder();
        $sTableName = "app_user";

        $oQueryBuilder
            ->select("*")
            ->from($sTableName)
            ->where('status = :iStatus')
            ->setParameter('iStatus', 1);

        try {
            $oResult = $oQueryBuilder->executeQuery();
            return $oResult->fetchAllAssociative();
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    function login($sName, $sPassword)
    {
        $oConnection = new DBConnection();
        $oQueryBuilder = $oConnection->conn->createQueryBuilder();
        $sTableName = "app_user";
    
        $oQueryBuilder
            ->select("*")
            ->from($sTableName)
            ->where('status = :iStatus')
            ->andWhere("name = :sName")
            ->setParameter("sName", $sName)
            ->setParameter('iStatus', 1);
    
        try {
            $oResult = $oQueryBuilder->executeQuery();
            while ($oRow = $oResult->fetchAssociative()) {
                if (password_verify($sPassword, $oRow['password'])) {
                    return $oRow;
                }
            }
            return false;
    
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }    
}

