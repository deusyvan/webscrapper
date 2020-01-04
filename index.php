<?php 
$html = 'd_quina.htm';
$concurso = 5160;
require 'importador.php';
/* require 'simple_html_dom.php';
$html = file_get_html('d_quina.htm');
$posicao = 0;
foreach($html->find('td') as $td) {
    $td->plaintext;
   
    $posicao++;
}

echo $html; *///

sleep(10);
//Apaga as linhas com  table
shell_exec("sed -i '/table/d' ".$html);

//Apaga as linhas com  o body
shell_exec("sed -i '/body/d' ".$html);

//Apaga as linhas com html
shell_exec("sed -i '/html/d' ".$html);

//Apaga as linhas que possuem os tr
shell_exec("sed -i '/tr>/d' ".$html);
shell_exec("sed -i '/<tr/d' ".$html);

//Troca os td's e seus conteúdos por espaço em branco
shell_exec("sed -i 's/<[^>]*>//g' ".$html);

//TODO: deixando para rever e continuar no SED

//Pega o nr da linha que contem o nr do concurso
$numeroLinha = shell_exec("sed -n '/".$concurso."/h;\${x;=;}' ".$html);
$nr = trim($numeroLinha);
//echo $nr;exit;



//Cria script de sed que insere # até o nr do concurso que veio de parametro
$sedNr = " sed -n 'p' ".$html." | sed = | paste - - | sed '".$nr."s/^/#/' ";
//Executa o script e joga resultao na saida output
$output = shell_exec($sedNr);
echo "<pre>$output</pre>";

//Deleta as linhas em branco
//echo "$(sed = d_quina.htm)" > teste.txt;

//var_dump(teste.txt);
//Deleta as linhas em branco
//shell_exec("sed -i '/^$/d' ".$html);



//Retira todas as tags e seus conteudos: < xxxxx >
//shell_exec("sed -i '/<[^>]*>/d' ".$html);

exit;

//Quebra de linha
$quebraLinha = shell_exec(" sed -i ':a;$!N;s/^$/\n/g;ta' ".$html);

$sedNr = " sed -n 'p' ".$html." | sed = | paste - - | sed '1,122017s/^/#/' ";//| sed '/^#/d' ";

$output = shell_exec($sedNr);

echo "<pre>$output</pre>";

?>