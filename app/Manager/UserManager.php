<?php

Class Connect extends W {

    function connectUser( $mail, $pass) {
        $sql = 'SELECT password, lastname, firstname FROM users WHERE mail LIKE :mail LIMIT 1';
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':mail', $mail);
        $stmt->execute();

        $user = $stmt->fetch();

        if (empty($user)) {
            return false;
        }
        $dbPass = $user['password'];
        if (password_verify($pass, $dbPass)) {
            return array(
                'lastname' => $user['lastname'],
                'firstname' => $user['firstname'],
                'mail' => $mail,
            );
        }
        return false;
    }

}