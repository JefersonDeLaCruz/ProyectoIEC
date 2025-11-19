<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Index | App</title>

        <style>
            *{
                box-sizing: border-box;
                padding: 0;
                margin: 0;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }
            .container {
                display: flex;
                flex-direction: column;
                gap: 20px;

                justify-content: center;
                align-items: center;

                padding: 15px;
            }

            .header{
                background-color: black;
                display: flex;
                flex-direction: row;

                justify-content: flex-start;
                align-items: center;
                padding: 10px;
            }

            .header__list{
                list-style: none;

                display: flex;
                flex-direction: row;

                justify-content: space-around;
            }

            .header__list__item{
                padding: 10px;
                text-decoration: none;
                color: white;
            }
        </style>
    </head>
    <body>

        <header class="header">
            <ul class="header__list">
                <li><a class="header__list__item" href="#">Item</a></li>
                <li><a class="header__list__item" href="#">Item</a></li>
                <li><a class="header__list__item" href="#">Item</a></li>
            </ul>
        </header>

        <div class="container">
            <h2>Bienvenido a la web <strong>TriniTy</strong></h2>
            <p>Web sobre la resolucion de Anualidades anticipadas</p>

            <img src="https://image.slidesharecdn.com/anualidadanticipada-200429135940/75/Anualidad-anticipada-2-2048.jpg" 
            alt="Anualidades anticipadas" style="width: 1000px; height: 700px; border: 1px solid black; border-radius: 3px;">
        </div>
    </body>
</html>
