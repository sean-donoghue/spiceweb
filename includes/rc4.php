<?php
function rc4_ksa($key) {
  $sbox = range(0,255);
  $j = 0;

  for ($i = 0; $i <= 255; $i++) {
    // j = (j + S[i] + key[i mod keylength]) mod 256
    $j = ($j + $sbox[$i] + ord($key[$i % strlen($key)])) % 256;
    // Swap S[i] and S[j] values
    $temp = $sbox[$i];
    $sbox[$i] = $sbox[$j];
    $sbox[$j] = $temp;
  }

  return $sbox;
}

function rc4_prga($sbox, $text) {
  $input = $text;
  $result = "";
  $i = 0;
  $j = 0;

  for ($index = 0; $index < strlen($input); $index++) {
    // Prepare i and j for current iteration
    $i = ($i + 1) % 256;
    $j = ($j + $sbox[$i]) % 256;

    // Swap S[i] and S[j] values
    $temp = $sbox[$i];
    $sbox[$i] = $sbox[$j];
    $sbox[$j] = $temp;

    // Determine K value where K = S[(S[i] + S[j]) mod 256]
    $temp = ($sbox[$i] + $sbox[$j]) % 256;
    $k = $sbox[$temp];

    // XOR K with input text for ciphertext
    $current_byte = ord($input[$index]);
    $cipher_byte = $k ^ $current_byte;

    // Append ciphertext to result string
    $result .= chr($cipher_byte);
  }

  return $result;
}

function rc4($key, $text) {
  return rc4_prga(rc4_ksa($key), $text);
}
?>