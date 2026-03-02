<?php

/**
 * Local lat/lng for Kenya areas. Used for "Add by location" (county + area).
 * Keys are normalized (lowercase, comma-separated). Add more as needed.
 * Default Nairobi center: -1.286389, 36.817223
 */
$nairobiCenter = [-1.286389, 36.817223];
$nairobiAreas = [
    'karen' => [-1.3192, 36.6970],
    'westlands' => [-1.2650, 36.8060],
    'south b' => [-1.3040, 36.8300],
    'south c' => [-1.3080, 36.8250],
    'kilimani' => [-1.2980, 36.7920],
    'lavington' => [-1.2880, 36.7780],
    'runda' => [-1.2180, 36.8180],
    'gigiri' => [-1.2230, 36.8280],
    'parklands' => [-1.2680, 36.8180],
    'eastlands' => [-1.3020, 36.8480],
    'embakasi' => [-1.3210, 36.8950],
    'upper hill' => [-1.2920, 36.7980],
    'donholm' => [-1.3080, 36.8680],
    'dagoretti' => [-1.2850, 36.7580],
    'langata' => [-1.3320, 36.7580],
    'muthaiga' => [-1.2580, 36.8180],
    'loresho' => [-1.2620, 36.7680],
    'hurlingham' => [-1.2950, 36.7880],
    'ruaka' => [-1.1850, 36.8480],
    'umoja' => [-1.3020, 36.8780],
    'kayole' => [-1.3150, 36.8880],
    'rongai' => [-1.3980, 36.7380],
    'ongata rongai' => [-1.3980, 36.7380],
    'syokimau' => [-1.5220, 36.9080],
    'athi river' => [-1.4520, 36.9780],
];

$out = [
    'nairobi' => $nairobiCenter,
    'nairobi, kenya' => $nairobiCenter,
];

foreach ($nairobiAreas as $area => $coords) {
    $out[$area . ', nairobi, kenya'] = $coords;
    $out[$area . ', nairobi'] = $coords;
}
foreach (['hardy', 'other'] as $extra) {
    $out[$extra . ', karen, nairobi, kenya'] = $nairobiAreas['karen'];
    $out[$extra . ', karen, nairobi'] = $nairobiAreas['karen'];
}

$out['ruiru, kiambu, kenya'] = [-1.1490, 37.0640];
$out['thika, kiambu, kenya'] = [-1.0330, 37.0690];
$out['mombasa, kenya'] = [-4.0437, 39.6682];
$out['nyali, mombasa, kenya'] = [-4.0500, 39.7200];
$out['kisumu, kenya'] = [-0.1022, 34.7617];
$out['nakuru, kenya'] = [-0.3031, 36.0800];

return $out;
