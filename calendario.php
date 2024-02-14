<?php
$year = 2024;
$monthNames = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
$feriados = array(
    '01-01' => 'Confraternização Universal',
    '02-12' => 'Carnaval',
    '02-13' => 'Carnaval',
    '02-14' => 'Quarta-feira de Cinzas',
    '03-29' => 'Paixão de Cristo',
    '04-21' => 'Tiradentes',
    '05-01' => 'Dia Mundial do Trabalho',
    '05-30' => 'Corpus Christi',
    '09-07' => 'Independência do Brasil',
    '10-12' => 'Nossa Senhora Aparecida',
    '11-02' => 'Finados',
    '11-15' => 'Proclamação da República',
    '11-20' => 'Dia Nacional de Zumbi e da Consciência Negra',
    '12-25' => 'Natal'
);

echo "<table>";
for ($m = 1; $m <= 12; $m++) {
    if (($m - 1) % 3 == 0) {
        echo "<tr>";
    }
    echo "<td>";
    $month = str_pad($m, 2, "0", STR_PAD_LEFT);
    $firstDayOfMonth = strtotime("$year-$month-01");
    $numDaysInMonth = date("t", $firstDayOfMonth);
    $daysInWeek = array("Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab");

    echo "<h2>" . $monthNames[$m - 1] . " $year</h2>";
    echo "<table>";
    echo "<tr>";
    foreach ($daysInWeek as $day) {
        echo "<th>$day</th>";
    }
    echo "</tr>";

    for ($d = 1; $d <= $numDaysInMonth; $d++) {
        $dayOfWeek = date("w", strtotime("$year-$month-$d"));
        if ($d == 1 || $dayOfWeek == 0) {
            echo "<tr>";
        }
        if ($d == 1 && $dayOfWeek != 0) {
            echo str_repeat("<td></td>", $dayOfWeek);
        }
        $dayStr = str_pad($d, 2, "0", STR_PAD_LEFT);
        if (isset($feriados["$month-$dayStr"])) {
            echo "<td class='feriado'>$d</td>";
        } else {
            echo "<td>$d</td>";
        }
        if ($d == $numDaysInMonth || $dayOfWeek == 6) {
            echo "</tr>";
        }
    }
    echo "</table>";
    echo "</td>";
    if ($m % 3 == 0) {
        echo "</tr>";
    }
}
echo "</table>";

echo "<h2>Feriados Nacionais $year</h2>";
echo "<table>";
echo "<tr><th>Data</th><th>Feriado</th></tr>";

foreach ($feriados as $data => $feriado) {
    echo "<tr><td>$data</td><td>$feriado</td></tr>";
}

echo "</table>";
echo "
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}

tr:nth-child(even) {
    background-color: #ffffe0;
}

th {
    background-color: #FF00FF;
    color: white;
}

.feriado {
    color: lime;
}
</style>
";

?>


