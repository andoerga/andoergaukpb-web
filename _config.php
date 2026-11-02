<?php

$settingPath = "application/config/_setting.json";
$setting = file_get_contents($settingPath);
$setting = json_decode($setting, false);

define('WAKTU_BUKA', strtotime($setting->Pendaftaran->Buka));
if(time() > WAKTU_BUKA){
	define('WAKTU_TUTUP',strtotime($setting->Pendaftaran->Tutup));
}else{
	define('WAKTU_TUTUP',strtotime($setting->Pendaftaran->Tutup));
}

define('UJIAN_MULAI',strtotime($setting->Ujian->Mulai));
define('UJIAN_SELESAI',strtotime($setting->Ujian->Selesai));
