<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    $app = new Silex\Application();

    $app->get("/search-cars", function() {
        return "<!DOCTYPE html>
        <html>
        <head>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
            <title>Find a Car</title>
        </head>
        <body>
            <div class='container'>
                <h1>Find a Car!</h1>
                <form action='/view-cars'>
                    <div class='form-group'>
                        <label for='price'>Enter Maximum Price:</label>
                        <input id='price' name='price' class='form-control' type='number'>
                    </div>
                    <div class='form-group'>
                      <label for='miles'>Enter Maximum Mileage</label>
                      <input id='miles' name='miles' class='form-control' type='number'>
                    </div>
                    <button type='submit' class='btn-success'>Submit</button>
                </form>
            </div>
        </body>
        </html>";
    });

    $app->get("/view-cars", function() {
        $porsche = new Car('2014 Porsche 911', 114991, 7864, 'img/porsche.jpg');
        $ford = new Car('2011 Ford F450', 55995, 14241, 'img/ford.jpg');
        $lexus = new Car('2013 Lexus RX 350', 44700, 20000, 'img/lexus.png');
        $mercedes = new Car('Mercedes Benz CLS550', 39900, 37979, 'img/benz.png');
        $cars = array($porsche, $ford, $lexus, $mercedes);

        $cars_matching_search = array();
        foreach ($cars as $car) {
            if ($car->getPrice() < $_GET['price'] && $car->getMiles() < $_GET['miles']) {
                array_push($cars_matching_search, $car);
            }
        }
        $output = "";
        foreach ($cars_matching_search as $car) {
          $carPrice = $car->getPrice();
          $carModel = $car->getMake_model();
          $carMiles = $car->getMiles();
          $carPicture = $car->getPicture();
                        $output = $output . "<!DOCTYPE html>
                            <html>
                            <head>
                                <title>Your Car Dealership's Homepage</title>
                                <style>
                                img{
                                  width:200px;
                                  height:auto;
                                }
                                </style>
                            </head>
                            <body>
                                <h1>Your Car Dealership</h1>
                                <ul>
                            <li>" . $carModel . "</li>
                             <ul>
                                 <li> $" . $carPrice . "</li>
                                 <li> Miles:" . $carMiles . "</li>
                                 <li> <img src = '" . $carPicture . "'></li>
                             </ul>
                             </ul>
                         </body>
                         </html>
                         ";
                    };
                    if (empty($cars_matching_search)) {
                        return "<p>There are no cars matching your search, please try a higher number!</p>";
                    }
    return $output;
    });

    return $app;
?>
