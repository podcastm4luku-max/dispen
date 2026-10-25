<?php
$views = [
    'kepegawaian' => 'resources/views/layanan-kepegawaian.blade.php',
    'sma' => 'resources/views/layanan-sma.blade.php',
    'smk' => 'resources/views/layanan-smk.blade.php',
    'pk' => 'resources/views/layanan-pk.blade.php',
    'kebudayaan' => 'resources/views/layanan-kebudayaan.blade.php',
    'standar' => 'resources/views/standar-pelayanan.blade.php',
];

foreach ($views as $k => $path) {
    $c = file_get_contents($path);
    $hasApp = strpos($c, 'function App()') !== false;
    $hasModal = strpos($c, 'selectedServiceModal') !== false;
    $hasFooter = strpos($c, '{/* Modal Footer */}') !== false;
    echo "{$k}: hasApp=" . ($hasApp ? 'YES' : 'NO') . " | hasModal=" . ($hasModal ? 'YES' : 'NO') . " | hasFooter=" . ($hasFooter ? 'YES' : 'NO') . "\n";
}
