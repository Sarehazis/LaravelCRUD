<!DOCTYPE html>​

<html>​

<head>​

  <title>About</title>​

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">​

</head>​

<body>​

  <nav class="navbar navbar-default">​

    <div class="container-fluid">​

      <div class="navbar-header">​

        <a class="navbar-brand" href="/">Pemrograman Web 2</a>​

      </div>​

      <ul class="nav navbar-nav">​

        <li><a href="/projects">Projects</a></li>​

        <li><a href="/about">About</a></li>​

        <li class="active"><a href="/contact">Contact</a></li>​

      </ul>​

    </div>​

  </nav>​

  <div class="container">​

    <div class="row">
        <div class="col peding-100">
          <h1>Kontak Kami</h1>
          <p>
            Silahkan tinggalkan pesan anda, pada kolom yang tersedia.
          </p>
        </div>
 
        <div class="col peding-30">
          <form method="post" action="#">
             
            <div class="form-group">
              <label for="">Nama Anda:</label>
              <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
            </div>
 
            <div class="form-group">
              <label for="">E-mail Anda:</label>
              <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
            </div>
 
            <div class="form-group">
              <label for="">Pesan Anda:</label>
              <textarea name="pesan" class="form-control" cols="30" rows="7"></textarea>
            </div>
 
            <input class="btn btn-primary" type="submit" value="POST">
 
          </form>
        </div>
      </div>

  </div>​

</body>​

</html>​