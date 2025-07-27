<?php
// Konfigurasi Database
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'panel_wa';
// Konfigurasi WhatsApp
$wa_api = 'https://api.whatsapp.com';
$wa_token = 'token_anda';
// Konfigurasi Panel
$panel_user = 'admin';
$panel_pass = 'password';
// Fungsi Kirim Pesan
function kirim_pesan($no_hp, $pesan) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $wa_api.'/send-message');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
    'token' => $wa_token,
    'to' => $no_hp,
    'message' => $pesan
  )));
  $response = curl_exec($ch);
  curl_close($ch);
  return $response;
}
// Fungsi Cek Status
function cek_status($no_hp) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $wa_api.'/check-status');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
    'token' => $wa_token,
    'to' => $no_hp
  )));
  $response = curl_exec($ch);
  curl_close($ch);
  return $response;
}
?>
