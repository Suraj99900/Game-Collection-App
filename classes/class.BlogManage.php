<?php

require_once "../config.php";
require_once "DB-Connection.php";

class BlogManage
{
    private $oConnection;

    public function __construct()
    {
        $this->oConnection = new DBConnection();
    }

    public function addBlog($sTitle, $sAuthorName, $sData)
    {
        $oQueryBuilder = $this->oConnection->conn->createQueryBuilder();
        $sTableName = "blog_manage";

        $oQueryBuilder
            ->insert($sTableName)
            ->setValue('title', ':sTitle')
            ->setValue('author_name', ':sAuthorName')
            ->setValue('blog_data', ':sData')
            ->setValue('added_on',':dDate')
            ->setParameter('sTitle', $sTitle)
            ->setParameter('sAuthorName', $sAuthorName)
            ->setParameter('dDate',date("y-m-d"))
            ->setParameter('sData', $sData);

        try {
            $oQueryBuilder->executeQuery();
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function updateBlog($iId, $sTitle, $sAuthorName, $sData)
    {
        $oQueryBuilder = $this->oConnection->conn->createQueryBuilder();
        $sTableName = "blog_manage";

        $oQueryBuilder
            ->update($sTableName)
            ->set('title', ':sTitle')
            ->set('author_name', ':sAuthorName')
            ->set('blog_data', ':sData')
            ->where('id = :iId')
            ->setParameter('sTitle', $sTitle)
            ->setParameter('sAuthorName', $sAuthorName)
            ->setParameter('sData', $sData)
            ->setParameter('iId', $iId);

        try {
            $oQueryBuilder->executeQuery();
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function deleteBlog($iId)
    {
        $oQueryBuilder = $this->oConnection->conn->createQueryBuilder();
        $sTableName = "blog_manage";

        $oQueryBuilder
            ->update($sTableName)
            ->set('deleted', ':iDelete')
            ->where('id = :iId')
            ->setParameter('iDelete',1)
            ->setParameter('iId', $iId);

        try {
            $oQueryBuilder->executeQuery();
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getBlog($iId)
    {
        $oQueryBuilder = $this->oConnection->conn->createQueryBuilder();
        $sTableName = "blog_manage";

        $oQueryBuilder
            ->select("*")
            ->from($sTableName)
            ->where('id = :iId')
            ->setParameter('iId', $iId);

        try {
            return $oQueryBuilder->executeQuery()->fetchAssociative();
        } catch (\Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public function getAllBlogs($iLimit = "")
{
    $oQueryBuilder = $this->oConnection->conn->createQueryBuilder();
    $sTableName = "blog_manage";

    $oQueryBuilder
        ->select("*")
        ->from($sTableName)
        ->where('status = :iStatus')
        ->andWhere('deleted = :iDeleted')
        ->setParameter('iDeleted', 0)
        ->setParameter('iStatus', 1)
        ->orderBy("id", "DESC");

    if ($iLimit != "") {
        $oQueryBuilder->setMaxResults($iLimit);
    }

    try {
        return $oQueryBuilder->executeQuery()->fetchAllAssociative();
    } catch (\Exception $e) {
        die("Error: " . $e->getMessage());
    }
}

}

?>
