<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/formBuyCourseStyle.css">
    <link rel="stylesheet" href="../CSS/menuStyle.css">
    <title>Comprar</title>
</head>
<body>
    <?php include 'menuDefault.php'; 
        $id_course = $_POST['id_course'];
        $course_name = $_POST['course_name'];
        $course_duration = $_POST['course_duration'];
        $price = $_POST['course_price'];
        $id_user = $_SESSION['id_user']; 
        //echo "$id_course<br>$price<br>$id_user<br>";
    ?>
    <main id="content">
        <div class="form-buy">
            <h1>Detalhes do pagamento</h1>
            <form action="" method="POST">
                <div class="form-fields">
                    <div class="course-name">
                        <label for="course_name">Curso:</label>
                        <input type="text" name="course_name" value="<?=$course_name?>" readonly>
                    </div>  
                    <div class="course-duration">
                        <label for="course_duration">Duração:</label>
                        <input type="text" name="course_duration" value="<?=$course_duration?>" readonly>
                    </div>
                    <div class="course-price">
                        <label for="course_price">Valor:</label>
                        <input type="text" name="course_price" value="<?=$price?>" readonly>
                    </div>  
                    <div class="payment">
                        <label for="payment">Forma de pagamento:</label>
                        <select name="payment" id="payment">
                            <option value="Cartão de crédito">Cartão de crédito</option>
                            <option value="Cartão de débito">Cartão de débito</option>
                            <option value="Pix">Pix</option>
                            <option value="Boleto">Boleto</option>
                        </select>
                    </div>
                </div>
                <div class="btn-finalizar">
                    <input id="btn-fin" type="submit" value="Finalizar">
                </div>
            </form>
        </div>
    </main>
    <script src="../JS/controleMenu.js"></script>
    
</body>
</html>