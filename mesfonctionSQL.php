<?php


        function databaseconnexion() {
            try {
                $user = "root";
                $pass = "" ;
                $pdo = new PDO('mysql:host=localhost;dbname=tips',
                $user, $pass);
                $pdo->setattribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

                return $pdo;

            } catch (PDOExeption $e){
                print "Erreur !: " . $e->getmessage() . "<br/>";
                die();
            }
        }
        function readtips($id)
        {

            $con = getdatabaseconnexion();
            $requete = "SELECT * from t_tips where id = '$id";
            $stmt = $con->query($requete);
            $row = $stmt->fetchall();
            if (!empty($row)) {
                return $row[0]
            }
         }

        function updatetips($titre_tips, $tips,){
            try{
                $con = getdatabaseconnecion();
                $requete = "UPDATE t_tips set
                langage ='$langage',
                categorie = '$categorie',
                titre tips = '$titretips',
                tips = '$tips', ";
            $stmt = $con->query($requete);
            }
            catch(PDOExecption $e) {
                echo $sql . "<br>" . $e->getmessage();
            }
        }

        function deletetips($id){
            try {
                $con = getdatabaseconnexion();
                $requete = "DELETE fron t_tips chere id = 'id'";
                $stmt = $con->query($requete);
            }
            catch(PDOException $e){
                echo $sql "<br>" $e->getmessage();
            }
        }

?>
