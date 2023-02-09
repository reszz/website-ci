<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    Anda berhasil Login.<br />
    anda login sebagai
    <bt />
    Username:
    <?php echo $this->session->userdata('username') ?> <br />
    Level:
    <?php echo $this->session->userdata('level') ?> <br />
    id pengguna:
    <?php echo $this->session->userdata('id') ?> <br />
</body>

</html>