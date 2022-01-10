<?

session_start();
extract($_POST);
extract($_GET);

$kime = "ykarasu028@gmail.com"; // Mesajın gitmesini istediğin e-posta adresin.
$konu = "İletişim Formundan Mesaj!";
$DateandTime = date("d-m-Y H:i:s");
$mesaj = "İletişim Formunuzdan Gönderilen Mesajın İçeriği Aşağıdadır :

Adı - Soyadı: $GONDERENIN_ADI_SOYADI
E-Posta Adresi: $EPOSTA_ADRESI
Mesajın Konusu: $MESAJIN_KONUSU
Yazdığı Mesajı: $GONDERENIN_MESAJI
";
if ( $_POST["GONDERENIN_ADI_SOYADI"]=="")
{
    echo "Lütfen Adınızı ve Soyadınızı Giriniz.<BR> " . $_POST["GONDERENIN_ADI_SOYADI"];
    exit();
}

if ( $_POST["EPOSTA_ADRESI"]=="")
{
    echo "Lütfen E-Posta Adresinizi Giriniz.<BR> " . $_POST["EPOSTA_ADRESI"];
    exit();
}

if ( $_POST["GONDERENIN_MESAJI"]=="")
{
    echo "Lütfen Mesajınızı Giriniz.<BR> " . $_POST["GONDERENIN_MESAJI"];
    exit();
}


if (!@mail($kime, $konu, $mesaj, "From: $ADI_SOYADI <$EPOSTA_ADRESI>\nX-Mailer: PHP/" . phpversion()) )
{
    echo "Şu anda sistemimizde bir sorun bulunmaktadır.<BR>" .
         "Lütfen daha sonra tekrar deneyin.<BR>";
    exit();
}

header( "location: http://www.google.com.tr" ); // Mesaj gönderiltikten sonra yönlenmesini istediğin adres.

?>
