<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "inovation@montechelo.com.co"; 
    $subject = "Nuevo mensaje de contacto";
    
    // Obtener los datos del formulario
    $name = htmlspecialchars($_POST["name"]);
    $country = htmlspecialchars($_POST["country"]);
    $city = htmlspecialchars($_POST["city"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $email = htmlspecialchars($_POST["email"]);
    $company = htmlspecialchars($_POST["company"]);
    $service = htmlspecialchars($_POST["service"]);
    $terms = isset($_POST["terms"]) ? "Aceptado" : "No aceptado";

    // Cabeceras del correo
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Cuerpo del correo
    $body = "Nombre: $name\n";
    $body .= "País: $country\n";
    $body .= "Ciudad: $city\n";
    $body .= "Celular: $phone\n";
    $body .= "Correo corporativo: $email\n";
    $body .= "Empresa: $company\n";
    $body .= "Servicio solicitado:\n$service\n\n";
    $body .= "Aceptación de términos: $terms\n";

    // Intentar enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "Invalid request";
}
?>
