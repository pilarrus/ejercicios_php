<?php

    function paint_positions() {
        $phrase = controla_entrada($_POST['phrase']);
        $word = controla_entrada($_POST['word']);
        $response = "";
        if (!empty($phrase)) {
            if (!empty($word)) {
                $positions = search_position($word, $phrase);
                if($positions != false) {
                    $response .= "<p>La palabra $word está en la posición: ";
                    foreach ($positions as $position) {
                        $response .= $position . ", ";
                    }
                    $response .= "</p>";
                } else {
                    $response = "<p>No hay ocurrencias de la palabra $word</p>";
                }
            } else {
                $response = "<p>Debes introducir una palabra</p>";
            }
        } else {
            $response = "<p>Debes introducir una frase</p>";
        }
        return $response;
    }

    function search_position($aguja, $pajar) {
        $aguja = strtolower($aguja);
        $pajar = strtolower($pajar);
        $length_aguja = strlen($aguja);
        $length_pajar = strlen($pajar);
        $positions = [];
        $i = 0;
        while($i < $length_pajar) {
            $cont = 0;
            if($pajar[$i] === $aguja[0]) {
                $pos = $i;
                $cont++;
                $i++;
                $j = 1;
                if($cont === $length_aguja) {
                    array_push($positions, $pos);
                }
                while($i < $length_pajar && $j < $length_aguja && $cont < $length_aguja) {
                    if($pajar[$i] === $aguja[$j]) {
                        $cont++;
                        $i++;
                        $j++;
                        if($cont === $length_aguja) {
                            array_push($positions, $pos);
                        }
                    } else {
                        break;
                    }
                }
            } else {
                $i++;
            }
        }
        if(!empty($positions)) {
            return $positions;
        } else {
            return false;
        }
    }

    function paint_exists() {
        $phrase = controla_entrada($_POST['phrase']);
        $word = controla_entrada($_POST['word']);
        if (!empty($phrase)) {
            if (!empty($word)) {
                $response = exists($word, $phrase);
                if($response) {
                    return "<p>La palabra $word existe</p>";
                } else {
                    return "<p>La palabra $word no existe</p>";
                }
            } else {
                return "<p>Debes introducir una palabra</p>";
            }
        } else {
            return "<p>Debes introducir una frase</p>";
        }
    }

    function exists($aguja, $pajar) {
        $aguja = strtolower($aguja);
        $pajar = strtolower($pajar);
        $length_aguja = strlen($aguja);
        $length_pajar = strlen($pajar);
        $i = 0;
        while($i < $length_pajar) {
            $cont = 0;
            if($pajar[$i] === $aguja[0]) {
                $cont++;
                $i++;
                $j = 1;
                if($cont === $length_aguja) {
                    return true;
                }
                while($i < $length_pajar && $j < $length_aguja && $cont < $length_aguja) {
                    if($pajar[$i] === $aguja[$j]) {
                        $cont++;
                        $i++;
                        $j++;
                        if($cont === $length_aguja) {
                            return true;
                        }
                    } else {
                        break;
                    }
                }
            } else {
                $i++;
            }
        }
        return false;
    }

    function search_position_array($word, $phrase) {
        $positions = [];
        if(strlen($phrase) > 0 && strlen($word) > 0) {
            $words = explode(" ", $phrase);
            foreach ($words as $key => $value) {
                if(strtolower($value) === strtolower($word)) {
                    array_push($positions, $key);
                }
            }
            return $positions;
        } else {
            return false;
        }
    }

    function paint_replace() {
        $replacer = controla_entrada($_POST['replacer']);
        if(!empty($replacer)) {
            $response = replace_all($replacer);
            return $response;
        } else {
            return "<p>Introduce la palabra que sustituirá a la que quieres reemplazar</p>";
        }
    }

    function replace_all($replacer) {
        $phrase = controla_entrada($_POST['phrase']);
        $word = controla_entrada($_POST['word']);
        
        if (!empty($phrase)) {
            if (!empty($word)) {
                $positions =  search_position($word, $phrase);
                if($positions !== false) {
                    do {
                        $position = $positions[0];
                        $phrase = replace($phrase, $word, $position, $replacer);
                        $positions = search_position($word, $phrase);
                    }while($positions !== false);

                    return "<p>$phrase</p>";
                } else {
                    return "<p>No hay nada que reemplazar</p>";
                }
            } else {
                return "<p>Debes introducir una palabra</p>";
            }
        } else {
            return "<p>Debes introducir una frase</p>";
        }
    }

    function replace($phrase, $word, $position, $replacer) {
        $new_phrase = "";
        $length_phrase = strlen($phrase);
        $length_word = strlen($word);
        for($i = 0; $i < $length_phrase; $i++) {
            if($position == $i) {
                $new_phrase .= $replacer;
                for($j = 0; $j < $length_word; $j++) {
                    $i++;
                }
            }
            if($i < $length_phrase) {
                $new_phrase .= $phrase[$i];
            }
        }
        return $new_phrase;
    }
?>