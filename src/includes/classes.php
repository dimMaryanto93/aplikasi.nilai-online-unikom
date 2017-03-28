<?php

class Database {

    private $server = "localhost";
    private $username = "root";
    private $password = "admin";
    private $dbName = "nilaionline148";

    function getDriverConnection() {
        $mysqli = new mysqli($this->server, $this->username, $this->password, $this->dbName);
        try {
            if ($mysqli->connect_error) {
                throw new Exception($mysqli->connect_error);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $mysqli;
    }

}

class Admin {

    private $tableName = "admin";
    private $columnName = array("username", "password", "nama");

    function insertData($username, $pass, $nama) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $data = array($username, md5($pass), $nama);
        $query = $sql->getPerintahInsert($this->tableName, $data);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === false) {
                throw new Exception("Insert Data Failed : " . $mysqli->error);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        $db->getDriverConnection()->close();
    }

    function tampilSemuaData() {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $query = $sql->getPerintahSelectAll($this->tableName);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Show Data : " . $mysqli->error);
            } else {
                while ($rows = mysqli_fetch_array($result)) {
                    $data[] = $rows;
                }
            }
        } catch (Exception $ex) {
            echo "$ex->getMessage()";
        }
        $mysqli->close();
        return $data;
    }

    function tampilDataWihtID($field, $key) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $query = $sql->getPerintahSelectAll($this->tableName) . " WHERE " . $this->columnName[0] . " = '$key'";
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Show Data : " . $mysqli->error);
            } else {
                $data = mysqli_fetch_array($result);
            }
        } catch (Exception $ex) {
            echo "$ex->getMessage()";
        }
        $mysqli->close();
        if ($field == 0) {
            return $data[0];
        } else if ($field == 1) {
            return $data[1];
        } else if ($field == 2) {
            return $data[2];
        }
    }

    function updateData($username, $pass, $nama) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $data = array($username, md5($pass), $nama);
        $query = $sql->getPerintahUpdate($this->tableName, $this->columnName, $data);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Update Data" . $mysqli->error);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function deleteData($username) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $query = $sql->getPerintahDelete($this->tableName, $username, $this->columnName);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Update Data" . $mysqli->error);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    function searchData($value) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $query = $sql->getPerintahSelectAll($this->tableName)
                . " WHERE " . $this->columnName[0] . " LIKE '%$value%' "
                . "OR " . $this->columnName[2] . " LIKE '%$value%'";
        //echo "$query";
        try {
            $resultSet = mysqli_query($mysqli, $query);
            if ($resultSet === false) {
                throw new Exception("Failed Show Data :" . $mysqli->error);
            } else {
                while ($rows = mysqli_fetch_array($resultSet)) {
                    $data[] = $rows;
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $data;
    }

}

class Dosen {

    private $tableName = "dosen";
    private $columnName = array("nip", "nama", "kode_mtkul", "password");

    function insertData($nim, $nama, $kd_mtkul, $pass) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $data = array($nim, $nama, $kd_mtkul, md5($pass));
        $query = $sql->getPerintahInsert($this->tableName, $data);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === false) {
                throw new Exception("Insert Data Failed : " . $mysqli->error);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        $db->getDriverConnection()->close();
    }

    function tampilSemuaData() {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $query = $sql->getPerintahSelectAll($this->tableName);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Show Data : " . $mysqli->error);
            } else {
                while ($rows = mysqli_fetch_array($result)) {
                    $data[] = $rows;
                }
            }
        } catch (Exception $ex) {
            echo "$ex->getMessage()";
        }
        $mysqli->close();
        return $data;
    }   
    
    function tampilSemuaDataWithID($param) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $query = $sql->getPerintahSelectAll($this->tableName)." WHERE nip = '$param'";
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Show Data : " . $mysqli->error);
            } else {
                while ($rows = mysqli_fetch_array($result)) {
                    $data[] = $rows;
                }
            }
        } catch (Exception $ex) {
            echo "$ex->getMessage()";
        }
        $mysqli->close();
        return $data;
    }

    function tampilDataWihtID($field, $key) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $query = $sql->getPerintahSelectAll($this->tableName) . " WHERE " . $this->columnName[0] . " = '$key'";
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Show Data : " . $mysqli->error);
            } else {
                $data = mysqli_fetch_array($result);
            }
        } catch (Exception $ex) {
            echo "$ex->getMessage()";
        }
        $mysqli->close();
        if ($field == 0) {
            return $data[0];
        } else if ($field == 1) {
            return $data[1];
        } else if ($field == 2) {
            return $data[2];
        } else if ($field == 3) {
            return $data[3];
        }
    }

    function updateData($nim, $nama, $kd_mtkul, $pass) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $data = array($nim, $nama, $kd_mtkul, md5($pass));
        $query = $sql->getPerintahUpdate($this->tableName, $this->columnName, $data);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Update Data" . $mysqli->error);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function deleteData($nip) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $query = $sql->getPerintahDelete($this->tableName, $nip, $this->columnName);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Update Data" . $mysqli->error);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    function searchData($value) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();

        $sql = new perintahSQL();
        $query = $sql->getPerintahSelectAll($this->tableName)
                . " WHERE " . $this->columnName[0] . " LIKE '%$value%' "
                . "OR " . $this->columnName[1] . " LIKE '%$value%'";
        //echo "$query";
        try {
            $resultSet = mysqli_query($mysqli, $query);
            if ($resultSet === false) {
                throw new Exception("Failed Show Data :" . $mysqli->error);
            } else {
                while ($rows = mysqli_fetch_array($resultSet)) {
                    $data[] = $rows;
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $data;
    }

}

class Mahasiswa {

    private $tableName = "mahasiswa";
    private $columnName = array("nim", "nama", "jk", "jur", "password");

    function insertData($nim, $nama, $jk, $jur, $pass) {
        $db = new Database();
        $sql = new PerintahSQL();
        $mysqli = $db->getDriverConnection();
        $data = array($nim, $nama, $jk, $jur, md5($pass));
        $query = $sql->getPerintahInsert($this->tableName, $data);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === false) {
                throw new Exception("Insert Data Failed : " . $mysqli->error);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        $db->getDriverConnection()->close();
    }

    function tampilSemuaData() {
        $db = new Database();
        $sql = new PerintahSQL();
        $mysqli = $db->getDriverConnection();
        $query = $sql->getPerintahSelectAll($this->tableName);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Show Data : " . $mysqli->error);
            } else {
                while ($rows = mysqli_fetch_array($result)) {
                    $data[] = $rows;
                }
            }
        } catch (Exception $ex) {
            echo "$ex->getMessage()";
        }
        $mysqli->close();
        return $data;
    }

    function tampilDataWihtID($field, $key) {
        $db = new Database();
        $sql = new PerintahSQL();
        $mysqli = $db->getDriverConnection();
        $query = $sql->getPerintahSelectAll($this->tableName) . " WHERE " . $this->columnName[0] . " = '$key'";
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Show Data : " . $mysqli->error);
            } else {
                $data = mysqli_fetch_array($result);
            }
        } catch (Exception $ex) {
            echo "$ex->getMessage()";
        }
        $mysqli->close();
        if ($field == 0) {
            return $data[0];
        } else if ($field == 1) {
            return $data[1];
        } else if ($field == 2) {
            return $data[2];
        } else if ($field == 3) {
            return $data[3];
        } else if ($field == 4) {
            return $data[4];
        }
    }

    function updateData($nim, $nama, $jk, $jur, $pass) {
        $db = new Database();
        $sql = new PerintahSQL();
        $mysqli = $db->getDriverConnection();
        $data = array($nim, $nama, $jk, $jur, md5($pass));
        $query = $sql->getPerintahUpdate($this->tableName, $this->columnName, $data);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Update Data" . $mysqli->error);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function deleteData($nim) {
        $db = new Database();
        $sql = new PerintahSQL();
        $mysqli = $db->getDriverConnection();
        $query = $sql->getPerintahDelete($this->tableName, $nim, $this->columnName);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Update Data" . $mysqli->error);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    function searchData($value) {
        $db = new Database();
        $sql = new PerintahSQL();
        $mysqli = $db->getDriverConnection();
        $query = $sql->getPerintahSelectAll($this->tableName)
                . " WHERE " . $this->columnName[0] . " LIKE '%$value%' "
                . "OR " . $this->columnName[1] . " LIKE '%$value%'";
        //echo "$query";
        try {
            $resultSet = mysqli_query($mysqli, $query);
            if ($resultSet === false) {
                throw new Exception("Failed Show Data :" . $mysqli->error);
            } else {
                while ($rows = mysqli_fetch_array($resultSet)) {
                    $data[] = $rows;
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $data;
    }

}

class Matakuliah {

    private $tableName = "matakuliah";
    private $columnName = array("kode_mtkul", "nama_mtkul");

    function insertData($kode_mtkul, $nama_mtkul) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $data = array($kode_mtkul, $nama_mtkul);
        $query = $sql->getPerintahInsert($this->tableName, $data);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === false) {
                throw new Exception("Insert Data Failed : " . $mysqli->error);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        $db->getDriverConnection()->close();
    }

    function tampilSemuaData() {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $query = $sql->getPerintahSelectAll($this->tableName);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Show Data : " . $mysqli->error);
            } else {
                while ($rows = mysqli_fetch_array($result)) {
                    $data[] = $rows;
                }
            }
        } catch (Exception $ex) {
            echo "$ex->getMessage()";
        }
        $mysqli->close();
        return $data;
    }

    function tampilDataWihtID($field, $key) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $query = $sql->getPerintahSelectAll($this->tableName) . " WHERE " . $this->columnName[0] . " = '$key'";
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Show Data : " . $mysqli->error);
            } else {
                $data = mysqli_fetch_array($result);
            }
        } catch (Exception $ex) {
            echo "$ex->getMessage()";
        }
        $mysqli->close();
        if ($field == 0) {
            return $data[0];
        } else if ($field == 1) {
            return $data[1];
        }
    }

    function updateData($kode_mtkul, $nama_mtkul) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $data = array($kode_mtkul, $nama_mtkul);
        $query = $sql->getPerintahUpdate($this->tableName, $this->columnName, $data);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Update Data" . $mysqli->error);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function deleteData($kd) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $query = $sql->getPerintahDelete($this->tableName, $kd, $this->columnName);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Update Data" . $mysqli->error);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    function searchData($value) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();

        $sql = new perintahSQL();
        $query = $sql->getPerintahSelectAll($this->tableName)
                . " WHERE " . $this->columnName[0] . " LIKE '%$value%' "
                . "OR " . $this->columnName[1] . " LIKE '%$value%'";
        //echo "$query";
        try {
            $resultSet = mysqli_query($mysqli, $query);
            if ($resultSet === false) {
                throw new Exception("Failed Show Data :" . $mysqli->error);
            } else {
                while ($rows = mysqli_fetch_array($resultSet)) {
                    $data[] = $rows;
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $data;
    }

}

class Nilai {

    private $tableName = "nilai";
    private $columnName = array("ni_tugas", "ni_uts", "ni_uas", "nim", "nip");

    function insertData($ni_tugas, $ni_uts, $ni_uas, $nim, $nip) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $data = array($ni_tugas, $ni_uts, $ni_uas, $nim, $nip);
        $query = $sql->getPerintahInsert($this->tableName, $data);
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === false) {
                throw new Exception("Insert Data Failed : " . $mysqli->error);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        $db->getDriverConnection()->close();
    }

    function tampilSemuaData() {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $query = "
            SELECT m.nim, m.nama, n.ni_tugas, n.ni_uts, n.ni_uas,
            (n.ni_tugas * 0.2) + ( n.ni_uts * 0.4 ) + ( n.ni_uas * 0.4 ) AS nilai_akhir,
            ma.nama_mtkul, d.nama ,n.nip FROM mahasiswa m, nilai n, matakuliah ma
            , dosen d WHERE m.nim = n.nim AND ma.kode_mtkul = d.kode_mtkul
            AND d.nip = n.nip";
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Show Data : " . $mysqli->error);
            } else {
                while ($rows = mysqli_fetch_array($result)) {
                    $data[] = $rows;
                }
            }
        } catch (Exception $ex) {
            echo "$ex->getMessage()";
        }
        $mysqli->close();
        return $data;
    }
    
    function tampilSemuaDataNilai($param) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();        
        $query = "SELECT m.nim, m.nama, n.ni_tugas, n.ni_uts, n.ni_uas,
            (n.ni_tugas * 0.2) + ( n.ni_uts * 0.4 ) + ( n.ni_uas * 0.4 ) AS nilai_akhir,
            ma.nama_mtkul, d.nama ,n.nip FROM mahasiswa m, nilai n, matakuliah ma
            , dosen d WHERE m.nim = n.nim AND ma.kode_mtkul = d.kode_mtkul
            AND d.nip = n.nip AND n.nip = '".$param."'";
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Show Data : " . $mysqli->error);
            } else {
                while ($rows = mysqli_fetch_array($result)) {
                    $data[] = $rows;
                }
            }
        } catch (Exception $ex) {
            echo "$ex->getMessage()";
        }
        $mysqli->close();
        return $data;
    }
    
    function tampilSemuaDataNilaiIdMahasiswa($param) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();        
        $query = "SELECT m.nim, m.nama, n.ni_tugas, n.ni_uts, n.ni_uas,
            (n.ni_tugas * 0.2) + ( n.ni_uts * 0.4 ) + ( n.ni_uas * 0.4 ) AS nilai_akhir,
            ma.nama_mtkul, d.nama ,n.nip FROM mahasiswa m, nilai n, matakuliah ma
            , dosen d WHERE m.nim = n.nim AND ma.kode_mtkul = d.kode_mtkul
            AND d.nip = n.nip AND n.nim = '".$param."'";
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Show Data : " . $mysqli->error);
            } else {
                while ($rows = mysqli_fetch_array($result)) {
                    $data[] = $rows;
                }
            }
        } catch (Exception $ex) {
            echo "$ex->getMessage()";
        }
        $mysqli->close();
        return $data;
    }
    
    function tampilSearchDataNilaiWithID($param , $param2) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $query = "SELECT m.nim, m.nama, n.ni_tugas, n.ni_uts, n.ni_uas,
            (n.ni_tugas * 0.2) + ( n.ni_uts * 0.4 ) + ( n.ni_uas * 0.4 ) AS nilai_akhir,
            ma.nama_mtkul, d.nama ,n.nip FROM mahasiswa m, nilai n, matakuliah ma
            , dosen d WHERE m.nim = n.nim AND ma.kode_mtkul = d.kode_mtkul
            AND d.nip = n.nip AND n.nip = '$param' AND (n.nim like '%".$param2."%'"
                . " OR m.nama like '%".$param2."%')";
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Show Data : " . $mysqli->error);
            } else {
                while ($rows = mysqli_fetch_array($result)) {
                    $data[] = $rows;
                }
            }
        } catch (Exception $ex) {
            echo "$ex->getMessage()";
        }
        $mysqli->close();
        return $data;
    }
    
    function tampilSearchDataNilaiWithIDMahasiswa($param , $param2) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $query = "SELECT m.nim, m.nama, n.ni_tugas, n.ni_uts, n.ni_uas,
            (n.ni_tugas * 0.2) + ( n.ni_uts * 0.4 ) + ( n.ni_uas * 0.4 ) AS nilai_akhir,
            ma.nama_mtkul, d.nama ,n.nip FROM mahasiswa m, nilai n, matakuliah ma
            , dosen d WHERE m.nim = n.nim AND ma.kode_mtkul = d.kode_mtkul
            AND d.nip = n.nip AND n.nim = '$param' AND (n.nip LIKE '%".$param2."%'"
                . " OR d.nama LIKE '%".$param2."%' OR ma.nama_mtkul LIKE '%".$param2."%')";
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Show Data : " . $mysqli->error);
            } else {
                while ($rows = mysqli_fetch_array($result)) {
                    $data[] = $rows;
                }
            }
        } catch (Exception $ex) {
            echo "$ex->getMessage()";
        }
        $mysqli->close();
        return $data;
    }
    
    function tampilDataWihtID($field, $keyMhs, $keyDosen) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $sql = new perintahSQL();
        $query = $sql->getPerintahSelectAll($this->tableName) . " WHERE " .
                $this->columnName[3] . " = '$keyMhs' "
                . "AND " . $this->columnName[4] . " = '" . $keyDosen . "'";
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Show Data : " . $mysqli->error);
            } else {
                $data = mysqli_fetch_array($result);
            }
        } catch (Exception $ex) {
            echo "$ex->getMessage()";
        }
        $mysqli->close();
        if ($field == 0) {
            return $data[0];
        } else if ($field == 1) {
            return $data[1];
        } else if ($field == 2) {
            return $data[2];
        } else if ($field == 3) {
            return $data[3];
        } else if ($field == 4) {
            return $data[4];
        }
    }

    function updateData($tugas, $uts, $uas, $nim, $nip) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        //$sql = new perintahSQL();
        //$data = array($tugas, $uts, $uas, $nim, $nip);
        //$query = $sql->getPerintahUpdate($this->tableName, $this->columnName, $data);
        $query = "UPDATE nilai SET ni_tugas = " . $tugas . " ,ni_uts = " . $uts . " ,ni_uas = " . $uas . ""
                . " WHERE nim = '" . $nim . "' AND nip = '" . $nip . "'";

        //echo $query;
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Update Data" . $mysqli->error);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function deleteData($nim, $dosen) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        //$sql = new perintahSQL();
        $query = "DELETE FROM nilai WHERE nim='" . $nim . "' AND nip='" . $dosen . "'";
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Update Data" . $mysqli->error);
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    function searchData($value) {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        $query = "
            SELECT m.nim, m.nama, n.ni_tugas, n.ni_uts, n.ni_uas,
            (n.ni_tugas * 0.2) + ( n.ni_uts * 0.4 ) + ( n.ni_uas * 0.4 ) 
            AS nilai_akhir, ma.nama_mtkul, d.nama ,d.nip FROM mahasiswa m, nilai n, 
            matakuliah ma, dosen d WHERE m.nim = n.nim AND ma.kode_mtkul = d.kode_mtkul
            AND d.nip = n.nip AND 
            (m.nim LIKE '%" . $value . "%' OR m.nama LIKE '%" . $value . "%')";
        try {
            $resultSet = mysqli_query($mysqli, $query);
            if ($resultSet === false) {
                throw new Exception("Failed Show Data :" . $mysqli->error);
            } else {
                while ($rows = mysqli_fetch_array($resultSet)) {
                    $data[] = $rows;
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        $mysqli->close();
        return $data;
    }

    function tampilSemuaDataDosen() {
        $db = new Database();
        $mysqli = $db->getDriverConnection();
        //$sql = new perintahSQL();
        //$query = $sql->getPerintahSelectAll($this->tableName);
        $query = "SELECT d.nip , d.nama , m.nama_mtkul "
                . "FROM dosen d,matakuliah m "
                . "WHERE d.kode_mtkul = m.kode_mtkul ";
        try {
            $result = mysqli_query($mysqli, $query);
            if ($result === FALSE) {
                throw new Exception("Failed Show Data : " . $mysqli->error);
            } else {
                while ($rows = mysqli_fetch_array($result)) {
                    $data[] = $rows;
                }
            }
        } catch (Exception $ex) {
            echo "$ex->getMessage()";
        }
        $mysqli->close();
        return $data;
    }

}

class PerintahSQL {

    /**
     * @param type $table
     * @return type
     */
    function getPerintahSelectAll($table) {
        return "select * from $table";
    }

    /**
     * 
     * @param type $table 
     * @param type $column
     * @return type
     */
    function getPerintahInsert($table, $column = array()) {
        $jmlArray = count($column);
        $i = 0;
        foreach ($column as $value) {
            if ($i < $jmlArray - 1) {
                $gabung = $gabung . "'$value',";
            } else {
                $gabung = $gabung . "'$value'";
            }
            $i++;
        }
        $sql = "insert into $table values($gabung)";
        return $sql;
    }

    /**
     * assumsion column primary key is the first column
     * @param type $table = $tableMahasiswa
     * @param type $column = $columnMahasiswa
     * @param type $data = "10511148","Dimas Maryanto","SI","SI","SI-05"
     * @param type $value = "10511148"
     * @return type UPDATE mahasiswa SET nama = 'Dimas Maryanto' , fakultas = 'SI' ,
     *  prodi = 'SI' , kelas = 'SI-05' WHERE nim = 10511148
     */
    function getPerintahUpdate($table, $column = array(), $data = array()) {
        $jmlArray = sizeof($column) - 1;
        //$y = 2;
        for ($i = 1; $i <= $jmlArray; $i++) {
            if ($i == $jmlArray) {
                $col = $col . "$column[$i] = '" . $data[$i] . "' ";
            } else {
                $col = $col . "$column[$i] = '" . $data[$i] . "' , ";
            }
        }
        return "UPDATE $table SET $col WHERE $column[0] = '$data[0]'";
    }

    /**
     * 
     * @param type $table
     * @param type $key
     * @param type $column
     * @return type
     */
    function getPerintahDelete($table, $key, $column = array()) {
        return "DELETE FROM $table where $column[0] = '$key'";
    }

}

class Login {

    function cekLogin($user, $pass, $type) {
        $db = new Database();
        $sql = new PerintahSQL();
        if (!empty($type) || !empty($pass) || !empty($user)) {
            $db->getDriverConnection();
            if ($type == 'admin') {
                $query = $sql->getPerintahSelectAll($type) .
                        " WHERE username = '" . $user . "' "
                        . "AND password = '" . md5($pass) . "'";
            } else if ($type == 'dosen') {
                $query = $sql->getPerintahSelectAll($type) .
                        " WHERE nip = '" . $user . "' "
                        . "AND password = '" . md5($pass) . "'";
            } else if ($type == 'mahasiswa') {
                $query = $sql->getPerintahSelectAll($type) .
                        " WHERE nim = '" . $user . "' "
                        . "AND password = '" . md5($pass) . "'";
            }
            $result = mysqli_query($db->getDriverConnection(), $query)or die("Query Error");
            $data_user = mysqli_fetch_array($result);
            $num_rows = mysqli_num_rows($result);
            if ($num_rows == 1) {
                $_SESSION['login'] = TRUE;
                $_SESSION['id'] = $data_user[0];
                $_SESSION['type'] = $type;
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    function getSession() {
        return $_SESSION['login'];
    }

    function getSessionType() {
        return $_SESSION['type'];
    }

    function logout() {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }

    function directLink($akses) {
        if ($akses == "admin") {
            header("location:/unikomNilaiOnline/admin/index.php");
        } else if ($akses == "mahasiswa") {
            header("location:/unikomNilaiOnline/mahasiswa/index.php");
        } else if ($akses == "dosen") {
            header("location:/unikomNilaiOnline/dosen/index.php");
        }
    }

}        
?>