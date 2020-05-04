<?php
function swap_values(&$int1, &$int2) {
  $temp = $int1;
  $int1 = $int2;
  $int2 = $temp;
}

// RC4 Key-scheduling algorithm
function rc4_ksa($key) {
  $sbox = range(0,255);
  $j = 0;

  for ($i = 0; $i <= 255; $i++) {
    // j = (j + S[i] + key[i mod keylength]) mod 256
    $j = ($j + $sbox[$i] + ord($key[$i % strlen($key)])) % 256;
    swap_values($sbox[$i], $sbox[$j]);
  }

  return $sbox;
}

// RC4 Pseudo-random generation algorithm
function rc4_prga($sbox) {
  $i = 0;
  $j = 0;

  // Generator iteration loop
  while(true) {
    // Prepares i and j for current iteration
    $i = ($i + 1) % 256;
    $j = ($j + $sbox[$i]) % 256;
    swap_values($sbox[$i], $sbox[$j]);

    // Determines K value where K = S[(S[i] + S[j]) mod 256]
    $temp = ($sbox[$i] + $sbox[$j]) % 256;
    $k = $sbox[$temp];

    yield $k;
  }
}

// Returns a Generator object
function rc4_gen($key) {
  return rc4_prga(rc4_ksa($key));
}
?>