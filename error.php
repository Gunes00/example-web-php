<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script src="vendor/sweetalert/sweetalert2.all.min.js"></script>
<?php if (@$_GET['durum']=="no")  {?>  
    <script>
        Swal.fire({
            type: 'error',
            title: 'İşlem başarısız!',
            text: 'Lütfen tekrar deneyin!',
            showConfirmButton: true,
            confirmButtonText: 'Kapat'
        })
    </script>
<?php } ?>