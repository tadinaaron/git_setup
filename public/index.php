<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
require '../src/vendor/autoload.php';
$app = new \Slim\App;

//POSTNAME
$app->post('/postName', function (Request $request, Response $response) {
    try {
        $data = json_decode($request->getBody());
        if ($data === null) {
            $response->getBody()->write(json_encode([
                "status" => "error",
                "message" => "Invalid JSON data in the request body"
            ]));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(400); // Return a 400 Bad Request status
        }

        $fname = $data->fname;
        $lname = $data->lname;

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "demo";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO names (fname, lname) VALUES (:fname, :lname)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->execute();

        $response->getBody()->write(json_encode([
            "status" => "success",
            "data" => null
      
            
        ]));
    } catch (PDOException $e) {
        $response->getBody()->write(json_encode([
            "status" => "error",
            "message" => $e->getMessage()
        ]));
    }

    return $response->withHeader('Content-Type', 'application/json');
});

//PRINTNAME
$app->get('/printName', function (Request $request, Response $response, $args) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "demo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM names";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            array_push($data, array(
                "fname" => $row["fname"]

                ,
                "lname" => $row["lname"]
            )
            );
        }
        $data_body = array("status" => "success", "data" => $data);
        $response->getBody()->write(json_encode($data_body));
    } else {
        $response->getBody()->write(array("status" => "success", "data" => null));
    }
    $conn->close();

    return $response;
});

//UPDATENAME
$app->put('/updateName/{id}', function (Request $request, Response $response, $args) {
    try {
        $id = $args['id'];
        $data = json_decode($request->getBody());

        if ($data === null) {
            $response->getBody()->write(json_encode([
                "status" => "error",
                "message" => "Invalid JSON data in the request body"
            ]));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(400); // Return a 400 Bad Request status
        }

        $fname = $data->fname;
        $lname = $data->lname;

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "demo";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE names SET fname = :fname, lname = :lname WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->execute();

        $response->getBody()->write(json_encode([
            "status" => "success",
            "data" => null
        ]));
    } catch (PDOException $e) {
        $response->getBody()->write(json_encode([
            "status" => "error",
            "message" => $e->getMessage()
        ]));
    }

    return $response->withHeader('Content-Type', 'application/json');
});

//DELETENAME
$app->delete('/deleteName/{id}', function (Request $request, Response $response, $args) {
    try {
        $id = $args['id'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "demo";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM names WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $response->getBody()->write(json_encode([
            "status" => "success",
            "data" => null
        ]));
    } catch (PDOException $e) {
        $response->getBody()->write(json_encode([
            "status" => "error",
            "message" => $e->getMessage()
        ]));
    }

    return $response->withHeader('Content-Type', 'application/json');
});


$app->run();

?>