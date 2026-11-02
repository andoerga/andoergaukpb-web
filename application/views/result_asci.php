<style>
body {
	font-family: courier;
}
</style>
<?php
$output = '';
foreach($ujian as $u){
foreach($soal_map[$u->id] as $s){ 
$output .= $s->kunci; 
}
}
$output .= '<br />';
foreach($ujian as $u){
foreach($soal_map[$u->id] as $s){ 
$output .= '4'; 
}
}
$output .= '<br />';
foreach($ujian as $u){
foreach($soal_map[$u->id] as $s){ 
$output .= 'Y'; 
}
}
$output .= '<br />';
 $n = 1; 
 foreach($peserta_ujian as $p){ 
 $score = 0; 
	
	$output .= $p['nama']; 
	$length = strlen($p['nama']);
	for($i=$length;$i<60;$i++){
		$output .= '&nbsp;';
	}
	//$output .=  $p['nip'] . '	'; 
	
	 foreach($ujian as $u){ 
		 $jawaban = json_decode($hasil[$p['user_id']][$u->id]->jawaban, true); 
		 $score += $hasil[$p['user_id']][$u->id]->score; 
		 foreach($soal_map[$u->id] as $s){ 
			 if(isset($jawaban[$s->id])){
				$output .= $jawaban[$s->id]; 
			 }else{ 
				$output .= '0';
			 } 
		 } 
	 } 
	$output .= '<br />';
 } 
 echo $output;