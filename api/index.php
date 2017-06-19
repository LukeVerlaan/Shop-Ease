<?php

//header('content-type: application/json; charset=utf-8');
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, AUTHORIZATION, X-Requested-With");

define('DIRECT_ACCESS', false);

require_once('config.php');
require_once('connect.php');

$configuration = [
  'settings' => [
    'displayErrorDetails' => true,
  ],
];

require 'vendor/autoload.php';

$pdo = Connect::getDatabaseObject();

$configuration['notFoundHandler'] = function ($configuration) {
    return function ($request, $response) use ($configuration) {
        return $configuration['response']
            ->withStatus(404)
            ->withHeader('Content-Type', 'text/html')
            ->write('Unable to find current url call');
    };
};

$app = new \Slim\App($configuration);

$app->get('/user', function ($request, $response, $args) {
    $sql = "SELECT * FROM users WHERE id = '" . $request->getQueryParams()['id'] . "'";
    return $response->withStatus(200)->write(json_encode(Query($sql)));
});
$app->get('/shop', function ($request, $response, $args) {
    $sql = "SELECT * FROM winkels WHERE id = '" . $request->getQueryParams()['id'] . "'";
    return $response->withStatus(200)->write(json_encode(Query($sql)));
});
$app->get('/shop/code', function ($request, $response, $args) {
    $sql = "SELECT * FROM winkels WHERE code = '" . $request->getQueryParams()['code'] . "'";
    return $response->withStatus(200)->write(json_encode(Query($sql)));
});
// Verkrijg het winkelmandje
$app->get('/cart/user', function ($request, $response, $args) {
    $sql = "SELECT * FROM winkelmandje WHERE userid = '" . $request->getQueryParams()['id'] . "'";
    return $response->withStatus(200)->write(json_encode(Query($sql)));
});
$app->get('/cartProducts', function ($request, $response, $args) {
    $sql = "SELECT * FROM mandProducten WHERE mandid = '" . $request->getQueryParams()['id'] . "'";
    return $response->withStatus(200)->write(json_encode(Query($sql)));
});
// Verkrijg product
$app->get('/productById', function ($request, $response, $args) {
    $sql = "SELECT * FROM producten WHERE id = '" . $request->getQueryParams()['id'] . "'";
    return $response->withStatus(200)->write(json_encode(Query($sql)));
});

$app->get('/productByCode', function ($request, $response, $args) {
    $sql = "SELECT * FROM producten WHERE code = '" . $request->getQueryParams()['code'] . "' and winkelid = '" . $request->getQueryParams()['winkel'] ."'";
    return $response->withStatus(200)->write(json_encode(Query($sql)));
});

// voeg product aan mandje
$app->post('/addProductCart', function ($request, $response, $args) {
    $sql = "INSERT INTO mandProducten (mandid, productid, aantal) VALUES ('" . $request->getParsedBody()['mandid'] . "', '". $request->getParsedBody()['productid'] ."', '".$request->getParsedBody()['aantal']."' )";
	global $pdo;
	$statement = $pdo->prepare($sql);
	$statement->execute();
	
	return $response->write("query is uitgevoerd." . $sql);
});

$app->run();

function Query($sql, $args = null, $fetch = true, $numrow = false, $lastid = false) {
    $db = Connect::getDatabaseObject();
    $allownull = array('category_id', 'subcategory_id', 'place_id');
    $query = $db->prepare($sql);
    if ($args != null) {
        foreach ($args as $key => $value) {
            (in_array($key, $allownull) && $value == '') ? $val = null : $val = $value;
            $query->bindValue(":" . $key, $val);
        }
    }

    $query->execute();
    if ($fetch) return $query->fetchAll();
    elseif ($numrow) return $query->rowCount();
    elseif ($lastid) return $db->lastInsertId();
}

function insert($table, $data)
{

  $columns = "select COLUMN_NAME, IS_NULLABLE from information_schema.columns where table_schema = 'ictlab_kennislab' and table_name = " . $table;
  $col = "";
  $cols = Query($columns);

  $values = array();
  $keys = "";
  if (isset($_POST)) {
    foreach ($cols as $key => $value) {

      try {
        if (isset($data[$value['COLUMN_NAME']])) {
          $col .= "`" . $value['COLUMN_NAME'] . "`, ";
          $keys .= ":" . $value['COLUMN_NAME'] . ", ";
          $values[$value['COLUMN_NAME']] = $data[$value['COLUMN_NAME']];
        } elseif (!isset($data[$value['COLUMN_NAME']]) && $value['IS_NULLABLE'] == 'YES') {

        } elseif ($value['COLUMN_NAME'] == 'id') {
          $col .= "`" . $value['COLUMN_NAME'] . "`, ";
          $keys .= ":" . $value['COLUMN_NAME'] . ",";
          $values[$value['COLUMN_NAME']] = '';
        }
      } catch (Exception $e) {
        return array('error' => json_encode($e), 'success' => false, 'data' => '');
      }

    }

    $col = rtrim(rtrim($col), ',');
    $keys = rtrim(rtrim($keys), ',');
    $sql = "INSERT INTO " . $table . " (" . $col . ") values (" . $keys . ")";

    try {
      if ($table == 'pins') {
        $results = Query($sql, $values, false, false, true);
        return array('error' => null, 'success' => true, 'data' => $results);
      } else {
        $results = Query($sql, $values, false);
        return array('error' => null, 'success' => true, 'data' => '');
      }
    } catch (Exception $e) {
      return array('error' => json_encode($e) . json_encode($data), 'success' => false, 'data' => '');
    }
  } else {
    return array('error' => "Post not submitted", 'success' => false, 'data' => '');
  }
}
