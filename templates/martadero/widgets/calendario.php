<?php

function print_array_month($time) {
    $array = array();

    // Impresion del nombre del mes
    $array[0] = array(
        date('F', $time),
        date('Y', $time)
    );

    // Impresion de las cabeceras de dia
    $array[1] = array('do', 'lu', 'ma', 'mi', 'ju', 'vi', 'sá');

    //Calculo el time de la semana que cae primero de mes
    $time_first_day = mktime(0, 0, 0, date('n', $time), 1, date('Y', $time));
    $time_last_day = mktime(0, 0, 0, date('n', $time), date('t', $time), date('Y', $time));
    $time_day = $time_first_day;

    // Recorro cada dia del mes
    $array_week = array();
    while ($time_day <= $time_last_day) {
        $array_week[date('w', $time_day)] = date('j', $time_day);

        if (date('w', $time_day) == 6) {
            $array[] = $array_week;
            $array_week = array();
        }

        $time_day = $time_day + 86400;
    }

    if(!empty($array_week)) {
        $array[] = $array_week;
    }

    return $array;
}

$translate = array(
    'january' => 'enero',
    'february' => 'febrero',
    'march' => 'marzo',
    'april' => 'abril',
    'may' => 'mayo',
    'june' => 'junio',
    'july' => 'julio',
    'august' => 'agosto',
    'september' => 'septiembre',
    'october' => 'octubre',
    'november' => 'noviembre',
    'december' => 'diciembre',
);

$date = print_array_month(time());

?>
<div class="post">
    <h1>Este mes en el mARTadero</h1>
    <table class="calendar">
        <tr>
            <td class="text-center bold">
                <a href="">&lsaquo;&lsaquo;</a>
            </td>
            <td colspan="5" class="text-center bold">
                <h2><a href=""><?php echo ucfirst($translate[strtolower($date[0][0])]) . ' ' . $date[0][1] ?></a></h2>
            </td>
            <td class="text-center bold">
                <a href="">&rsaquo;&rsaquo;</a>
            </td>
        </tr>
        <tr>
            <td class="bold"><?php echo implode('</td><td class="bold">', $date[1]) ?></td>
        </tr>
    <?php for($i = 2; $i < count($date); $i++) { ?>
        <tr>
        <?php for($j = 0; $j < 7; $j++) { ?>
            <td><?php echo isset($date[$i][$j]) ? $date[$i][$j] : '' ?></td>
        <?php } ?>
        </tr>
    <?php } ?>
    </table>
</div>
