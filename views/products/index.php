<?php ob_start(); ?>

<h1>Products</h1>
<a href="/products/create" class="btn btn-primary mb-3">Add New Product</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $products->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['price']); ?></td>
                <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                <td><?php echo htmlspecialchars($row['category']); ?></td>
                <td>
                    <a href="/products/edit/<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="/products/delete/<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php 
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
?> 