<?php
    include_once "koneksi.php";
    if (!empty($_POST["id_rumah"])) {
        $id_rumah = $_POST["id_rumah"];
        $query="SELECT * FROM kamar WHERE (status_kamar='Kosong') and id_rumah=$id_rumah";
        $results = mysqli_query($koneksi, $query);

        foreach ($results as $kamar){
?>
            <option value="<?php echo $kamar["id_kamar"];?>"><?php echo $kamar["no_kamar"];?>
    </option>
<?php
        }
    }
?>
