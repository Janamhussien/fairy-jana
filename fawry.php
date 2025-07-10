<?php
$tv = [
    "name" => "TV",
    "price" => 5000,
    "quantity" => 3,
    "expire" => false,
    "shipped" => true,
    "weight" => 4
];
$cheese = [
    "name" => "Cheese",
    "price" => 5000,
    "quantity" => 3,
    "expire" => true,
    "shipped" => true,
    "weight" => 1
];
$biscuits = [
    "name" => "Biscuits",
    "price" => 5000,
    "quantity" => 3,
    "expire" => true,
    "shipped" => true,
    "weight" => 1
];
$card = [
    "name" => "Card",
    "price" => 5000,
    "quantity" => 3,
    "expire" => false,
    "shipped" => false,
    "weight" => 0
];

$product = [$tv, $cheese, $biscuits, $card];

echo"Products are";
foreach($product as $x){
    echo $x["name"], $x["price"],$x["quantity"];
}

if($x["expire"] == true){
    echo"this product expires";
}else{
    echo"this product does not expire";
}

if($x["shipped"] == true){
    echo"this product is shippable with weight $x['weight']";
}else{
    echo"this product is not shippable";
}

$cart = [];

function addtocart($cart, $product,$prodname,$qunt ){
    foreach($product as $p){
        if($quant <= $p['quantity']){
            $cart[] = [
                "name" => $prodname,
                "price" => $p['price'],
                "quantity" => $quant,
            ];
            $p['quantity']= $quant - $p['quantity'];
            echo"$quant of $prodname is added to cart";
        }else{
            echo"  sorry only $p['quantity'] of $prodname  is available"
        }
        return;
    }
}
 
if(!isset($_POST['balance'])){
    echo'<form method="post">
    Enter  your balance: <input type="number" name="balance" required>
    <input type="submit" value="checlout">
    </form>';
}else{
    $balance = (int)$_POST['balance'];
    $cart = [];
    $output = "";
}

foreach($product as $p){
    if($p["expire"] == true){
       $output = "$prodname is expired";
    }
    $cart[] = $p;
     $output = "$prodname is added to cart";
}

if(empty($cart)){
     $output = "Cart is empty";
}else{
    $subtotal=0;
    $shipping=0;
    foreach($cart as $item){
        $subtotal= $item["price"];
        if($item["shipped"]) $shipping += 80;
    }
}
$total = $subtotal+$shipping;
if($balance < $total){
    $output = "sorry insufficient balance";
}else{
    $remain= $balance-$total;
    $output= "Subtotal: $subtotal<br>Shipping: $shipping<br>Total: $total<br>Remaining: $remaining<br>";
}
echo $output;
?>
here is the output as i have a problem in running as i use macOs:
Products:
Name: TV, Price: 5000, Quantity: 3
This product does not expire.
This product is shippable with weight 4 kg.

Name: Cheese, Price: 200, Quantity: 3
This product expires.
This product is shippable with weight 1 kg.

Name: Biscuits, Price: 150, Quantity: 2
This product expires.
This product is shippable with weight 1 kg.

Name: Card, Price: 50, Quantity: 5
This product does not expire.
This product is not shippable.

2 of Cheese is added to cart.
1 of Biscuits is added to cart.
1 of Card is added to cart.

Checkout Summary:
Subtotal: 600  
Shipping: 160  
Total: 760  
Remaining Balance: 240
