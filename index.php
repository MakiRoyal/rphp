<?php

$employees = [
    ['name' => 'Max', 'age' => 17],
    ['name' => 'Sepp', 'age' => 18],
    ['name' => 'Nina', 'age' => 16],
    ['name' => 'Joel', 'age' => 42],
    ['name' => 'Ellie', 'age' => 19],
    ['name' => 'Henry', 'age' => 34]
];

function employeesAllowedToWorkOnSunday($employees)
{
    $allowedEmployees = [];
    foreach ($employees as $employee) {
        if ($employee['age'] >= 18) {
            array_push($allowedEmployees, $employee['name']);
        }
    }
    return $allowedEmployees;
}

$allowedEmployees = employeesAllowedToWorkOnSunday($employees);

echo "Les employés autorisés à travailler le dimanche sont : " . implode(", ", $allowedEmployees) . ".<br><br>";

function sortEmployeesByName($employees)
{
    usort($employees, function ($a, $b) {
        return $a['name'] <=> $b['name'];
    });
    return $employees;
}

$sortedEmployees = sortEmployeesByName($employees);

echo "La liste des employés triée par leur nom est :<br>";
foreach ($sortedEmployees as $employee) {
    echo "- " . $employee['name'] . "<br><br>";
}

function uppercaseEmployeeNames($employees)
{
    $uppercasedEmployees = array();
    foreach ($employees as $employee) {
        $employee['name'] = strtoupper($employee['name']);
        array_push($uppercasedEmployees, $employee);
    }
    return $uppercasedEmployees;
}

$uppercasedEmployees = uppercaseEmployeeNames($employees);

echo "La liste des employés en majuscules est :<br>";
foreach ($uppercasedEmployees as $employee) {
    echo "- " . $employee['name'] . "<br><br>";
}

function sortEmployeesByNameDescending($employees)
{
    usort($employees, function ($a, $b) {
        return $b['name'] <=> $a['name'];
    });
    return $employees;
}

$sortedEmployeesDescending = sortEmployeesByNameDescending($employees);

echo "La liste des employés triée par leur nom en ordre décroissant est :<br>";
foreach ($sortedEmployeesDescending as $employee) {
    echo "- " . strtoupper($employee['name']) . "<br><br>";
}


function generateWeeklySchedule($employees)
{

    $daysOfWeek = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    
    $schedule = array();

    foreach ($daysOfWeek as $day) {
        $availableEmployees = array();
        foreach ($employees as $employee) {
            if ($employee['age'] >= 18 || ($employee['age'] < 18 && $day != 'Dimanche')) {
                array_push($availableEmployees, strtoupper($employee['name']));
            }
        }
        usort($availableEmployees, function($a, $b) {
            return strcmp($b, $a);
        });
        $schedule[$day] = $availableEmployees;
    }

    echo "Planning de la semaine :<br>";
    echo "<table border='1'>";
    foreach ($schedule as $day => $availableEmployees) {
        echo "<tr>";
        echo "<th>$day</th>";
        echo "<td>";
        if (count($availableEmployees) > 0) {
            echo implode(", ", $availableEmployees);
        } else {
            echo "Personne de disponible";
        }
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

generateWeeklySchedule($employees);
