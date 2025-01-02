<?php
include 'db_conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $stmt = $conn->prepare("INSERT INTO cart (product_name, price, quantity) VALUES (?, ?, ?)");
    $stmt->bind_param("sdi", $product_name, $price, $quantity);

    if ($stmt->execute()) {
        echo "상품이 장바구니에 추가되었습니다.";
    } else {
        echo "오류: " . $stmt->error;
    }
    $stmt->close();
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM cart WHERE id = $id");
    echo "상품이 삭제되었습니다.";
}

$result = $conn->query("SELECT * FROM cart");
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>장바구니</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">장바구니</h1>
        <form method="POST" class="mb-4">
            <div class="mb-3">
                <label for="product_name" class="form-label">상품명</label>
                <input type="text" name="product_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">가격</label>
                <input type="number" name="price" class="form-control" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">수량</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>
            <button type="submit" name="add_to_cart" class="btn btn-primary">장바구니에 추가</button>
        </form>

        <h2>장바구니 목록</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>상품명</th>
                    <th>가격</th>
                    <th>수량</th>
                    <th>합계</th>
                    <th>액션</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['product_name']) ?></td>
                        <td><?= number_format($row['price'], 2) ?></td>
                        <td><?= $row['quantity'] ?></td>
                        <td><?= number_format($row['price'] * $row['quantity'], 2) ?></td>
                        <td>
                            <a href="?delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm">삭제</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>