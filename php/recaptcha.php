<!-- <?PHP 
/* Fichier recaptcha.php */
// define("SITE_TUTO_EXEMPLE", "6LcJ2rUbAAAAAIhsklVDFccMGBH0rJXH0w-7Ag9Z");
// define('SECRETE_TUTO_EXEMPLE', '6LcJ2rUbAAAAADFbeB5WAOljQC1B7Cp6AH4ESpv1');
// /*----------------------------------------------------------------------------------*/
// function check_token($token, $secret_key)
// {
//     $verif_url  = "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$token";
//     $curl = curl_init($verif_url);
//     curl_setopt($curl, CURLOPT_HEADER, false);
//     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//     $verif_response = curl_exec($curl);
//     if (empty($verif_response)) return false;
//     else {
//         $json = json_decode($verif_response);
//         return $json->success;
//     }
// }
