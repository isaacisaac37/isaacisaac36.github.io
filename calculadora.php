<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Integrales con Gráfica</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #fffde7, #e1f5fe);
            padding: 30px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            max-width: 700px;
            width: 100%;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #00796b;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }

        input[type="text"], input[type="number"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        input[type="submit"] {
            background-color: #00796b;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #004d40;
        }

        .resultado {
            margin-top: 20px;
            font-weight: bold;
            text-align: center;
        }

        .volver {
            margin-top: 15px;
            text-align: center;
        }

        .volver a {
            text-decoration: none;
            color: #00796b;
            font-weight: bold;
        }

        canvas {
            margin-top: 30px;
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }
            .card {
                padding: 20px;
            }
            h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Calculadora de Integrales con Gráfica</h1>

            <form method="POST">
                <label>Función f(x):</label>
                <input type="text" name="funcion" placeholder="Ej: sin(x) + x^2" required>

                <label>Límite inferior (a):</label>
                <input type="number" step="any" name="a" required>

                <label>Límite superior (b):</label>
                <input type="number" step="any" name="b" required>

                <input type="submit" value="Calcular integral">
            </form>

            <?php
            function procesarFuncion($funcion) {
                $funcion = str_replace('^', '**', $funcion);
                $funcion = str_replace(['sin', 'cos', 'tan', 'log', 'exp', 'sqrt'], 
                                       ['sin', 'cos', 'tan', 'log', 'exp', 'sqrt'], 
                                       $funcion);
                $funcion = str_replace("x", "\$x", $funcion);
                return $funcion;
            }

            function evaluarFuncion($funcion, $x) {
                $x = floatval($x);
                try {
                    return eval("return $funcion;");
                } catch (Throwable $e) {
                    return 0;
                }
            }

            function integrarTrapecio($funcion, $a, $b, $n = 1000) {
                $h = ($b - $a) / $n;
                $suma = evaluarFuncion($funcion, $a) + evaluarFuncion($funcion, $b);
                for ($i = 1; $i < $n; $i++) {
                    $x = $a + $i * $h;
                    $suma += 2 * evaluarFuncion($funcion, $x);
                }
                return ($h / 2) * $suma;
            }

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $funcionInput = $_POST["funcion"];
                $a = floatval($_POST["a"]);
                $b = floatval($_POST["b"]);
                $funcionPHP = procesarFuncion($funcionInput);
                $resultado = integrarTrapecio($funcionPHP, $a, $b);
                echo "<div class='resultado'>Resultado aproximado:<br><code>∫[$a,$b] $funcionInput dx ≈ " . round($resultado, 6) . "</code></div>";

                // Generamos datos para la gráfica
                $puntosX = [];
                $puntosY = [];
                for ($i = $a; $i <= $b; $i += ($b - $a) / 100) {
                    $puntosX[] = round($i, 4);
                    $puntosY[] = evaluarFuncion($funcionPHP, $i);
                }

                $jsArrayX = json_encode($puntosX);
                $jsArrayY = json_encode($puntosY);

                echo "
                <canvas id='grafico' width='600' height='300'></canvas>
                <script>
                    const ctx = document.getElementById('grafico').getContext('2d');
                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: $jsArrayX,
                            datasets: [{
                                label: 'f(x) = $funcionInput',
                                data: $jsArrayY,
                                borderColor: '#00796b',
                                fill: false,
                                tension: 0.2
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: 'x'
                                    }
                                },
                                y: {
                                    title: {
                                        display: true,
                                        text: 'f(x)'
                                    }
                                }
                            }
                        }
                    });
                </script>";
            }
            ?>

            <div class="volver">
                <a href="index.php">← Volver a teoría</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
