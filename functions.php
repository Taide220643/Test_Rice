<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'km_rice');
    
    class DB_con {

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }

        public function insert( $kmname, $kmpic, $kmgroup ) {
            $result = mysqli_query($this->dbcon, "INSERT INTO km_unit(km_name,km_pic, km_group) VALUES('$kmname', '$kmpic', '$kmgroup')");
            return $result;
        }

        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM km_unit");
            return $result;
        }

        public function fetchonerecord($kmid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM km_unit WHERE km_id = '$kmid'");
            return $result;
        }

        public function update( $kmname, $kmid, $kmpic, $kmgroup ) {
            $result = mysqli_query($this->dbcon, "UPDATE km_unit SET 
                km_name = '$kmname',
                km_pic = '$kmpic'
                km_group = '$kmgroup'
                WHERE = $kmid
            " );
            return $result;
        }

        public function delete($kmid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM km_unit WHERE km_id = '$kmid'");
            return $deleterecord;
        }

    }
    

?>