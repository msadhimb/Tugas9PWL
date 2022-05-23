<?php
    include "Database.php";

    $d = new Database();
    $data = $d->getDataAll();

    $data->setFetchMode(PDO::FETCH_OBJ);  
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        body{
            background-color: #4D4C7D;
        }
        .jumbotron{
            width: inherit;
            padding: 100px;
            padding-left: 100px;
            background-color: #E9D5CA;
        }
        .pendaftaran{
            width: 50%;
        }
        .dataAkun{
            width: 60%;
            margin-bottom: 50px;
        }

        .btn-submit{
            background-color: #827397;
            color: #E9D5CA;
        }
    </style>
    <title>Hello, world!</title>
  </head>
  <body>
      <div class="jumbotron">
            <div class="container pendaftaran">
                <h1 class="text-center">Edit Data</h1>
                <?php
                    $cekuser=$d->getDataDetail();
                
                    if($cekuser->rowCount()>0){
                        $cekuser->setFetchMode(PDO::FETCH_OBJ);
                        $user = $cekuser->fetch();
                ?>
                <form method="POST" action="editData_function.php">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $user->username ?>">
                        <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <input type="hidden" name="id" value="<?php echo base64_encode(sha1(rand())."|".$user->id)?>">
                    <button type="submit" class="btn btn-submit">Submit</button>
                </form>
                <?php } ?>
            </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#E9D5CA" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,117.3C384,117,480,139,576,144C672,149,768,139,864,117.3C960,96,1056,64,1152,69.3C1248,75,1344,117,1392,138.7L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <div class="container dataAkun">
        <div class="row ">
            <h1 class="text-center text-white">Data Akun</h1>
            <h4 class="text-white">Jumlah : <?php echo $data->rowCount()?></h4>
            <table class="table text-center table-dark table-striped">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    foreach($data as $ddata => $list){ ?>
                    <tr>
                        <td scope="row"><?php echo $i?></td>
                        <td><?php echo $list->username?></td>
                        <td><a href="editData.php?id=<?php echo base64_encode(sha1(rand())."|".$list->id)?>" class="btn btn-success edit disabled">Edit</a> | <a href="deleteData.php?id=<?php echo base64_encode(sha1(rand())."|".$data->id)?>" class="btn btn-outline-danger disabled">Delete</a></td>
                    </tr>
                    <?php 
                    $i++;
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>