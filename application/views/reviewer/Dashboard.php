<html>
  <head>
    <title>TEST LOGIN || SITA </title>
  </head>
  <body>
      <center>
        <h1>Membuat Login MultiLevel Menggunakan Session Codeigniter || SITA </h1><br />
        <h2>SELAMAT DATANG ANDA TELAH BERHASIL LOGIN SEBAGAI Reviewer  </h2>
        <h3> Username Anda Adalah <?php echo $this->session->userdata('nama'); ?></h3><br /><br />
		<a href="<?php echo site_url('dosen/penelitian'); ?>">Judul Penelitian</a><br>
		<a href="<?php echo site_url('dosen/bimbingan'); ?>">Daftar Mahasiswa sebagai pembimibing</a><br>
		<a href="<?php echo site_url('reviewer/reviewer/review'); ?>">Reviewer</a><br>
        <a href="<?php echo site_url('authentication/auth/logout'); ?>">Keluar</a>
		
      </center>
    </form>
  </body>
</html>
