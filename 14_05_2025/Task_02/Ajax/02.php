<?php
include "config.php";
$_SESSION['token'] = md5(uniqid());
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <hr>
    <input type="text" name="name" id="txt_name">
    <hr>
    <h3 id="res_display"></h3>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        $("#txt_name").keyup(function() {
            var name = $(this).val();

            if(name == "") {
                $("#res_display").html("");
                return false;
            }

            $.ajax({
                url: "search_2.php",
                method: "post",
                data: {
                    name: name
                },
                headers: {
                    'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>' 
                },
                success: function(data) {
                    $("#res_display").html(data);
                }
            });
        });
    });
</script>