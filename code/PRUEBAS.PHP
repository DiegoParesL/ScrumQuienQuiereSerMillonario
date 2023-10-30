function print_preguntas_aleatorias()
            {
                $preguntas_escogidas = preguntas_aleatorias();
                $total = count($preguntas_escogidas);
                $preguntas_restantes = $total;
                if (!isset($_COOKIE["aciertos"])) {
                    $_COOKIE["aciertos"] = 0;
                    $aciertos = $_COOKIE["aciertos"];
                }else{
                    $aciertos = $_COOKIE["aciertos"];
                }
                echo "<input type='text' id='valueAciertos' name='aciertos' value='$aciertos' > ";
                foreach ($preguntas_escogidas as $key => $value) {
                    if ($preguntas_restantes == $total) {
                        echo "<div>";
                        echo "<h2>" . substr($key, 1) . "</h2>"; // Quita el signo "*" en el título
                        echo "<div class='grid'>";
                        foreach ($value as $respuestas) {
                            if ($respuestas[0] === "+") {
                                echo "<p class=\"oculto\" id='respuesta" . ($total - $preguntas_restantes) . "'>$respuestas</p>";
                                echo "<button id=\"res" . ($total - $preguntas_restantes) . "\" onclick=\"trueClick(this);setAciertos();\">" . trim($respuestas, "+-") . "</button>";
                            } else {
                                echo "<button class=\"fail" . ($total - $preguntas_restantes) . "\" onclick=\"failClick(this)\">" . trim($respuestas, "+-") . "</button>";
                            }
                        }
                        echo "</div>";
                        echo "</div>";
                    } else {
                        echo "<div id='pregunta" . ($total - $preguntas_restantes + 1) . "' class='oculto'>";
                        echo "<h2>" . substr($key, 1) . "</h2>"; // Quita el signo "*" en el título
                        echo "<div class='grid'>";
                        foreach ($value as $respuestas) {
                            if ($respuestas[0] === "+") {
                                echo "<p class=\"oculto\" id='respuesta" . ($total - $preguntas_restantes) . "'>$respuestas</p>";
                                echo "<button id=\"res" . ($total - $preguntas_restantes) . "\" onclick=\"trueClick(this);setAciertos();\">" . trim($respuestas, "+-") . "</button>";
                            } else {
                                echo "<button class=\"fail" . ($total - $preguntas_restantes) . "\" onclick=\"failClick(this)\">" . trim($respuestas, "+-") . "</button>";
                            }
                        }
                        echo "</div>";  
                        echo "</div>";
                    }
                    $preguntas_restantes--;
                }
           
            }
            print_preguntas_aleatorias();
            ?>