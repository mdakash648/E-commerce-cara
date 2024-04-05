<?php
function generateRandomColor() {
    // Generate random numbers for each color component
    $red = dechex(rand(0, 255));
    $green = dechex(rand(0, 255));
    $blue = dechex(rand(0, 255));
    
    // Ensure each component has two digits
    $red = strlen($red) == 1 ? '0' . $red : $red;
    $green = strlen($green) == 1 ? '0' . $green : $green;
    $blue = strlen($blue) == 1 ? '0' . $blue : $blue;
    
    // Combine components into a single color string
    $color = '#' . $red . $green . $blue;
    
    return $color;
}