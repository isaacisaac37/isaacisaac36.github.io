<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matemáticas para Ingeniería - ¿Qué es una Integral?</title>
    <!-- Link para Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: #f3f4f6;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .main-title {
            font-size: 3.5em;
            color: #0277bd;
            font-weight: bold;
            text-align: center;
            margin-top: 50px;
            letter-spacing: 3px;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 40px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-top: 30px;
        }

        h1 {
            color: #01579b;
            font-size: 2.8em;
            margin-bottom: 20px;
            text-align: center;
        }

        h2 {
            color: #01579b;
            font-size: 1.7em;
            margin-top: 25px;
        }

        p {
            line-height: 1.8;
            color: #333;
            font-size: 1.1em;
        }

        code {
            background-color: #f1f1f1;
            padding: 8px 16px;
            border-radius: 5px;
            font-family: 'Courier New', monospace;
            color: #e53935;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
            font-size: 1.1em;
        }

        ul li {
            margin-bottom: 10px;
            color: #0288d1;
        }

        .btn-custom {
            display: block;
            margin: 40px auto 10px;
            padding: 14px 40px;
            background-color: #0288d1;
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 1.2em;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-custom:hover {
            background-color: #01579b;
            transform: scale(1.05);
        }

        .footer {
            text-align: center;
            font-size: 1em;
            color: #757575;
            margin-top: 50px;
            padding-bottom: 20px;
        }

        /* Estilo para mejorar la visibilidad en dispositivos móviles */
        @media (max-width: 768px) {
            .main-title {
                font-size: 2.5em;
            }

            .card {
                padding: 30px;
            }

            h1 {
                font-size: 2.2em;
            }

            h2 {
                font-size: 1.5em;
            }

            .btn-custom {
                font-size: 1.1em;
                padding: 12px 35px;
            }
        }
    </style>
</head>
<body>

    <div class="main-title">
        Matemáticas para Ingeniería
    </div>

    <div class="container">
        <div class="card">
            <h1>¿Qué es una Integral?</h1>
            <div class="card-body">
                <p>
                    En matemáticas, una <strong>integral</strong> es una operación que nos permite calcular el área bajo una curva. 
                    Es una herramienta fundamental en el cálculo y se utiliza para resolver problemas de acumulación, como el área, volumen, desplazamiento y mucho más.
                </p>

                <h2>Notación:</h2>
                <p>
                    La notación más común es: <code>∫ f(x) dx</code>
                </p>
                <ul>
                    <li><code>∫</code> es el símbolo de integración.</li>
                    <li><code>f(x)</code> es la función que se va a integrar.</li>
                    <li><code>dx</code> indica que la variable de integración es x.</li>
                </ul>

                <h2>Ejemplo básico:</h2>
                <p>
                    Si tenemos la función <code>f(x) = x</code>, su integral definida de 0 a 2 es:
                </p>
                <p>
                    <code>∫₀² x dx = (1/2)x² |₀² = (1/2)(2)² - (1/2)(0)² = 2</code>
                </p>

                <h2>Dato curioso:</h2>
                <p>
                    La integral fue desarrollada en parte por Isaac Newton y Gottfried Leibniz en el siglo XVII. ¡Y aún hoy la usamos en muchísimas ciencias!
                </p>

                <a href="calculadora.php" class="btn-custom btn-lg">Ir a la Calculadora</a>
            </div>
        </div>
    </div>

    <div class="footer">
        Página educativa hecha con ❤️ en PHP
    </div>

</body>
</html>
