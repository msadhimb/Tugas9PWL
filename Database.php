<?php
        class Database{
                function __construct(){
                        try{
                                $this->db = new PDO("mysql:host;host=localhost;dbname=pendaftaranakun", "root", "");
                        }catch(PDOException $e){
                                echo $e->getMessage();
                        }
                }

                function getDataAll(){
                        $rs = $this->db->query("SELECT * FROM users");
                        return $rs;
                }

                function getDataDetail(){
                        $idPisah = explode("|", base64_decode($_GET['id']));
                        $rs = $this->db->prepare("SELECT * FROM users WHERE id=?");
                        $rs->execute([$idPisah[1]]);
                        return $rs;
                }

                function insertData($data){
                        $rs = $this->db->prepare("INSERT INTO users (username, password, active) VALUES (:username, :password, :active)");
                        $rs->execute($data);
                }

                function editData($data){
                        $upd = $this->db->prepare("UPDATE users SET username=:username, password=:password WHERE id=:id");
                        $upd->execute($data);
                }

                function deleteData(){
                        $idPisah = explode("|", base64_decode($_GET['id']));
                        $del = $this->db->prepare("DELETE FROM users WHERE id=?");
                        $del->execute([$idPisah[1]]);
                }
        }