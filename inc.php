<?php
function ping () {
$hosts    = array();
$hosts_ip = array(
'Domaine de la baie'    => '192.168.61.254',
'Iroise'    => '192.168.62.254'
);

foreach($hosts_ip as $hostname => $host_data){
$host_ip    = $host_data[0];
$host_port  = $host_data[1];
$socket     = 0;
$socket     = @fsockopen($host_ip, $host_port, $errno, $errstr, 3);
if($socket && !$errno){$hosts[$hostname] = 'up';}
else{$hosts[$hostname] = 'down';}
}

$html  = '';
$html .= '<table cellspacing="10px">';
    $c=0;
    foreach($hosts as $hostname => $host_status){
    if($c == 0){$html .= '<tr>';}
        $html .= '<td class="ping ping_'.$host_status.'">'.$hostname.'</td>';
        $c++;
        if($c == 2){$c = 0; $html .= '</tr>';}
    }
    if($c != 0){$html .= '</tr>';}
    $html .= '</table>';

return $html;
}
