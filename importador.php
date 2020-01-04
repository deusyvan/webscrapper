<?php 

$url_quina = 'http://www1.caixa.gov.br/loterias/_arquivos/loterias/D_quina.zip';

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
curl_setopt($curl, CURLOPT_HTTPHEADER, array("Cookie: security=true"));
curl_setopt($curl, CURLOPT_URL, $url_quina);
curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.7; rv:7.0.1) Gecko/20100101 Firefox/7.0.1');
$return = curl_exec($curl);
curl_close($curl);
file_put_contents('quina.zip', $return);


$arquivo = getcwd().'/quina.zip';
$destino = getcwd().'/';

$za = new ZipArchive;
$za->open($arquivo);
if($za->extractTo($destino) == TRUE){
    echo 'Arquivo descompactado com sucesso.';
} else {
    echo 'O Arquivo não pode ser descompactado.';
}

$za->close();

?>