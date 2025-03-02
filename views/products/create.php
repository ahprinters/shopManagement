<?php ob_start(); ?>

<h1>Create New Product</h1>

<form method="POST" action="/products/create" class="mt-4">
    <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
    </div>
    
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" class="form-control" id="quantity" name="quantity" required>
    </div>
    
    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <input type="text" class="form-control" id="category" name="category">
    </div>
    
    <button type="submit" class="btn btn-primary">Create Product</button>
    <a href="/products" class="btn btn-secondary">Cancel</a>
</form>

<?php 
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
?> 