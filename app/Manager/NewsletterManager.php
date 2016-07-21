<?php

namespace Manager;

class NewsletterManager extends \W\Manager\Manager 
{
    public function emailExists($mail)
    {
        $sql ='SELECT mail FROM newsletters WHERE mail=:mail';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
        return $stmt->fetch();
    }
}